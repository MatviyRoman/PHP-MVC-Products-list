<?php

class Product
{
    protected $model = '';

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $products = $this->model->getAllproduct();
        require 'view/product/list.php';
    }

    public function detail($id)
    {
        $product = $this->model->getProductById($id);
        require 'view/product/detail.php';
    }

    public function create()
    {
        if ($_POST) {
            $this->model->insert();
            header("Location: /index.php/product");
        } else {
            require 'view/product/form.php';
        }
    }

    public function edit($id)
    {
        if ($_POST) {
            $this->model->update($id);
            header("Location: /index.php/product");
        } else {
            $product = $this->model->getProductById($id);
            require 'view/product/form.php';
        }
    }

    public function delete($id)
    {
        if ($id) {
            $this->model->delete($id);
            header("Location: /index.php/product");
        }
    }
}
