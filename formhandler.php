<?php
error_reporting(E_ERROR | E_PARSE);
// Проверяем, был ли передан параметр clearFilter через GET-запрос
if ($_GET["clearFilter"] !='') {
    header("Location: http://localhost/Lr3Site/index.php");
}
// Функция для отображения введенного значения в поле описание товара
function descriptionHandler(){  
    if ($_GET["description"]!="" && $_GET["clearFilter"]=="") {        
        echo $_GET['description'];                          
    }
}
