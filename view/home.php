
<?php include 'layout/header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <figure>
                <img src="./image/arnold.jpg" class="img-thumbnail" alt="Arnold" width="304" height="236"> 
            </figure>
        </div>
    </div>

    <section>
        <?php foreach ($posts as $post) { ?>
        <br/>
            <article class="row">

                <div class="col-md-4">
                    <figure><img src="./image/<?= $post['nomUniqueMedia'] ?>"  alt=<?= $post['nomMedia'] ?> class="img-thumbnail"> </figure>
                </div>
                <div class="col-md-8">
                    <p><?= $post['commentaire'] ?></p>
                </div>
                
            </article>
        
        <?php } ?>
    </section>




</div>