<?php

namespace Kernel\Controllers;

class System
{
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

    public function addUserClass($className, $classText)
    {
        $filename = 'src/UserControllers/' . $className . '.php';
        file_put_contents($filename, $classText);
    }
}
