<?php

class BoilerplateCounterCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'BoilerplateCounter';
    public $classKey = 'BoilerplateCounter';
    public $languageTopics = ['boilerplate'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('boilerplate_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('boilerplate_counter_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'BoilerplateCounterCreateProcessor';