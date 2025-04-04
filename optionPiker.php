<?php

class optionPiker{
    public static function bloodTypeOption(){
        $output = [];
        if (!empty($_POST["blood_type"])) {
            if ($_POST["blood_type"] === "0(I)") {
                $output[] = "<option value>Группа крови</option>";
                $output[] = "<option selected value='0(I)' >0 (I)</option>";
                $output[] = "<option value='A(II)' >A (II)</option>";
                $output[] = "<option value='B(III)' >B (III)</option>";
                $output[] = "<option value='AB(IV)' >AB (IV)</option>";
            }
            if ($_POST["blood_type"] === "A(II)") {
                $output[] = "<option value>Группа крови</option>";
                $output[] = "<option value='0(I)' >0 (I)</option>";
                $output[] = "<option selected value='A(II)' >A (II)</option>";
                $output[] = "<option value='B(III)' >B (III)</option>";
                $output[] = "<option value='AB(IV)' >AB (IV)</option>";
            }
            if ($_POST["blood_type"] === "B(III)") {
                $output[] = "<option value>Группа крови</option>";
                $output[] = "<option value='0(I)' >0 (I)</option>";
                $output[] = "<option value='A(II)' >A (II)</option>";
                $output[] = "<option selected value='B(III)' >B (III)</option>";
                $output[] = "<option value='AB(IV)' >AB (IV)</option>";
            }
            if ($_POST["blood_type"] === "AB(IV)") {
                $output[] = "<option value>Группа крови</option>";
                $output[] = "<option value='0(I)' >0 (I)</option>";
                $output[] = "<option value='A(II)' >A (II)</option>";
                $output[] = "<option value='B(III)' >B (III)</option>";
                $output[] = "<option selected value='AB(IV)' >AB (IV)</option>";
            }
        }
        else {
            $output[] = "<option value>Группа крови</option>";
                $output[] = "<option value='0(I)'>0 (I)</option>";
                $output[] = "<option value='A(II)'>A (II)</option>";
                $output[] = "<option value='B(III)'>B (III)</option>";
                $output[] = "<option value='AB(IV)'>AB (IV)</option>";
        }
        return $output;
    }

    public static function factorOption(){
        $output = [];
        if (!empty($_POST["factor"])){
            if ($_POST["factor"] === "plus"){
                $output[] = "<option value>Резус фактор</option>";
                $output[] = "<option selected value='plus'>Положительный (+)</option>";
                $output[] = "<option value='minus'>Отрицательный (-)</option>";
            }
            if ($_POST["factor"] === "minus"){
                $output[] = "<option value>Резус фактор</option>";
                $output[] = "<option value='plus'>Положительный (+)</option>";
                $output[] = "<option selected value='minus'>Отрицательный (-)</option>";
            }
        }
        else {
            $output[] = "<option value>Резус фактор</option>";
                $output[] = "<option value='plus'>Положительный (+)</option>";
                $output[] = "<option value='minus'>Отрицательный (-)</option>";
        }
        return $output;
    }

    public static function genderOption(){
        $output = [];
        if (!empty($_POST["gender"])){
            if ($_POST["gender"] === "male"){
                $output[] = "<option value>Выбирите пол</option>";
                $output[] = "<option selected value='male'>Мужской</option>";
                $output[] = "<option value='female'>Женский</option>";
            }
            if ($_POST["gender"] === "female"){
                $output[] = "<option value>Выбирите пол</option>";
                $output[] = "<option value='male'>Мужской</option>";
                $output[] = "<option selected value='female'>Женский</option>";
            }
        }
        else {
            $output[] = "<option value>Выбирите пол</option>";
                $output[] = "<option value='male'>Мужской</option>";
                $output[] = "<option value='female'>Женский</option>";
        }
        return $output;
    }
}