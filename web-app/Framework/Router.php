<?php
namespace m2i\framework;


class Router implements RouterInterface
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $controllerName = "DefaultController";

    /**
     * @var string
     */
    private $actionName = "defaultAction";

    /**
     * @var array
     */
    private $actionParameters = [];


    /**
     * Router constructor.
     * @param string $url
     */
    public function __construct($url)
    {
        $this->url = $url;

        $this->matchRoute();
    }

    /**
     * Convertir un url en :
     *  - un nom de contrôleur,
     *  - un nom d'action
     *  - et un tableau de paramètres
     */
    private function matchRoute(){
        $urlParts = explode("/", $this->url);

        //Récupération du nom du contrôleur
        if(count($urlParts) >0 && ! empty($urlParts[0])){
            $this->controllerName = ucfirst(array_shift($urlParts))."Controller";
        }
        //Récupération de l'action
        if(count($urlParts) >0 && ! empty($urlParts[0])){
            $this->actionName = array_shift($urlParts)."Action";
        }
        //Récupération des paramètres
        if(count($urlParts) >0){
            $this->actionParameters = $urlParts;
        }
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Router
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @param string $controllerName
     * @return Router
     */
    public function setControllerName($controllerName)
    {
        $this->controllerName = $controllerName;
        return $this;
    }

    /**
     * @return string
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @param string $actionName
     * @return Router
     */
    public function setActionName($actionName)
    {
        $this->actionName = $actionName;
        return $this;
    }

    /**
     * @return array
     */
    public function getActionParameters()
    {
        return $this->actionParameters;
    }

    /**
     * @param array $actionParameters
     * @return Router
     */
    public function setActionParameters($actionParameters)
    {
        $this->actionParameters = $actionParameters;
        return $this;
    }




}