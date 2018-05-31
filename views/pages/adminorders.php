


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
    echo 'Привіт начальнік, <a href="/index.php?view=adminorders&logout">Вихід';
else {
?>

    <br>
    <div align="center">
    <form method='POST' action = '/index.php?view=adminorders'>
        <div class="col-lg-3 col-lg-offset-1 col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1 col-md-3 col-xs-offset-1"> Логін <input type='text' name='login'></div>
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 ">Пароль<input type='password' name='pass'></div>
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3"><input type='submit' value='Увійти'></div>
    </form>

    </div>
<?php }?>



<?php
if (isset($_SESSION['auth']))
{
include ('adminmenu.php');
?>

    <h1 align="center">Наявні замовлення</h1>

<table class="table table-bordered">
    <tr>
        <th><abbr title="Номер замовлення">№ Зам.</abbr></th>
        <th>Назва товару</th>
        <th><abbr title="Код товару">Код</abbr></th>
        <th>Ціна</th>
        <th><abbr title="Кількість лотів">К.Т.</abbr></abbr></th>
        <th>ПІБ замовника</th>
        <th>Спосіб доставки</th>
        <th>Адреса</th>
        <th>Номер телефона та E-Mail</th>
        <th>Дата зам.</th>
        <th>Час зам.</th>
        <th>Cтатус</th>
    </tr>
    <?php
    if (isset($_GET['status']) && isset($_GET['zamid']))
    {
    $status = $_GET['status'];
    $zamid = $_GET ['zamid'];
    mysql_query("UPDATE orders SET status='$status' WHERE id='$zamid'");
    echo '<meta http-equiv="refresh" content="0; url=index.php?view=adminorders">';
    }

    /*Kursmoney*/
    $kurs=curs_money();


    foreach ($products as $item):
    if ($item['status'] >= 0 && $item['status'] < 3) {
    ?>
    <tr <?php if ($item['status'] == 0) echo 'bgcolor="#D2FFCD"';
    if ($item['status'] == 1) echo 'bgcolor="#F7FFBE"';
    if ($item['status'] == 2) echo 'bgcolor="#FF9691"'; ?> >
        <td><?php echo $item['id'] ?></td>
        <td><a href="index.php?view=product&id=<?php echo $item['prod_id']; ?>"> <?php echo $item['product'] ?></a>
        </td>
        <td><?php echo $item['prod_id']; ?></td>
        <td><?php echo number_format($item['price'] * $kurs, 0 , ',' , ''); ?></td>
        <td><?php echo $item['qty']; ?></td>
        <td><?php echo $item['name']; ?></td>
        <td><?php echo $item['s_name'];
            echo "<br/>";
            $raznica = get_duration($item['date'], '2015-02-11');
            ?></td>
        <td><?php echo $item['address'] ?></td>
        <td>
            <?php
            echo $item['phone'];
            echo '<br/>';
            echo $item['email'];
            ?>
        </td>
        <td><?php echo $item['date'] ?></td>
        <td><?php echo $item['time'] ?></td>
        <td>
            <?php
            if ($item['status'] == 1)
            {
            echo "В процесі!<br>";
            echo '<a href="index.php?view=adminorders&status=2&zamid='.$item["id"].'">Відправив</a>';
            }
            if ($item['status'] == 2)
            {
            echo "Доставлено!<br>";
            echo '<a href="index.php?view=adminorders&status=3&zamid='.$item["id"].'">Видалити з листа</a>';

            }
            if ($item['status'] == 0)
            {
            echo "NEW!<br/>";
            echo '<a href="index.php?view=adminorders&status=1&zamid='.$item["id"].'">Почав розгляд</a>';
            }

            ?>
        </td>
    </tr>
    <?php
    }
    endforeach;
    ?>


</table>

<br/>
<?php
}
?>