<?php
namespace holyCommand\Controllers;

use holyCommand\Exceptions\CliException;

Class Test
{
    private array $params;

    publuc function __construct(array $params)
    {
        $this->params = $params;
        $this->CheckParams();
    }

    public function execute()
    {
        echo $this->getParam('a') + $this->getParam('b');
    }

    private function checkParams()
    {
        $this->ensureParamExists('a');
        $this->ensureParamExists('b');
    }

    private function getParam(string $paramName) : string
    {
        return $this->params[$paramName] ?? '';
    }

    private function isParamExist(string $paramName)
    {
        if (!isset($this->params[$paramName])) {
            throw new CliException('Param with name "' . $paramName . '" is not set!');
        }
    }
}

