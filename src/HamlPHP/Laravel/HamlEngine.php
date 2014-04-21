<?php

namespace HamlPHP\Laravel;


class HamlEngine implements \Illuminate\View\Engines\EngineInterface
{
    private $hamlphp;
    
    public function __construct(\HamlPHP\HamlPHP $hamlphp)
    {
        $this->hamlphp = $hamlphp;
    }
    
    public function get($path, array $data = array())
    {
        $content = $this->hamlphp->parseFile($path);
        
        return $this->hamlphp->evaluate($content, $data);
    }
}

