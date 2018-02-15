<?php
namespace m2i\framework;
// Spécification du namespace à utiliser pour le création de l'interface RouterInterface
interface RouterInterface
{
    /**
     * @return string
     */
    public function getUrl();

    /**
     * @return string
     */
    public function getControllerName();

    /**
     * @return string
     */
    public function getActionName();

    /**
     * @return array
     */
    public function getActionParameters();
}