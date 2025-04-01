<?php
require_once('UserLogic.php');
?>
<?php if(!UserLogic::isAutorized() && !isset($_REQUEST['enterFunc']) && ($_SERVER['REQUEST_URI'] !== "/Lr3Site/signUpPage.php" || $_SERVER['REQUEST_URI'] !== "/Lr3Site/signInPage.php")):?>
    <div class="notifications">
      <div class=" notification">
        <div class="text-center">
            Вы не авторизованы. <a href='signInPage.php'>Введите логин и пароль</a> или <a href='signUpPage.php'>зарегистрируйтесь</a>.
        </div>
        </div>
        <?php else:?>
          <div class=" notification">
            <p class="text-center info">
              Вы вошли под именем: <?php print(UserLogic::current())?>. <a href="?enterFunc=" id="enter">Выйти</a>
              <?php if (isset($_REQUEST['enterFunc'])) {
                UserLogic::signOut();
                header("Location: http://localhost/Lr3Site/index.php");}?>
            </p>
        </div>
    </div>
    <?php endif;?>