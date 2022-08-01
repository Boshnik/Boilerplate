<?php

namespace Boshnik\Boilerplate\Events;

abstract class Event
{

    /** @var modX $modx */
    protected $modx;

    /** @var array $scriptProperties */
    protected $scriptProperties;

    public function __construct($modx, &$scriptProperties)
    {
        $this->modx = $modx;
        $this->scriptProperties =& $scriptProperties;
    }

    abstract public function run();
}