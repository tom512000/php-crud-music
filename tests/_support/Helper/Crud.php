<?php

namespace Tests\Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Codeception\Exception\ModuleException;
use Database\MyPdo;

class Crud extends \Codeception\Module
{
    public function _initialize($settings = [])
    {
        try {
            MyPdo::setConfiguration($this->getModule('Db')->_getConfig('dsn'));
        } catch (ModuleException $moduleException) {
            $this->fail('Codeception DB module not found');
        }
    }
}
