<?php
ini_set("display_errors,1   ");
use RedBeanPHP\R as R;
use m2i\framework\Router;
use m2i\framework\Dispatcher;

define("ROOT_PATH", dirname(__DIR__));
define("BASE_URL","http://192.168.33.10");
include ROOT_PATH . "/vendor/autoload.php";
// $path = filter_input(INPUT_GET, "path");


$dsn = "mysql:host=localhost;dbname=redbean;charset=utf8";
$user = "root";
$pass = "123";

//Initialisation de la connexion à une base MySQL ou MariaDB
R::setup($dsn, $user, $pass);

$path=filter_input(INPUT_GET,"path");
$router= new Router($path);
$dispatcher= new Dispatcher($router,"m2i\\Controllers\\");
$dispatcher->dispatch();



/*$bookData = [
    ["Les chants de Maldoror", "Lautréamont", 15.8, "Poésie", "Actes Sud"],
    ["Une saison en enfer", "Arthur Rimbaud", 11.5, "Poésie", "Gallimard"],
    ["Alcool", "Guillaume Apollinaire", 8.2, "Poésie", "Actes Sud"],
    ["Les chants de Maldoror", "Lautréamont", 15.8, "Poésie", "PUF"],
    ["Discours de la méthode", "René Descartes", 12.8, "Philosophie", "Hachette"],
    ["La République", "Platon", 11.8, "Philosophie", "Gallimard"],
    ["Pensées", "Blaise Pascal", 9.8, "Philosophie", "Hachette"],
    ["Le Banquet", "Platon", 12.8, "Philosophie", "PUF"],
];
//Suppression de tous les livres
R::wipe( "books" );
foreach ($bookData as $data){
    $book = R::dispense("books");
    $book->title = $data[0];
    $book->author = $data[1];
    $book->price = $data[2];
    $book->genre = $data[3];
    $book->editor = $data[4];
    R::store($book);
}
$bookList=R::findAll(books);
echo "<ul>";
foreach($bookList as $id =>$book){
    echo "<li>" . $book["title"] ."</li>";

}
echo "</ul>";*/

