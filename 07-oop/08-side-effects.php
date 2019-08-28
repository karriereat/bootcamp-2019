<?php

const SERVERNAME = 'localhost:8080';


/**
 * Always avoid to accessing things outside of your class
 */
class Request
{
    public function getVariable($name)
    {
        return $_GET[$name] ?? null;
    }

    public function makeFullPath($path){
        return SERVERNAME . '/' . $path;
    }
}

$request = new Request();
echo $request->getVariable('userId') . "\n";
echo $request->makeFullPath('user/2') . "\n";


/**
 * Give external data to your class instance
 */
class BetterRequest {

    private $queryParams;
    private $serverName;

    /**
     * BetterRequest constructor.
     */
    public function __construct(array $queryParams, string $serverName)
    {
        $this->queryParams = $queryParams;
        $this->serverName = $serverName;
    }

    public function getVariable($name)
    {
        return $this->queryParams[$name] ?? null;
    }

    public function makeFullPath($path){
        return $this->serverName . '/' . $path;
    }
}

$request = new BetterRequest($_GET, SERVERNAME);
echo $request->getVariable('userId') . "\n";
echo $request->makeFullPath('user/2') . "\n";
