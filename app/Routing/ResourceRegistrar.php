<?php

namespace App\Routing;

use Illuminate\Routing\ResourceRegistrar as OriginalRegistrar;

class ResourceRegistrar extends OriginalRegistrar
{
    //добавляю в resourse уще один роут 'restore'

    protected $resourceDefaults = ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy', 'restore', 'finaldestroy'];

    protected function addResourceRestore($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name).'/{restore}/restore';

        $action = $this->getResourceAction($name, $controller, 'restore', $options);

        return $this->router->get($uri, $action);
    }

    protected function addResourceFinaldestroy($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name).'/{finaldestroy}/finaldestroy';

        $action = $this->getResourceAction($name, $controller, 'finaldestroy', $options);

        return $this->router->delete($uri, $action);
    }
}
