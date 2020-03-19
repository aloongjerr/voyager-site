<?php

namespace MonstreX\VoyagerSite\Http\Controllers;

use MonstreX\VoyagerSite\Models\SiteSetting as Settings;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Arr;
use MonstreX\VoyagerSite\Notifications\SendForm;
use Notification;


class VoyagerSiteController extends VoyagerBaseController
{

    /*
     *  Settings EDIT
     */
    public function settingsEdit($key)
    {

        $dataType = Voyager::model('DataType')->where('slug', '=', 'site-settings')->first();

        // Check permission
        $this->authorize('edit', app($dataType->model_name));

        $settings = Settings::where('key',$key)->first();

        return view('voyager-site::settings.index')->with(['key' => $key, 'title' => $settings->title, 'config' => json_decode($settings->details), 'settings' => $settings]);
    }

    /*
     *  Settings UPDATE
     */
    public function settingsUpdate(Request $request, $key)
    {

        $dataType = Voyager::model('DataType')->where('slug', '=', 'site-settings')->first();

        // Check permission
        $this->authorize('edit', app($dataType->model_name));

        $settings = Settings::where('key', $key)->first();

        $config = json_decode($settings->details);

        if($request->has('remove_image')) {
            // ONLY clear image field and remove file
            foreach ($config->fields as $key_field => $field) {
                if ($key_field === trim($request->remove_image)) {
                    $file = json_decode($config->fields->{$key_field}->value);
                    $this->deleteFileIfExists($file[0]->download_link);
                    $config->fields->{$key_field}->value = '';
                }
            }
        } elseif($request->has('remove_media')) {
            foreach ($config->fields as $key_field => $field) {
                if ($key_field === trim($request->remove_media)) {
                    $settings->clearMediaCollection($key_field);
                    $config->fields->{$key_field}->value = '';
                }
            }
        } else {
            // Save all data from Request
            foreach ($config->fields as $key_field => $field) {
                if($field->type === 'text' || $field->type === 'number' || $field->type === 'textarea' || $field->type === 'code_editor' || $field->type === 'rich_text_box') {
                    $config->fields->{$key_field}->value = $request->{$key_field};
                } elseif ($field->type === 'checkbox') {
                    $config->fields->{$key_field}->value = isset($request->{$key_field})? '1' : '0';
                } elseif ($field->type === 'radio' || $field->type === 'dropdown') {
                    $config->fields->{$key_field}->value = $request->{$key_field};
                } elseif ($field->type === 'image') {
                    if($request->hasFile($key_field)) {
                        $config->fields->{$key_field}->value = store_post_files($request, 'settings', $key_field);
                    }
                } elseif ($field->type === 'media') {
                    if($request->hasFile($key_field)) {
                        $settings->clearMediaCollection($key_field);
                        $media = $settings->addMediaFromRequest($key_field)->toMediaCollection($key_field);
                        $config->fields->{$key_field}->value = $media->id;
                    }
                }
            }
        }

        $settings->details = json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        $settings->save();

        return redirect()->route('voyager.site-settings.index');
    }


    /*
     *  Send TEST Email
     */
    public function sendTestMail()
    {

        $formFields = [
            'subject' => __('voyager-site::mail.send_test_mail_subject') . site_setting('general.site_app_name'),
            'message' => __('voyager-site::mail.send_test_mail_message'),
        ];

        $emails = explode(',', site_setting('mail.to_address'));
        try {
            Notification::route('mail', $emails)->notify(new SendForm($formFields));
            $error = null;
        } catch (\Swift_TransportException $e) {
            $error = $e;
        }

        return view('voyager-site::settings.mail-sent')->with([
            'title' => __('voyager-site::mail.send_test_mail_title'),
            'content' => __('voyager-site::mail.send_test_mail_success_message'),
            'error' => $error
        ]);
    }

}
