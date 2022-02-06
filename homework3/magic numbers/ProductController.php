<?php
/*
* Антипаттерн Magic Numbers

* в строке 28 при получении данных из БД указана формула с числом
* решение: создать отдельную константу количества товаров, выводимых на страницу


*/


namespace app\controllers;


use app\engine\Request;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{
    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        $page = (new Request())->getParams()['page'] ?? 0;
        $catalog = (new ProductRepository())->getLimit(($page + 1) * 4);
        echo $this->render('catalog/index', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionCard() {
        $id = (new Request())->getParams()['id'];
        $product = (new ProductRepository())->getOne($id);
        echo $this->render('catalog/card', [
            'product' => $product
        ]);
    }
}