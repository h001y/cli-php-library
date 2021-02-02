<?php
namespace Kernel\Controllers;

use Kernel\Exceptions\CliException;

Class Test extends Main
{
    protected function checkParams()
    {
        $this->ensureParamExists('a');
        $this->ensureParamExists('b');
    }

    public function execute()
    {
        echo $this->getParam('a') + $this->getParam('b');
    }
}

