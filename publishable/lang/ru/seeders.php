<?php

return [
    'data_rows'  => [
        'id'               => 'ID',
        'parent'           => 'Родитель',
        'status'           => 'Статус',
        'order'            => 'Порядок',
        'title'            => 'Заголовок',
        'subtitle'         => 'Подзаголовок',
        'slug'             => 'Алиас',
        'key'              => 'Ключ',
        'color'            => 'Цвет',
        'link'             => 'Линк',
        'options'          => 'Опции',
        'url_paths'        => 'Правила обработки URL',
        'show_on_all'      => 'Показывать блок на ВСЕХ страницах, кроме указанных',
        'show_only'        => 'Показывать блок только на указанных страницах',
        'page_urls'        => 'Ссылки страниц',
        'region_key'       => 'Ключ группы блоков',
        'block_key'        => 'Ключ блока',
        'form_key'         => 'Ключ формы',
        'region_position'  => 'Группа блоков',
        'block_content'    => 'Содержимое блока',
        'form_content'     => 'Содержимое формы',
        'image'            => 'Изображение',
        'images_files'     => 'Изображения / Файлы',
        'content'          => 'Содержимое',
        'layout'           => 'Блоки / Виджеты',
        'language_key'     => 'Ключ языка',
        'english'          => 'Английский',
        'russian'          => 'Русский',
        'setting_name'     => 'Имя настройки',
        'setting_group'    => 'Группа настроек',
        'created_at'       => 'Создано',
        'updated_at'       => 'Обновлено',
        'message_required' => 'Поле :field обязательно.',
        'message_unique'   => 'Поле :field должно быть уникальным.',
        'enabled'          => 'Активно',
        'disabled'         => 'Отключено',
        'show_in_menu'     => 'Показывать в меню',
        'seo_group'        => 'Группа полей СЕО',
        'seo_title'        => 'SEO Заголовок',
        'meta_description' => 'META Описание',
        'meta_keywords'    => 'META Ключевые слова',
        'tab_images'       => 'Медиа',
        'tab_layout'       => 'Блоки / Виджеты',
        'tab_seo'          => 'СЕО',
        'tab_options'      => 'Опции',
        'tab_attributes'   => 'Дополнительно',

    ],
    'data_types' => [
        'blocks'     => [
            'singular' => 'Блок',
            'plural'   => 'Блоки',
        ],
        'block_regions'     => [
            'singular' => 'Группа',
            'plural'   => 'Группы',
        ],
        'forms'     => [
            'singular' => 'Форма',
            'plural'   => 'Формы',
        ],
        'localizations'     => [
            'singular' => 'Локализация',
            'plural'   => 'Локализация',
        ],
        'site_settings'     => [
            'singular' => 'Настройки сайта',
            'plural'   => 'Настройки сайта',
        ],
        'pages'     => [
            'singular' => 'Страница',
            'plural'   => 'Страницы',
        ],
        'system_pages'     => [
            'singular' => 'Системная страница',
            'plural'   => 'Системные страницы',
        ],
    ],
    'menu_items' => [
        'content' => 'Контент',
        'block_and_widgets' => 'Блоки и Виджеты',
        'regions' => 'Группы блоков',
        'forms' => 'Формы',
        'localizations' => 'Локализации',
        'site_settings' => 'Настройки сайта',
        'pages'         => 'Страницы',
        'system_pages'  => 'Системные страницы',
    ],
    'settings'   => [
        'general' => [
            'title' => 'Основные настройки',
            'section_main_title' => 'Основные настройки',
            'site_title' => 'Название сайта',
            'site_description' => 'Описание сайта',

            'section_pages' => 'Привязка основных страниц',
            'site_home_page' => 'ID главной страницы',
            'site_403_page' => 'ID системной страницы 403 ошибки',
            'site_404_page' => 'ID системной страницы 404 ошибки',

            'section_system' => 'Системные настройки',
            'site_app_name' => 'Имя приложения (APP Name)',
            'site_root_url' => 'Базовый адрес сайта URL',
            'site_debug_mode' => 'Режим отладки (Debug mode)',
            'site_debug_mode_on' => 'Включен',
            'site_debug_mode_off' => 'Отключен',

            'site_title_value' => 'Мой сайт',
            'site_description_value' => 'Описание сайта по умолчанию',
            'site_app_name_value' => 'Имя моего сайта',
        ],
        'mail' => [
            'title' => 'Почта',
            'to_address' => 'Адрес по умолчанию для доставки писем',
            'from_name' => 'Имя по умолчаню для исходящих писем',
            'from_address' => 'Адрес по умолчанию для исходящих писем',
            'section_transport' => 'Способ доставки',
            'driver' => 'Драйвер почты',
            'host' => 'Хост адрес',
            'port' => 'Номер порта',
            'from_name_value' => 'Администрация',
            'from_address_value' => 'sender@example.com',
            'to_address_value' => 'destination@example.com',
            'username' => 'Имя аккаунта пользователя',
            'password' => 'Пароль',
            'encryption' => 'Шифрование',
            'test_mail' => 'Отправить проверочное сообщение',
        ],

        'seo' => [
            'title' => 'СЕО',
            'seo_title_template' => 'Шаблон СЕО Заголовка (TITLE)',
            'seo_title' => 'Заголовок (SEO TITLE) по умолчанию',
            'meta_description' => 'META Описание по умолчанию',
            'meta_keywords' => 'META Ключевые слова по умолчанию',
        ],

        'theme' => [
            'title' => 'Тема',
            'logo' => 'Логотип сайта',
        ],
    ],
    'pages'   => [
        'home_title' => 'Главная',
    ],
    'system_pages'   => [
        '403_title' => 'Ошибка 403',
        '404_title' => 'Ошибка 404',
    ],
    'regions'   => [
        'content_before' => 'Область до основного контента',
        'content' => 'Область основного контента',
        'content_after' => 'Область после основного контента',
        'no_position' => 'Область без вывода',
        'sidebar' => 'Область сайдбара - боковой колонки',
    ],
];
