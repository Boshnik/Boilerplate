<?php
// Работаем только на фронтенде и только с friendly urls
if ($modx->event->name != 'OnMODXInit' || $modx->context->key == 'mgr' || !$modx->getOption('friendly_urls')) {return;}

// Получаем запрашиваемый url
$alias = $modx->getOption('request_param_alias', null, 'alias', true);
$request = &$_REQUEST[$alias];

// Выбираем контексты с настройкой base_url
$q = $modx->newQuery('modContextSetting', array('key' => 'base_url', 'value:!=' => ''));
$q->select('context_key,value');

$contexts = array();
$tstart = microtime(true);
if ($q->prepare() && $q->stmt->execute()) {
	// Учитываем наш запрос в БД
	$modx->queryTime += microtime(true) - $tstart;
	$modx->executedQueries++;
	// Разбираем результаты
	while ($row = $q->stmt->fetch(PDO::FETCH_ASSOC)) {
		$base_url = trim($row['value'], '/');
		$context = $row['context_key'];
		// Если запрос начинается с base_url какого-то контекста
		if (preg_match('/^('.$base_url.')\//i', $request)) {
			// То переключаемся на этот контекст
			// Web инициализируется в index.php - на него переключаться не нужно
			if ($context != 'web') {
				$modx->switchContext($context);
			}
			// Вырезаем base_url из запроса, чтобы MODX нашел ресурс по uri
			$request = preg_replace('/^'.$base_url.'\//', '', $request);
			// Дело сделано - выходим из цикла
			break;
		}
	}
}