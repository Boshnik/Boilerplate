<?php
$options = array(
    'register' => [
        'css' => $MinifyX->config['registerCss'],
        'js' => $MinifyX->config['registerJs']
    ],
    'minify' => [
        'css' => $MinifyX->config['minifyCss'],
        'js' => $MinifyX->config['minifyJs']
    ],
    'tpl' => [
        'css' => $MinifyX->config['cssTpl'],
        'js' => $MinifyX->config['jsTpl']
    ]
);

// Инициализируем miniShop2
$basePath = MODX_ASSETS_URL . 'components/minishop2/';
$data = json_encode(array(
    'cssUrl' => $basePath.'css/web/',
    'jsUrl' => $basePath.'js/web/',
    'actionUrl' => $basePath.'action.php',
    'ctx' => $modx->context->key,
    'close_all_message' => '',
    'price_format' => json_decode( $modx->getOption('ms2_price_format', null, '[2, ".", " "]'), true ),
    'price_format_no_zeros' => (bool)$modx->getOption('ms2_price_format_no_zeros', null, true),
    'weight_format' => json_decode( $modx->getOption('ms2_weight_format', null, '[3, ".", " "]'), true ),
    'weight_format_no_zeros' => (bool)$modx->getOption('ms2_weight_format_no_zeros', null, true),
), true);

$modx->regClientScript("<script>miniShop2Config = {$data};</script>");

// Получаем стили и скрипты
$ms2_frontend = array(
    'css' => str_replace('[[+cssUrl]]', $basePath . 'css/', $modx->getOption('ms2_frontend_css')),
    'js' => str_replace('[[+jsUrl]]', $basePath . 'js/', $modx->getOption('ms2_frontend_js')),
);

foreach($ms2_frontend as $type => $value) {
    
    $tag = str_replace('[[+file]]', $value, $options['tpl'][$type]);
    
    // Регистрируем код
    if($type == 'css') {
        $modx->regClientCSS($tag);    
    } else {
        if ($options['register']['js'] == 'startup') {
            $modx->regClientStartupScript($tag);
        }
        else {
            $modx->regClientScript($tag);
        }
    }
}

// Утснавливаем пустое значение в настройках, чтобы не запускались стили и скрипты
$modx->setOption('ms2_frontend_css','');
$modx->setOption('ms2_frontend_js','');

// Очищаем кеш настроек
$modx->cacheManager->refresh(array('system_settings' => array()));        