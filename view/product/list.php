<!-- view/product/list.php -->
<?php $title = 'Product list'
?>

<?php ob_start() ?>

<div class="title-wrap">
    <h1>Products</h1>
    <a href="/index.php/product/create?add=1" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Create product</a>
</div>

<?php


if (!$products) {
    echo 'No products. Please create<br>';
} else {
?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm dataTable" cellspacing="0" width="100%" id="dtOrderExample">
            <thead>
                <tr role="row">

                    <th class="th-sm sorting" tabindex="0" aria-controls="dtOrderExample" rowspan="1" colspan="1" aria-label="Position
          : activate to sort column ascending">ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Status</th>
                    <!-- <th>Detail</th> -->
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <?php

            if ($products) :
                foreach ($products as $row) : ?>
                    <tr role="row">
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['price'] ?></td>
                        <td>
                            <?php
                            $status = $row['status'] ? 'active' : 'no-active';
                            ?>
                            <span class="status <?= $status ?>"></span>
                        </td>
                        <!-- <td><a href="/index.php/product/detail?id=<?= $row['id'] ?>" class="btn btn-success btn-xs"> Detail</a></td> -->
                        <td><a href="/index.php/product/edit?id=<?= $row['id'] ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
                        <td><a href="/index.php/product/delete?id=<?= $row['id'] ?>" onclick="return confirm('Delete product with #id<?= $row['id'] ?>?')" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-trash"></span> Delete</a></td>
                    </tr>
            <?php
                endforeach;
            endif; ?>
        </table>
    </div>

<?php
}

$isi = ob_get_clean() ?>

<?php include 'view/template.php' ?>