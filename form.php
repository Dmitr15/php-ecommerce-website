<?php
require_once("core.php");

require_once("suppliers.php");
require_once('formhandler.php');
require_once("goods.php");
$brands = Suppliers::get_all_suppliers();
$all = goods::select_goods();
?>
<div class="container mt-3">
            <form novalidate method="GET">
                <div class="row">
                    <label class="text-center" for="priceFrom">Фильтрация результата поиска</label>
                    <label class="text-center" for="priceFrom">По цене:</label>
                    <div class="col-sm-6">                     
                        <input type="text" name="startPrice" id="priceFrom" class="form-control price_from1" placeholder="Цена от" value="<?=$_GET["startPrice"]?>" >                      
                    </div>

                    <div class="col-sm-6">
                        <input type="text" id="priceBefore" name="andPrice" class="form-control price_before" placeholder="Цена до" value="<?=$_GET["andPrice"]?>" >                       
                    </div>

                    <label class="text-center" for="brand-select">Фильтрация по бренду:</label>
                    <div class="col-12 select-lines">              
                        <select class="form-select" name="brand" id="brand-select">
                        <option value >Выберите бренд</option>                         
                            <?php foreach ($brands as $brand) {                                  
                            //Если в GET-запросе был передан параметр "brand" и он совпадает с текущим поставщиком, то добавляем атрибут "selected" к option
                            if ($_GET["brand"] != '' && $_GET["brand"] == $brand["id"]) {
                                echo '<option value="'.$brand["id"].'" selected>'.$brand["namesupplier"].'</option>';
                            }else {                                   
                                echo '<option value="'.$brand["id"].'">'.$brand["namesupplier"].'</option>';
                            }
                            }?>              
                        </select>
                    </div>

                    <label class="text-center" for="descriptionName">Фильтрация по описанию:</label>
                    <div class="col-12 select-lines">                 
                    
                    <textarea type="text" name="description" id="descriptionName" class="form-control" placeholder="Введите описание товара" required><?php descriptionHandler()?></textarea>                   
                    </div>

                    <label class="text-center" for='firstName'>Фильтрация по наименованию:</label>
                    <div class="col-12 select-lines">                  
                        <input type="text" id="firstName" name="nameProduct" class="form-control" placeholder="Введите наименование товара" value="<?=htmlspecialchars($_GET["nameProduct"])?>" >                       
                    </div>

                    <div class="col-12 text-center filters-btns">
                      
                        <input type="submit" value="Применить фильтр" class="btn btn-primary">
                        <input type="submit" name="clearFilter" value="Очистить фильтр" class="btn btn-danger">                       
                        
                    </div>
                </div>
            </form> 
        </div>
         
        <div class="container text-center table-responsive mt-3">
            <table class="table table-striped table-sm table-borderless">
                <thead class="product-table">
                    <tr >
                    <th class="col">Изображение</th>
                    <th class="col">Наименование</th>
                    <th class="col">Брэнд</th>
                    <th class="col">Описание</th>
                    <th class="col">Стоимость</th>
                    </tr>
                </thead>
                <tbody>
                <?php                                    
                    foreach($all as $prod):                      
                        ?>
                        <tr>
                        <td ><img class="box_img img-fluid" src="img/<?=$prod['img_path']?>" alt="box1"></td>
                        <td ><?=$prod['name']?></td>
                        <td ><?= $prod['namesupplier']?></td>
                        <td ><?=$prod['description']?></td>
                        <td ><?=$prod['cost']?></td>
                        </tr>
                    <?php endforeach;?>                      
                </tbody>
            </table>
        </div>
