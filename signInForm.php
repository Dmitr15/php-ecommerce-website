<?php
require_once('Database.php');
require_once('UserTable.php');
require_once('UserLogic.php');
require_once('userAction.php');
$errors = userAction::signIn();

?>
<div class="container mt-3">
<div class="row">       
        <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
            <ol class="breadcrumb bread" >
                <li  class="breadcrumb-item "><a href="#">Домашняя страница</a></li>
                <li class="breadcrumb-item">Вход в аккаунт</li>                   
            </ol>
        </nav>
        </div>
        <div class="col-md-6 mx-auto">           
        <?php if (!empty($errors)):?>
            <div class ='error'><?=$errors?></div>
        <?php endif; ?>
            <form name="signin" action="signInPage.php" method="POST">
                <div class="row ">
                <label for="login" >Email</label>
                <div class="col-sm-12">
                    <input required type="text" name="login" id="login" class="form-control" placeholder='example@example.com' value= "<?=htmlspecialchars($_POST["login"])?>">
                </div>
                
                <label for="password" >Пароль</label>
                <div class="col-sm-12">
                    <input type="password" name="password" id="password" class="form-control" placeholder='Совершенно секретно' value= "<?=htmlspecialchars($_POST["password"])?>">
                </div>               
                <div class="col-md-12 text-center filters-btns enter-btn">
                    <input required type="submit" class=" btn btn-block btn-primary tx-tfm register-btn" value="Войти">
                </div>
                <div class="col-sm-12 text-center logInsignUp">
                    <p>Еще нет аккаунта? <a href="signupPage.php">Зарегистрируйтесь</a></p>
                </div>              
                </div>
            </form>
        </div>
</div>
</body>