# Boilerplate
Базовая настройка сайта.

### Список устанавливаемых дополнений (при установке опционально)
 - **ClientConfig** (конфигурация сайта)
 - **Google Maps TV** (гугл карта)
 - **FormIt** (обработка форм, отправка заявок на электронную почту)
 - **MIGX** (для создания табличек у ресурсов)
 - **TinyMCE Rich Text Editor** (визуальный редактор)
 - **translit** (автоматическая транслитерация адресов страниц)
 - **SEO Tab** (настройка страницы для поисковых систем)
 - **SEO Pro** (настройка шаблона сайта в поисковой выдачи)

  **MODSTORE.PRO**
 - **Ace** (лучший редактор кода)
 - **AjaxForm** (отправка форм через Ajax)
 - **autoRedirector** (редирект старых url)
 - **controlErrorLog** (управление журналом ошибок)
 - **MinifyX** (автоматизированное сжатие скриптов и стилей сайта)
 - **mixedImage** (смешанная загрузка файла)
 - **phpThumbOn** (для изменения размера и сжатия изображения)
 - **pdoTools** (быстрая выборка страниц и пользователей сайта)
 - **SocialNetworks** (социальные сети)
 - **tinyCompressor** (автоматическая оптимизация загружаемых файлов)
 

### Ресурсы
 - Главная
 - Сервис
    - 403 (страница ошибки 403 «Доступ запрещен»)
    - 404 (страница ошибки 404 «Документ не найден»)
    - 503 (страница «Сайт недоступен»)
    - Карта сайта (HTML)
    - SiteMap (sitemap.xml)
    - Политика конфиденциальности

### Чанки
 - **head** 
 - **header**
 - **breadcrumbs**
 - **content**
 - **contacts**
 - **footer**

### Сниппеты
 - **hreflang** (создает hreflang теги)
 - **breadSchema** (создает семантическую разметку для хлебных крошек)

### Плагины
 - **Boilerplate**
    - привязывается CSS-файл к странице редактирования ресурсов(assets/boilerplate/mgr/manager.css)
    - сжимает вывод html для Google (можно отменить в системных настройках boilerplate_compress_output_html)
    - возможность спрятать вертикальный таб для tv(системная настройка boilerplate_hide_vtabs_tv)
    - модификаторы fenom:
        - alias (генерирует alias)
        - m2 (модифицирует строку m2 в квадратные метры)
        - phone (убирает лишние символы для номера телефона)
        - table (модифицирует значение поля table в таблицу)
 - **managerBreadCrumbs** (хлебные крошки в админке)
 - **changeContext** (переключение контекстов)
 - **uploadFiles** (запрещает загрузку файлов в корневой каталог)
 
### Системные настройки
**CORE**
 
 | Ключ | Значение | Описание |
 | -- | -- | -- | 
 | allow_multiple_emails | Нет | чтобы у каждого пользователя была своя электронная почта |
 | friendly_alias_realtime | Да | генерация псевдонима в реальном времени |
 | friendly_urls | Да | включение дружественных URL |
 | friendly_urls_strict | Да | строгий режим |
 | publish_default | Да | по умолчанию ресурс создаётся опубликованным |
 | use_alias_path | Да | чтобы в URL учитывался псевдоним родителя, а не его замороженный URL |
 | friendly_alias_translit | russian | настройка транслитерации |
 | resource_tree_node_name | menutitle | чтобы названия ресурсов в дереве были покороче |
 | resource_tree_node_tooltip | alias | чтобы можно было понять, какой у ресурса адрес |
 | locale | ru_RU.utf8 | вдруг, надо будет генерировать даты с названиями месецев |
 | request_method_strict | Да | отключение доступа к странице по id |
 | unauthorized_page | id 403 | id 403 страницы |
 | error_page_header | HTTP/1.0 404 Not Found | заголовок для 404 ошибки |
 | error_page | id 404 | id 404 страницы |
 | site_unavailable_page | id 503 | id 503 страницы |
 | log_deprecated | Нет | устаревшие функции в журнале ошибок |
 
 
**PDOTOOLS**

 | Ключ | Значение | Описание |
 | -- | -- | -- |
 | pdotools_fenom_default | 1 | использование Fenom в чанках |
 | pdotools_fenom_modx | 1 | разрешаем MODX в Fenom |
 | pdotools_fenom_parser | 1 | использование Fenom на страницах |
 | pdotools_elements_path | {core_path}/ | для загрузки файловых элементов |
 
**TINYCOMPRESSOR**

 | Ключ | Значение | Описание |
 | -- | -- | -- |
 | tinycompressor_tinypng_upload_enable | Да | сжимает загружаемые изображения |
 
**TINYMCERTE**

 | Ключ | Значение | Описание |
 | -- | -- | -- |
 | tinymcerte.plugins | advlist autolink lists modximage charmap print preview anchor visualblocks searchreplace code fullscreen insertdatetime media table contextmenu paste modxlink textcolor colorpicker template | Плагины |
 | tinymcerte.toolbar1 | undo redo \| styleselect \| backcolor forecolor bold italic \| alignleft aligncenter alignright alignjustify \| bullist numlist outdent indent \| link image \| template | Панель инструментов 1 |
 | tinymcerte.external_config | {assets_path}components/tinymcerte/js/external-config.json | Внешний конфиг |
 
**BOILERPLATE**

 | Ключ | Значение | Описание |
 | -- | -- | -- |
 | boilerplate_compress_output_html | Да | сжимает вывод html для Google |
 | boilerplate_tpl_css | <link rel="stylesheet" href="[[+file]]" media="print" onload="this.media='."'".all ."'".'"'.' > | Шаблон загрузки css |  
 | boilerplate_tpl_js | <link rel="preload" href="[[+file]]" as="script"><script src="[[+file]]" defer></script> | Шаблон загрузки js |
 | boilerplate_hide_vtabs_tv | Нет | Прячет вертикальный таб для tv |

## Другое
 - Установка HTTP заголовоков
    - X-Frame-Options:deny
    - X-XSS-Protection:1;mode=block
    - X-Content-Type-Options:nosniff
    - Referrer-Policy:no-referrer
    - Cache-Control: max-age=31536000, must-revalidate
 - Удаляется файл changelog.txt, чтобы убрать сообщение о том, что безопасность сайта не в порядке
 - Ппереименовываются файлы ht.access в корне и в папке /core/, чтобы заработали дружественные URL
 - Мменяем контент главного шаблона и делаем его статичным
 - Добавлены хуки для minifyX
    - libs.php (для загрузки библиотек)
    - ms2.php (инициализации minishop2, для поддержки асинхронной загрузке скриптов)
    - loading.php (для прелоудера)