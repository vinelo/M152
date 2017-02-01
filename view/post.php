<?php include 'layout/header.php' ?>
<form action="?action=home" method="post" class="form-horizontal" enctype="multipart/form-data">
    <!-- Input de l'image -->
    <div class="form-group">
        <label for="Image" class="col-sm-3 control-label">Description</label>
        <div class="col-sm-9">
            <input type="file">
        </div>
    </div>
    <!-- Input de la description -->
    <div class="form-group">
        <label for="Commentaire" class="col-sm-3 control-label">Description</label>
        <div class="col-sm-9">
            <textarea class="form-control" rows="6" name="description"></textarea>
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
