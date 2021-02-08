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
    public function executeEmty() : string
    {
        $result = '';
        $user_controllers = [];
        $result .= 'List of command :'.PHP_EOL;
        $result .= 'Output - make output console for arguments and names for [], {} '.PHP_EOL;
        $user_controllers = scandir('src/UserControllers');
        foreach ($user_controllers as $user_controller){
            if($user_controller !== '.' && $user_controller !== '..'){
                $result .=  pathinfo($user_controller, PATHINFO_FILENAME)
                $result .= ' - user controller '.PHP_EOL;
            }
        }
        return $result;
    }
}

