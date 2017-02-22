<?php include 'layout/header.php' ?>
<form action="?action=addPost" method="post" class="form-horizontal" enctype="multipart/form-data">
    <!-- Input de l'image -->
    <div class="form-group">
        <label for="Image" class="col-sm-3 control-label">Image</label>
        <div class="col-sm-9">
            <input type="file" name="image[]" accept="image/gif, image/jpeg, image/png">
        </div>
    </div>
    <!-- Input de la description -->
    <div class="form-group">
        <label for="Commentaire" class="col-sm-3 control-label">Commentaire</label>
        <div class="col-sm-9">
            <textarea class="form-control" rows="6" name="comment"></textarea>
        </div>
    </div>

    <!-- Submit -->
        <div class="row">
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-9">
                    <button type="submit" class="btn btn-default" name="addPost">Envoyer</button>
                </div>
            </div>
        </div>
</form>
