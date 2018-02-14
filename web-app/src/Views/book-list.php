<!-- Affichage de la liste des livres dans un tableau html -->

<h1>LISTE DES LIVRES</h1>
<a href="<?= BASE_URL ?>/book/new" class=" btn btn-primary" style="margin-bottom: 15px;">Nouveau Livre</a>
<table class="table table-bordered table-striped">
<tr>
    <th>Titre</th>
    <th>Auteur</th>
    <th>Genre</th>
    <th>Editeur</th>
    <th>Prix</th>
    <th>Action</th>
</tr>

<!-- Les : évite de se retrouver avec en fin de foreach <}> -->
<?php foreach ($bookList as $id => $book): ?>
    <tr>
        <td><?= $book->title ?></td>
        <td><?= $book->author ?></td>
        <td><?= $book->genre ?></td>
        <td><?= $book->editor ?></td>
        <td><?= $book->price ?></td>
        <td><a href="<?=BASE_URL?>./book/delete/<?=$book->id?>" class="btn btn-danger">Supprimer</a></td>
    </tr>
<?php endforeach ?>
</table>


<?php
