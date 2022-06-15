<!-- view/product/form.php -->
<?php
$request = preg_replace("|/*(.+?)/*$|", "\\1", $_SERVER['PATH_INFO']);
$uri = explode('/', $request);

// Set form action
if ($uri[1] === 'edit') {
    $title = 'Edit Product';
    $form_action = "/index.php/product/edit?id=" . $_GET['id'];
} else {
    $title = 'Create Product';
    $form_action = "/index.php/product/create";
}

$valName = isset($product['name']) ? $product['name'] : '';
$valPrice = isset($product['price']) ? $product['price'] : '';
$valStatus = isset($product['status']) ? $product['status'] : '';
$valId = isset($product['id']) ? $product['id'] : '';
?>

<?php ob_start() ?>
<h1><?= $title ?></h1>

<form action="<?= $form_action ?>" method="post">
    <?php if ($valId) : ?>
        <input type="hidden" name="id" value="<?= $valId ?>">
    <?php endif ?>

    <div class="form-group">
        <label for="name">Name</label>
        <input name="name" type="text" value="<?= $valName ?>" class="form-control" id="name" placeholder="Name">
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input name="price" type="number" value="<?= $valPrice ?>" class="form-control" id="price" placeholder="Price">
    </div>
    <br>

    <div class="form-group">
        <label for="status">Status</label>

        <?php
        $status = $valStatus ? 'checked' : '';
        ?>
        <input name="status" class="form-control" id="status" type="checkbox" value="<?= $valStatus ?>" <?= $status ?> data-toggle="toggle" data-size="sm">
    </div>
    <br>

    <button class="btn btn-primary" type="submit">
        <?php
        if ($valId) {
            echo 'Save';
        } else {
            echo 'Create';
        }
        ?>
    </button>
</form>
<?php $isi = ob_get_clean() ?>

<?php include 'view/template.php' ?>