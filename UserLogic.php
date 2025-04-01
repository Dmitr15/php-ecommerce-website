<?php
//session_start();
class UserLogic{

    public static function signUp(string $login, string $full_name, string $blood_type, string $factor, string $vk, string $birtday, string $gender, string $interests, string $passw, string $confurm_passw): array{
        $errors= [];
       
        if (!empty($login) || !empty($full_name) || !empty($blood_type) || !empty($factor) || !empty($vk) || !empty($passw) || !empty($interests) || !empty($gender) || !empty($birtday) || !empty($confurm_passw)) 
        {
            if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Введите правильный email';
            }
            $user = UserTable::get_by_email($login);
            if (null !== $user) {
                $errors[] = 'У вас уже есть аккаунт';
            }
            if (!static::pass_check($passw)) {
                $errors[] = 'Введите правильный пароль';
            }
            if ($confurm_passw !== $passw) {
                $errors[] = 'Повторите пароль';
            }          
            if (!str_contains($vk,'https://vk.com/')) {
                $errors[] = 'Введите правильную ссылку VK';
            }
        }
        else {
            $errors[] = 'Заполните все поля!';
        }
        
        return $errors;
    }

    private static function pass_check($pass){
        return strlen(strval($pass)) > 6 && preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[ !@#$%^&*()_+=\-{}\[\]|;:\'",.<>\/?])[A-Za-z\d !@#$%^&*()_+=\-{}\[\]|;:\'",.<>\/?]+$/', $pass);
    }

    public static function signIn(string $login, string $passw): string{
        
        if (static::isAutorized()) {
            return "Вы уже авторизованы";
        }
        if (empty($login) || empty($passw)) {
            return "Заполните все поля";
        }
        $user = UserTable::get_by_email($login);
        if (null === $user) {
            return "Пользователь с таким именем не найден";
        }
        if ($passw != password_verify($passw ,$user['Password'])) {
            //password_hash($user['Password'], PASSWORD_DEFAULT)
            //echo password_hash($user['Password'], PASSWORD_DEFAULT);
            return "Пароль указан неверно";
        }
        $_SESSION['USER_ID'] = $user['ID'];

        return '';
    }

    public static function isAutorized(): bool{
        return intval($_SESSION['USER_ID']) >0;
    }

    public static function current(){
        if (!static::isAutorized()) {
            return null;
        }
        return UserTable::get_by_id($_SESSION['USER_ID']);
    }

    public static function signOut(){
        unset($_SESSION['USER_ID']);
    }
}

