<?php

namespace Kernel\Controllers;

class System
{
    const SYSTEM_NAMES = ['Output', 'output', 'System', 'system'];
    /**
     * Class check existing class from command name in Kernel
     * @param string $className
     * @return bool
     */
    public function isSystemClassExist(string $className) : bool
    {
        return file_exists('src/Kernel/Controllers/' . $className . '.php');
    }

    /**
     * Class check existing class from command name in UserControllers
     * @param string $className
     * @return bool
     */
    public function isUsersClassExist(string $className) : bool
    {
        return file_exists('src/UserControllers/' . $className . '.php');
    }

    /**
     * Adding UserClass
     * @param $className
     * @param $classText
     */
    public function addUserClass($className, $classText)
    {
        $filename = 'src/UserControllers/' . $className . '.php';
        return file_put_contents($filename, $classText);
    }

    /**
     * Check for equal input name for system name
     * @param $className
     * @return bool
     */
    public function isInputNameEqualSystem($className) : bool
    {
        if (in_array(self::SYSTEM_NAMES, $className)) {
            return false;
        }
        return true;
    }

    /**
     * Is current class - system output class
     * @param $className
     * @return bool
     */
    public function isCurrentClassOutput($className) : bool
    {
        if($className == 'Output' || $className == 'output')
        {
            return true;
        }
        return false;
    }
}
