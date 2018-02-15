<?php
use RedBeanPHP\R as R;
//Création de l'auteur
$author = R::dispense("author");
$author->name = "Platon";
//Création des livres
list($book1, $book2) = R::dispense("book", 2);
$book1->title = "La République";
$book2->title = "Le Banquet";
//Association entre l'auteur et les livres
$author->ownBookList[] = $book1;
$author->ownBookList[] = $book2;
print_r(R::dump($author->ownBookList));