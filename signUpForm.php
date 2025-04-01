<?php
require_once('Database.php');
require_once('UserTable.php');
require_once('UserLogic.php');
require_once('userAction.php');
$errors = userAction::signup();
?>

<div class="container mt-3">
        <div class="row">        
        <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
            <ol class="breadcrumb bread" >
                <li  class="breadcrumb-item"><a href="#">Домашняя страница</a></li>
                <li class="breadcrumb-item">Создание аккаунта</li>                   
            </ol>
        </nav>
        </div>

        <div class="col-md-6 mx-auto">
        <?php if (!empty($errors)):
          foreach($errors as $error):?>
            <div class ='error'><?=$error?></div>
            <?php endforeach; ?>
        <?php endif; ?>
            <form name="signup" action="signUpPage.php" method="POST" >
                <div class="row ">
                <label for="login" >Email (Логин)</label>
                <div class="col-sm-12">
                    <input type="text" name="login" id="login" class="form-control" placeholder='example@example.com' value= "<?=htmlspecialchars($_POST["login"])?>">
                </div>
                <label for="full_name" >ФИО</label>
                <div class="col-sm-12">
                    <input type="text" name="full_name" id="full_name" class="form-control" placeholder='Иванов Иван Иванович' value= "<?=htmlspecialchars($_POST["full_name"])?>">
                </div>
                <label for="blood_type" >Группа крови</label>
                    <select class="form-select" name="blood_type" id="blood_type">
                        <option value  >Группа крови</option>                         
                        <option value='0 (I)' >0 (I)</option>
                        <option value='A (II)' >A (II)</option>
                        <option value='B (III)' >B (III)</option>
                        <option value='AB (IV)' >AB (IV)</option>                    
                    </select>               
                <label for="factor" >Резус фактор</label>             
                <select class="form-select" name="factor" id="factor">
                    <option value  >Резус фактор</option>                         
                    <option value='plus' >Положительный (+)</option>
                    <option value='minus' >Отрицательный (-)</option>                                      
                </select>
                <label for="vk" >Ссылка на профиль Вконтакте</label>
                <div class="col-sm-12">
                    <input type="url" name="vk" id="vk" class="form-control" placeholder='https://vk.com/idx' value= "<?=htmlspecialchars($_POST["vk"])?>">
                </div>
                <label for="date">День рождения:</label>
                <div class="col-sm-12">
                    <input type="date" id="date" class="form-control" name="date" placeholder="2025-03-23" value="<?=htmlspecialchars($_POST["date"])?>">
                </div>
                <label for="gender" >Пол</label>
                <select class="form-select" name="gender" id="gender">
                    <option value >Выбирите пол</option>                         
                    <option value='male' >Мужской</option>
                    <option value='female' >Женский</option>
                </select>
                <label for="interesting" >Интересы</label>
                <div class="col-sm-12">
                  <input type="text" id="interesting" class="form-control" name="interesting" placeholder="Ваши интересы" value="<?=htmlspecialchars($_POST["interestings"])?>">                  
                </div>
                <label for="password" >Пароль</label>
                <div class="col-sm-12">
                    <input type="password" name="password" id="password" class="form-control" placeholder='Совершенно секретно' value= "<?=htmlspecialchars($_POST["password"])?>">
                </div>
                <label for="password_confirm" >Повторите пароль</label>
                <div class="col-sm-12">
                    <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder='Совершенно секретно' value= "<?=htmlspecialchars($_POST["password_confirm"])?>">
                </div>
                <div class="col-md-12 text-center filters-btns">
                    <button type="submit" class=" btn btn-block btn-primary tx-tfm register-btn">Зарегистрироваться</button>
                </div>
                <div class="col-sm-12 text-center logInsignUp">
                    <p>Уже есть аккаунт? <a href="signInPage.php">Войти в аккаунт</a></p>
                </div>               
                </div>
            </form>
        </div>
</div>
</body>