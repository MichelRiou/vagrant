<?php
namespace m2i\framework;


class Dispatcher
{
    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var string
     */
    private $controllerNameSpace;

    /**
     * Dispatcher constructor.
     * @param RouterInterface $router
     * @param string $controllerNameSpace
     */
    public function __construct(RouterInterface $router, $controllerNameSpace)
    {
        $this->router = $router;
        $this->controllerNameSpace = $controllerNameSpace;
    }

    /**
     * Instancie une classe contrôleur
     * et exécute une méthode action sur cette classe
     * en lui passant des paramètres
     */
    public function dispatch(){
        $className = $this->controllerNameSpace.$this->router->getControllerName();
        //Instanciation du contrôleur
        $controllerInstance = new $className();

        //Exécution de la méthode actionName sur controllerInstance
        //En passant les paramètres actionParameters
        call_user_func_array(
            [$controllerInstance, $this->router->getActionName()],
            $this->router->getActionParameters()
        );
    }


}