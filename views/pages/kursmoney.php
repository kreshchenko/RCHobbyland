<?php
session_start();
if ($_POST['login'] == 'admin' && $_POST['pass'] == 'admin')
{
    $_SESSION['auth'] = '1';
    $authorizac = 1;
}
if (isset($_GET['logout']))
{
    unset($_SESSION['auth']);
    $authorizac = 0;
}

?>

<?php
if (isset($_SESSION['auth']))
    echo 'Привіт начальнік, <a href="/index.php?view=adminorders&logout">Выход';
else {
    ?>

    <br>
    <div align="center">
        <form method='POST' action = '/index.php?view=adminorders'>
            <div class="col-lg-3 col-lg-offset-1 col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1 col-md-3 col-xs-offset-1"> Логин <input type='text' name='login'></div>
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 ">Пароль<input type='password' name='pass'></div>
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3"><input type='submit' value='Ввойти'></div>
        </form>

    </div>
<?php }?>



<?php
if (isset($_SESSION['auth'])) {
    include('adminmenu.php');

    if (isset ($_POST['id']) ) {
        $idproduct = $_POST['id'];
        echo $idproduct;
    }
    else
        $idproduct = curs_money();

    ?>


    <div align="center" class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
        <form action="index.php?view=kursmoney" method="post" id="product_for_redact">
            <input type="text" width="20px" name="id" >
            <button class="btn btn-success" type="submit" name="idproduct">
                Установить курс
            </button>
        </form>
    </div>


    <br/>
    <br/>
    <br/>
    <br/>

    <?php
    $i = 0;
    /*Добавление в таблицу Продукты*/
    $sql = mysql_query("UPDATE products SET price = '$idproduct' WHERE id = '0' ");
}
    ?>