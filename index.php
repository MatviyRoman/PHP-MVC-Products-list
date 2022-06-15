<?php

$request = preg_replace("|/*(.+?)/*$|", "\\1", $_SERVER['PATH_INFO']);
$uri = explode('/', $request);

$uri0 = isset($uri[0]);
$uri1 = isset($uri[1]);

require_once "lib/Database.php";
require_once "controller/Product.php";
require_once "model/ProductModel.php";
$db = new Database();
$model = new ProductModel($db);
$controller = new Product($model);

if ($uri0 && $uri1 && $uri[0] === 'product' && $uri[1] === 'detail') {         // Detail
    $id = $_GET['id'];
    $controller->detail($id);
} elseif ($uri0 && $uri1 && $uri[0] === 'product' && $uri[1] === 'edit') {     // Edit
    $id = $_GET['id'];
    $controller->edit($id);
} elseif ($uri0 && $uri1 && $uri[0] === 'product' && $uri[1] === 'delete') {   // Delete
    $id = $_GET['id'];
    $controller->delete($id);
} elseif ($uri0 && $uri1 && $uri[0] === 'product' && $uri[1] === 'create') {   // Create
    $controller->create();
} elseif ($uri0 && $uri1 && $uri[0] === 'product' && $uri[1] === 'search') {   // Search
    $controller->search();
} elseif ($uri[0] === 'product') {                                             // Index
    $controller->index();
} else {
    $controller->index();                                                                   // Index

}
