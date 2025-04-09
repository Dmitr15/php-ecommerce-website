<?php
session_start();

class userAction{

    //Вход в аккаунт
    public static function signIn(): string{
        
        if ('POST' != $_SERVER['REQUEST_METHOD']) {
            return '';
        }        

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

}
