<h1><?=$title?></h1>
<form method="post">
    <div class="form-group">
        <label>Titre</label>
        <input class="form-control" name="book[title]" type="text" value="<?= isset($book)?$book->title:""?>">
    </div>
    <div class="form-group">
        <label>Auteur</label>
        <input class="form-control" name="book[author]" type="text" value="<?= isset($book)?$book->author:""?>">
    </div>
    <div class="form-group">
        <label>Genre</label>
        <input class="form-control" name="book[genre]" type="text" value="<?= isset($book)?$book->genre:""?>">
    </div>
    <div class="form-group">
        <label>Editeur</label>
        <input class="form-control" name="book[editor]" type="text" value="<?= isset($book)?$book->editor:""?>">
    </div>
    <div class="form-group">
        <label>Prix</label>
        <input class="form-control" name="book[price]" type="text" value="<?= isset($book)?$book->price:""?>">
    </div>
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary btn-block">
            Valider
        </button>
    </div>
</form>
