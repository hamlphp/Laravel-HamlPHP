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
        $this->registerViewExtension();
    }
    
    private function registerHamlEngine()
    {
        $app = $this->app;
        
        $app->bindShared('hamlphp', function() use ($app) {
            $cache = $app['path.storage'].'/views';
            
            $hamlphp = new \HamlPHP(new \FileStorage($cache));
            
            return $hamlphp;
        });
    }
    
    private function registerViewExtension()
    {
        $app = $this->app;
        
        $app['view']->addExtension('haml.php', 'haml', function() use ($app) {
            return new HamlEngine($app['hamlphp']);
        });
    }
    
    public function provides()
    {
        return array('hamlphp');
    }
}

