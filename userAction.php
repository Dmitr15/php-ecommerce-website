<?php
session_start();
//include_once "UserTable.php";
class userAction{

    //Вход в аккаунт
    public static function signIn(): string{
        //echo $_SERVER['REQUEST_METHOD'];
        //echo $_POST['action'];
        if ('POST' != $_SERVER['REQUEST_METHOD']) {
            return '';
        }
        // if ('signInPage.php' != $_POST['action']) {
        //     return '';
        // }
        // if (empty($_POST['login']) || empty($_POST['password'])) {
        //     return '';
        // }

        $error = UserLogic::signIn($_POST['login'], $_POST['password']);
        
        if ($error === '') {
            header('location: /Lr3Site/index.php');
        }
        return $error;
    }

    //Создание аккаунта
    public static function signUp(): array{
        if ('POST'!=$_SERVER['REQUEST_METHOD']) {
            return [];
        }
        // if ('signup.php' != $_POST['action']) {
        //     return [];
        // }

        $errors = UserLogic::signUp($_POST['login'], $_POST['full_name'], $_POST['blood_type'], $_POST['factor'], $_POST['vk'], $_POST['date'], $_POST['gender'], $_POST['interesting'], $_POST['password'],  $_POST['password_confirm']);
        if (!count($errors)) {
            UserTable::create($_POST['login'], $_POST['full_name'], $_POST['blood_type'], $_POST['factor'], $_POST['vk'], $_POST['password'], $_POST['interesting'], $_POST['gender'], $_POST['date']);
            $user = UserTable::get_by_email($_POST['login']);
            $_SESSION['USER_ID'] = $user['ID'];
            header('location: /Lr3Site/index.php');
            die();
        }
        return $errors;
    }


    public static function select_goods(){
        $filters =[];
        $sql="SELECT * FROM `product` right outer join `supplier` on supplier.id= product.id_supplier WHERE 1";

        if (count($_GET)>0 ){
            // Если передан параметр "brand", добавляем условие фильтрации по бренду
        if (!empty($_GET['brand'])) {
            $filters['brand'] = $_GET['brand'];
            $sql = $sql." AND supplier.id = :brand";
        }

        // Если передан параметр "description", добавляем условие фильтрации по описанию
        if (!empty($_GET['description'])) {
            $filters['description'] = $_GET['description'];
            $sql = $sql." AND product.description LIKE CONCAT('%', :description, '%')";
        }

        // Если передан параметр "nameProduct", добавляем условие фильтрации по названию продукта
        if (!empty($_GET['nameProduct'])) {
            $filters['nameProduct'] = $_GET['nameProduct'];
            $sql = $sql." AND product.name LIKE CONCAT('%', :nameProduct, '%')";
        }

        // Если передан только параметр "startPrice", добавляем условие фильтрации по минимальной цене
        if (strlen($_GET['startPrice']) != 0  && strlen($_GET['andPrice']) == 0 ) {
            $filters['startPrice'] = $_GET['startPrice'];
            $sql = $sql." AND product.cost >= CAST(:startPrice AS DECIMAL) ORDER BY product.cost DESC";
        }

        // Если передан только параметр "andPrice", добавляем условие фильтрации по максимальной цене
        if (strlen($_GET['startPrice']) == 0  && strlen($_GET['andPrice']) != 0) {
            $filters['andPrice'] = $_GET['andPrice'];
            $sql = $sql." AND product.cost <= CAST(:andPrice AS DECIMAL) ORDER BY product.cost ASC";
        }

        // Если переданы оба параметра "startPrice" и "andPrice", добавляем условие фильтрации по диапазону цен
        if (strlen($_GET['startPrice']) != 0  && strlen($_GET['andPrice']) != 0) {
            $filters['startPrice'] = $_GET['startPrice'];
            $filters['andPrice'] = $_GET['andPrice'];
            $sql = $sql." AND product.cost BETWEEN CAST(:startPrice AS DECIMAL) AND CAST(:andPrice AS DECIMAL) ORDER BY product.cost ASC";
         }
        }
        $products = UserTable::get_goods_by_filters($sql, $filters);
        return $products;
    }
}
