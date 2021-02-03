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
        echo '123 \n\n';
    }
}

