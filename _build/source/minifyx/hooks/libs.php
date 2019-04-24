<?php
// Список библиотек
$libs = array(
    'css' => explode(',', $MinifyX->config['libsCss']),
    'js' => explode(',', $MinifyX->config['libsJs'])
);

// Опции сниппета
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

// Подключаем группы
$groups = [];
$groupsFile = MODX_CORE_PATH . 'components/minifyx/config/groups.php';
if (file_exists($groupsFile)) {
    $groups = include $groupsFile;
} else {
    return;
}

// Сохраняем хуки
$hooks = $MinifyX->config['hooks'];
// Очищаем хуки, чтобы они не выволнялись во время нашего прехука
$MinifyX->setConfig(array('hooks' => array()));

foreach ($libs as $type => $value){
    if (empty($value)) {continue;}
    
    foreach($value as $lib) {
        
        $lib = explode('--',$lib);
        
        // Если есть модификатор inline, 
        // значит печатаем содержимое файла
        $inline = false;
        if(count($lib) > 1 && $lib[1] == 'inline') {
            $inline = true;
        }
        
        $lib = $lib[0];
        $libValue = $groups[$lib];
        
        // $lib должен быть массивом
        if(!is_array($libValue)) {continue;}
        
        // Получаем длинну массива
        $libLength = count($libValue);
        
        // Если длина массива больше 1, значит обрабатываем файлы через minifyx
        if($libLength > 1 || $inline) {
            
            $libName = str_replace(ucfirst($type),'',$lib);
            $filename = $libName . $type;
            $MinifyX->setConfig( array($filename . 'Filename' => $libName) );
            $MinifyX->setConfig( array($filename . 'Ext' => '.min.' . $type) );
            
            $prepareFiles = $MinifyX->prepareFiles($libValue, $filename);
            $fileMune = $MinifyX->Munee('.'.$prepareFiles, array( 'minify' => $options['minify'][$type] ? 'true' : 'false'));
            $file = $MinifyX->saveFile($fileMune);
            $fileUrl = $MinifyX->getFileUrl();
            
        } else {
            $fileUrl = $libValue[0];
        }
        
        
        // Создаем шаблон для вывода
        if($inline) {
            // Получаем содержимое файла
            $content = file_get_contents(MODX_BASE_PATH . $fileUrl);
            // $content = $MinifyX->getContent();
            if($content !== false) {
                if($type == 'css') {
                    $tag = "<style id='$lib'>$content</style>";
                } else {
                    $tag = "<script id='$lib'>$content</script>";
                }
            } else {
                $modx->log(xPDO::LOG_LEVEL_DEBUG,'Не возможно получить содержимое файла: '. $groups[$lib[0]]);
            }
        } else {
            $tag = str_replace('[[+file]]', $fileUrl, $options['tpl'][$type]);    
        }

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

}

// Возвращаем все хуки обратно
$MinifyX->setConfig(array('hooks' => $hooks));