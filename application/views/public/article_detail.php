<?php include ('public_header.php')  ?>

<div class="container">

    <div class="row">

    <div class="col-sm-6">
    <h1 style="color: #97310e">
        <?= $articleDetails->title?>

    </h1>
    <p>
        <?= $articleDetails->body?>
    </p>
    <?php if (!is_null($articleDetails->image_path)): ?>
    </div>
        <div class="col-sm-6">

    <img src="<?= $articleDetails->image_path ?>">

    <?php endif; ?>

    </div>

</div>

<?php include ('public_footer.php')  ?>
