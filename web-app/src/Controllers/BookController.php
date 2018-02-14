<?php

namespace m2i\Controllers;

use m2i\framework\View;
use RedBeanPHP\R as R;

class BookController
{
    /**
     * @var View
     */
    private $view;

    /**
     * BookController constructor.
     */
    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Affichage de la liste des livres
     */
    public function listAction()
    {
        // Récupération de la liste des livres
        $bookList = R::findAll("books");
        //$view = new View();
        echo $this->view->render("book-list", ["bookList" => $bookList]);
    }

    /**
     *
     */
    public function newAction()
    {
        //Traitement éventuel du formulaire   En post via le submit du formulaire
        $isPosted = filter_has_var(INPUT_POST, "submit");
        if ($isPosted) {
            //Création d'une entité à partir des données postées
            $book = R::dispense("books");
            // Avec Import on fait une hydratation !!!!!
            $book->import($_POST["book"]); //Le nom des champs doit correspondre aux champs du formulaire
            R::store($book);
            header("location:" . BASE_URL . "/book/list");
        }
        echo $this->view->render("book-form", ["title" => "Nouveau Livre"]);
    }

    public function testAction()
    {
        include ROOT_PATH . "/src/views/vues-sans-classe.php";
    }

    public function deleteAction($id)
    {
        // Charger le livre
        $book = R::load("books", $id);
        R::trash($book);
        // REdirection vers la liste des livres
        header("location:" . BASE_URL . "/book/list");
    }

    public function updateAction($id)
    {
        // Chargement du livre à modifier
        $book = R::load("books", $id);

        // TRaitement éventuel du formulaire
        $isPosted = filter_has_var(INPUT_POST, "submit");
        if ($isPosted) {
            //Création d'une entité à partir des données postées
            $book->import($_POST["book"]); //Le nom des champs doit correspondre aux champs du formulaire
            R::store($book);
            header("location:" . BASE_URL . "/book/list");
        }
        echo $this->view->render("book-form", ["title" => "Modification d'un livre","book"=>$book]);
    }
}