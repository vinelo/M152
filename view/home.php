
<?php include 'layout/header.php'; ?>
<div class="container">
    <div class="row">

        <figure class="col-md-4 col-md-offset-4">
            <img src="./image/arnold.jpg" class="img-thumbnail img-responsive center-block" alt="Arnold" width="304" height="236"> 
        </figure>
    </div>

    <section>
        <?php foreach ($posts as $post) { ?>
            <br/>
            <article class="row">
                <?php $images = getImages($post['idPost']) ?>
                <?php foreach ($images as $image) { ?>
                    <?php if ($image['typeMedia'] == "image/gif" || $image['typeMedia'] == "image/jpeg" || $image['typeMedia'] == "image/png") {
                        ?>
                        <figure class="col-md-8 col-md-offset-2"><img src="./image/<?= $image['idMedia'] ?>"  alt="<?= $image['nomMedia'] ?>" class="img-thumbnail img-responsive center-block"> </figure>
                    <?php } elseif ($image['typeMedia'] == "video/mp4" || $image['typeMedia'] == "video/x-m4v") { ?>
                        <div align="center" class="embed-responsive embed-responsive-16by9">
                            <video controls class="embed-responsive-item">
                                <source src="./image/<?= $image['idMedia'] ?>" type="video/mp4">
                            </video>
                        </div>
                        <?php
                    }
                }
                ?>

                <figcaption class="col-md-10 col-md-offset-2"><?= $post['commentaire'] ?></figcaption>   
                <pre>
                </pre>
            </article>

        <?php } ?>
    </section>
</div>