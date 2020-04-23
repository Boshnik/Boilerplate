<?php
$classForm = 'modFormCustomizationProfile';
$classFormSet = 'modFormCustomizationSet';
$actionDom = 'modActionDom';
$classTV = 'modTemplateVar';
$resPagetitle = 'Base of blocks';


$defaultSet = array(
    'description' => '',
    'constraint_field' => 'id',
    'constraint' => '',
    'constraint_class' => 'modResource',
    'active' => 1,
    'action' => 'resource/update',
    'container' => 'modx-resource-tabs',
    'rule' => 'tabVisible',
    'value' => 0,
);


$profiles = array(
    'Base of blocks' => array(
        'action' => 'resource/update',
        'active' => true,
        'rule' => array(
            'modx-resource-content' => array(
                'container' => 'modx-panel-resource',
                'rule' => 'fieldVisible',
            ),
            'modx-resource-settings' => array(
                'rule' => 'tabTitle',
                'value' => 'Blocks',
            ),
            'modx-resource-main-left' => array(),
            'modx-resource-main-right' => array(),
            'modx-page-settings' => array(),
            'modx-panel-resource-tv' => array(),
            'modx-resource-access-permissions' => array(),
        ),
        'tvs' => array(
            'constructor' => array(
                'container' => 'modx-panel-resource',
                'rule' => 'tvMove',
                'value' => 'modx-resource-settings'
            ),  
        ),
    )    
);


if ($object->xpdo) {
    /* @var modX $modx */
    $modx =& $object->xpdo;
    
    /** @var $options */
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            
            if(!$res = $modx->getObject('modResource', array('pagetitle' => $resPagetitle))) {
                break;
            }
            
            $defaultSet['constraint'] = $res->get('id');
            
            foreach($profiles as $name => $value) {
                
                // modFormCustomizationProfile - modx_fc_profiles
                if (!$profile = $modx->getObject($classForm, array('name' => $name))) {
                    $modx->log(modX::LOG_LEVEL_INFO, 'Run <b>Form customisation</b>');
                    $profile = $modx->newObject($classForm, array('name' => $name, 'active' => true));
                    $profile->save();
                } else {
                    continue;
                }
                
                $defaultSet['profile'] = $profile->get('id');
                
                // modFormCustomizationSet - modx_fc_sets
                $setValue = array_merge($defaultSet, $value);
                unset($setValue['container']);
                unset($setValue['rule']);
                unset($setValue['value']);
                unset($setValue['tvs']);
                if (!$formSet = $modx->getObject($classFormSet, $setValue)) {
                    $formSet = $modx->newObject($classFormSet);
                    $formSet->fromArray($setValue);
                    $formSet->save();
                }
                $defaultSet['set'] = $formSet->get('id');
                
                
                foreach($value['tvs'] as $n => $r) {
                    if ($tv = $modx->getObject($classTV, array('name' => $n))) {
                        $value['rule']["tv{$tv->get('id')}"] = $r;
                    }
                }
                
                // modAction - modx_actions
                foreach($value['rule'] as $n => $r) {
                    if(!$rule = $modx->getObject($actionDom, array('name' => $n))) {
                        $rule = $modx->newObject($actionDom, array('name' => $n));
                    }
                    
                    $rule->fromArray(array_merge($defaultSet, $r));
                    $rule->save();
                }
                
            }
            
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            foreach($profiles as $name => $value) {
                if ($profile = $modx->getObject($classForm, array('name' => $name))) {
                    if ($profile->remove() == false) {
                       echo "An error occurred while trying to remove the profile $name!";
                    }
                }
            }
            break;
    }
}    
return true;