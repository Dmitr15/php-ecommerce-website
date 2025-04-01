<?php
class UserTable{
    public static function create(string $email, string $full_name, string $blood_type, string $factor, string $vk, string $passw, string $interests, string $gender, string $birtday){
        $query = Database::prepare("INSERT INTO `user` (`Fio`, `Birthday`, `Gender`, `Interests`, `VkLink`, `BloodGroup`, `RhesusFactor`, `Email`, `Password`) VALUES (:full_name, :birtday, :gender, :interests, :vk, :blood_type, :factor, :email, :passw)");
        $query->bindValue(":full_name", $full_name);
        $query->bindValue(":birtday", $birtday);
        $query->bindValue(":gender", $gender);
        $query->bindValue(":interests", $interests);
        $query->bindValue(":vk", $vk);
        $query->bindValue(":blood_type", $blood_type);
        $query->bindValue(":factor", $factor);
        $query->bindValue(":email", $email);
        $query->bindValue(":passw", password_hash($passw, PASSWORD_DEFAULT));

        if (!$query->execute()) {
           throw new PDOException('Exception while adding a new user');
        }
    }

    public static function get_by_email(string $email){
        $query = Database::prepare('SELECT * FROM `user` WHERE `Email` = :email LIMIT 1');
        $query->bindValue(":email", $email);
        $query->execute();

        $users = $query->fetchAll();
        if (!count($users)) {
           return null;
        }
        
        return $users[0];
    }

    public static function get_by_id(string $id){
        $query = Database::prepare('SELECT * FROM `user` WHERE `ID` = :id LIMIT 1');
        $query->bindValue(":id", $id);
        $query->execute();

        $users = $query->fetchAll();
        if (!count($users)) {
           return null;
        }
        
        return $users[0]['Fio'];
        
    }

    public static function get_goods_by_filters(string $sql, array $filters){        
        $query = Database::prepare($sql);
        foreach ($filters as $k => $v) {       
            $query->bindValue($k, $v);
        }
        $query->execute();

        $products = $query->fetchAll();
        return $products;
    }

}