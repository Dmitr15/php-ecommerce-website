<?php
error_reporting(E_ERROR | E_PARSE);

class Suppliers{
    public static function get_all_suppliers(){
        $query = Database::prepare('SELECT * FROM `supplier`');

        $query->execute();

        $suppliers = $query->fetchAll();

        return $suppliers;
    }
}
