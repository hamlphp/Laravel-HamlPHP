<?php

namespace HamlPHP\Laravel;

/**
 * Registers HamlPHP engine to IoC.
 * 
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->registerHamlEngine();
    }
    
    private function registerHamlEngine()
    {
        $app = $this->app;
        
        $resolver = $app['view.engine.resolver'];
        
        $resolver->register('haml', function() use ($app) {
            $cache = $app['path.storage'].'/views';
            
            $hamlphp = new \HamlPHP\HamlPHP(new \HamlPHP\FileStorage($cache));
            
            return new HamlEngine($hamlphp);
        });
    }
}

