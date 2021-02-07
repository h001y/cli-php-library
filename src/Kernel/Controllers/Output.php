<?php
namespace Kernel\Controllers;

use Kernel\Exceptions\CliException;

Class Output extends Main
{
    protected function checkParams()
    {
        $this->getParam();
    }

    public function execute()
    {
        var_dump( $this->getParam());
    }

    public function executeEmty()
    {
        echo 'Output for empty command name';
    }
}

