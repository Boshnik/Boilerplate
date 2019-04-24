--------------------
Boilerplate
--------------------
Author: Aleksandr Huz <Superboshnik@gmail.com>
--------------------

Совместимость скриптов компонентов при асинхронной загрузке основных скриптов:

1. AjaxForm
 - добавить в параметр libsJs сниппета minifyX значения = ajaxFormJs,ajaxFormJsInit--inline
 - добавить к вызову ajaxForm параметры:
    'frontend_css' => '',
    'frontend_js' => '',
    
2. pdoTools(pdoPage)
 - добавить в параметр libsJs сниппета minifyX значения = pdoPageJs,pdoPageJsInit--inline
 - добавить к вызову pdoPage параметры:
    'frontend_css' => '',
    'frontend_js' => '',
    'frontend_startup_js' => ' ',

3. minishop2
 - добавить в параметр preHooks сниппета minifyX хук ms2