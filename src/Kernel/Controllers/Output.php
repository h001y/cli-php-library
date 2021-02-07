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

    /**
     * Return string for empty command_name
     * @return string
     */
    public function executeEmty()
    {
        return 'Output for empty command name'.PHP_EOL;
    }
}

