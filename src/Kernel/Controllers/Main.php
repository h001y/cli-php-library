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
        $result['arguments'] = [];
        $result['parametrs'] = [];
        foreach ($this->string as $item){
            if(preg_match('\'{.*}\'', $item)){
                $result['arguments'] = array_merge($result['arguments'], explode(',', $item));
            } elseif(preg_match('\'\\[.*\\]\'', $item)){
                $result['parametrs'] = explode(',', $item);

            }
        }
        return $result;
    }

}