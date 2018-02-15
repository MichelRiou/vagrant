<?php
namespace m2i\framework;
// Spécification du namespace à utiliser pour le création de la classe Views

class View
{

    /**
     * @param string $view
     * @param array $params
     * @return string
     */
    private function getHtmlContent(string $view, array $params)
    {
        //Mise en tampon de la sortie
        //L'interprétation PHP n'est pas immédiatement envoyée à la réponse HTTP
        ob_start();

        // extraction des paramètres
        // chaque clef du tableau associatif est transformé en une variable
        // disponible pour la vue
        extract($params);

        include ROOT_PATH."/src/views/${view}.php";
        //Récupération du contenu de la mémoire tampon dans une variable
        $content = ob_get_clean();

        return $content;
    }

    public function render(string $view, array $params){
        //Récupération du code de la vue
        var_dump($params);
        $viewContent = $this->getHtmlContent($view, $params);
        //Ajout de viewContent aux paramètres
        $params["viewContent"] = $viewContent;
        var_dump($params);
        //Insertion de viewContent dans le layout
        return $this->getHtmlContent("layout", $params);
    }
}