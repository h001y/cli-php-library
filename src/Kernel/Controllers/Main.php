<?php

namespace Kernel\Controllers;

use Kernel\Exceptions\CliException;

abstract class Main
{
    private $string;

    public function __construct(array $string)
    {
        $this->string = $string;
        $this->checkParams();
    }

    abstract public function execute();

    abstract protected function checkParams();

    protected function getParam() : array
    {
        $result = [];
        foreach ($this->string as $item){
            preg_match('{.*}', $item, $params);
            if(!empty($params)){
                $result[] = $params;
            }
        }
        return $result;
    }

}