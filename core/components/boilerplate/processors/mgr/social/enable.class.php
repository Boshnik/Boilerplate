<?php

class BoilerplateSocialEnableProcessor extends modObjectProcessor
{
    public $objectType = 'BoilerplateSocial';
    public $classKey = 'BoilerplateSocial';
    public $languageTopics = ['boilerplate'];
    //public $permission = 'save';


    /**
     * @return array|string
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        $ids = $this->modx->fromJSON($this->getProperty('ids'));
        if (empty($ids)) {
            return $this->failure($this->modx->lexicon('boilerplate_social_err_ns'));
        }

        foreach ($ids as $id) {
            /** @var BoilerplateItem $object */
            if (!$object = $this->modx->getObject($this->classKey, $id)) {
                return $this->failure($this->modx->lexicon('boilerplate_social_err_nf'));
            }

            $object->set('active', true);
            $object->save();
        }

        return $this->success();
    }

}

return 'BoilerplateSocialEnableProcessor';
