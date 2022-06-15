<!-- view/music/detail.php -->
<?php $title = 'Product detail' ?>

<?php ob_start() ?>
<h1><?= $product['name'] ?></h1>

<dl>
    <dt>Name: </dt>
    <dd><?= $product['name'] ?></dd>
    <dt>Price: </dt>
    <dd><?= $product['price'] ?></dd>
    <dt>Status: </dt>
    <dd><?= $product['status'] ?></dd>
</dl>
<?php $isi = ob_get_clean() ?>

<?php include 'view/template.php' ?>