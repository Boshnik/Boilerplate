<?php

namespace Boshnik\Boilerplate\Events;

abstract class Event
{
    public function __construct(protected modX $modx, protected array $scriptProperties) {}

    abstract public function run();
}