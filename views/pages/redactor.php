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
if (isset($_SESSION['auth']))
{
include ('adminmenu.php');
?>






<div align="center" class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
    <form action="index.php?view=redactor" method="post" id="product_for_redact">
        <input type="text" width="20px" name="id">
        <button class="btn btn-success" type="submit" name="idproduct">
            Открыть товар
        </button>
    </form>
</div>


<script type="text/javascript" src="../../js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        mode : "textareas",
        theme : "simple"
    });
</script>

<br/>
<br/>
<br/>
<br/>

<?php
$id = $_GET['id'];
    $idproduct = $_POST['id'];//Строка товара
    $i = 0;


    if (isset($_GET['refreash']))
    {
        echo '<meta http-equiv="refresh" content="0; url=index.php?view=redactor&id='.$id.'">';
    }

if (isset($_GET['deleteimg']))
{
    @unlink($_GET['deleteimg']);
}

    while (isset($idproduct[$i]))//Находим ID  в строке
    {
        if ($idproduct[$i] == 'i' && $idproduct[$i + 1] == 'd') {
            if (isset($idproduct[$i + 3])) {
                $id = $idproduct[$i + 3];
            }
            if (isset($idproduct[$i + 4])) {
                $id = $idproduct[$i + 3] . $idproduct[$i + 4];
            }
            if (isset($idproduct[$i + 5])) {
                $id = $idproduct[$i + 3] . $idproduct[$i + 4] . $idproduct[$i + 5];
            }
            if (isset($idproduct[$i + 6])) {
                $id = $idproduct[$i + 3] . $idproduct[$i + 4] . $idproduct[$i + 5] . $idproduct[$i + 6];
            }
        }
        $i++;
    }


if (isset($id))
{
    $product = get_product($id);
    $product2 = get_product_haracteristik ($id);

    /*Работаем с картинками*/
    $dir = "usrfiles/".$product['id']."/";
    $files = scandir($dir);

    ?>

<form action="index.php?view=redactor&refreash=1&id=<?php echo $id;?>" method="post" id="redactForm" enctype="multipart/form-data">

<div class="col-sm-1 hidden-xs col-lg-1 col-md-1"></div>
<div class="col-sm-5 col-xs-12 col-lg-5 col-md-5">
    <div align="center" class="col-md-12 col-lg-12 col-xs-12 col-sm-12">

        <?php

           echo "Добавить ещё картинку:";
           echo "<input type=\"file\" name=\"file\" class=\"input-sm\"><br/>";

            for ($i = 0; $i < count($files); $i++) //перебираем все файлы
            {
                if (($files[$i] != ".") && ($files[$i] != "..")) //Если файл не точка или 2 точки
                {
                    $path = $dir . $files[$i];
                    echo "<a href=\"index.php?view=redactor&id=".$id."&deleteimg=".$path."\"><img width=\"100px\" onmouseover=\"this.src='../../images/del.jpg'; this.width=100;this.height=100;\" onmouseout=\"this.src='".$path."'; this.width=100;this.height=100;\" height=\"100px\" src=\"".$path."\"></a>";
                }
            }

        ?>



    </div>
    <br/>
    <div style="margin-top: 20px;" align="center" class="col-md-12 col-sm-12 col-xs-12 col-md-12">
        <input type="text" value="<?php echo $product['price']; ?>" name="price" class="input-sm" style="width: 70%;">
        <br/>
        <select name="cat">
            <option <?php if ($product['category'] == 'wKateri') echo 'selected' ; ?>  value="wKateri">
                Катеры
            </option>
            <option <?php if ($product['category'] == 'wKatamarani') echo 'selected' ; ?> value="wKatamarani">
                Катамараны
            </option>
            <option <?php if ($product['category'] == 'wMotorniyahti') echo 'selected' ; ?> value="wMotorniyahti">
                Моторные яхты
            </option>
            <option <?php if ($product['category'] == 'wParusniyahti') echo 'selected' ; ?> value="wParusniyahti">
                Парусные яхты
            </option>
            <option <?php if ($product['category'] == 'wUnderwoters') echo 'selected' ; ?> value="wUnderwoters">
                ППодводные лодки
            </option>
            <option <?php if ($product['category'] == 'wZapchasti') echo 'selected' ; ?> value="wZapchasti">
                Запчасти к водным
            </option>
            <option <?php if ($product['category'] == 'eAuto') echo 'selected' ; ?> value="eAuto">
                Машины
            </option>
            <option <?php if ($product['category'] == 'eBike') echo 'selected' ; ?> value="eBike">
                Мотоциклы
            </option>
            <option <?php if ($product['category'] == 'eRobots') echo 'selected' ; ?> value="eRobots">
                Роботы
            </option>
            <option <?php if ($product['category'] == 'eTanks') echo 'selected' ; ?> value="eTanks">
                Танки
            </option>
            <option <?php if ($product['category'] == 'eZapchasti') echo 'selected' ; ?> value="eZapchasti">
                Запчасти к наземным
            </option>
            <option <?php if ($product['category'] == 'hPlanes') echo 'selected' ; ?> value="hPlanes">
                Самолеты
            </option>
            <option <?php if ($product['category'] == 'hHelicopters') echo 'selected' ; ?> value="hHelicopters">
                Вертолеты
            </option>
            <option <?php if ($product['category'] == 'hMulticopters') echo 'selected' ; ?> value="hMulticopters">
                Мультикоптеры
            </option>
            <option <?php if ($product['category'] == 'hPlaners') echo 'selected' ; ?> value="hPlaners">
                Планеры
            </option>
            <option <?php if ($product['category'] == 'hZapchasti') echo 'selected' ; ?> value="hZapchasti">
                Запчасти к летунам
            </option>
            <option <?php if ($product['category'] == 'aAksesuari') echo 'selected' ; ?> value="aAksesuari">
                Аксессуары
            </option>
            <option <?php if ($product['category'] == 'aDetali') echo 'selected' ; ?> value="aDetali">
                Запчасти
            </option>
        </select>
    </div>

</div>
<div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
        <input type="text" name="title" value="<?php echo $product['title']?>" class="input-sm" style="width: 100%;">
    </div>

    <div class="tabbable"> <!-- Only required for left/right tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Описание</a></li>
            <li><a href="#tab2" data-toggle="tab">Тех. характеристики</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <p>
                    <textarea id="letter" style="width: 100%; height: 200px;" name="desc">
                        <?php echo $product['description'];?>
                    </textarea>
                </p>
            </div>
            <div class="tab-pane" id="tab2">
                <p>
                <table class="table">
                    <tr>
                        <td>Висота: </td>
                        <td><input type="text" value="<?php echo $product2['x'];?>" name="x" class="input-sm" style="width: 65%;"> мм</td>
                    </tr>
                    <tr>
                        <td>Ширина: </td>
                        <td><input type="text" value="<?php echo $product2['y']; ?>" name="y" class="input-sm" style="width: 65%;"> мм</td>
                    </tr>
                    <tr>
                        <td>Довжина: </td>
                        <td><input type="text" value="<?php echo $product2['z']; ?>" name="z" class="input-sm" style="width: 65%;"> мм</td>
                    </tr>
                    <tr>
                        <td>Вага: </td>
                        <td><input type="text" value="<?php echo $product2['masa']; ?>" name="masa" class="input-sm" style="width: 65%;"> г</td>
                    </tr>
                    <tr>
                        <td>Радіус дії пульта: </td>
                        <td><input type="text" value="<?php echo $product2['detect']; ?>" name="detect" class="input-sm" style="width: 65%;"> м</td>
                    </tr>
                    <tr>
                        <td>Час роботи без перезарядки: </td>
                        <td><input type="text" value="<?php echo $product2['energy'] ?>" name="energy" class="input-sm" style="width: 65%;"> хв</td>
                    </tr>
                </table>
                </p>
            </div>
        </div>
    </div>


</div>
<div class="col-sm-1 hidden-xs col-lg-1 col-md-1"></div>

    <div align="center" class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
        <button class="btn btn-success" type="submit" name="order">
            Редактировать
        </button>
        <a class="btn btn-danger" href="index.php?view=redactor&del=<?php echo $id; ?>">Видалити</a>
    </div>
</form>


<?php
}// Если прислано ID

/*Обработчик*/
if(isset($_POST['order']))
{
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $cat = $_POST['cat'];
    $x = $_POST['x'];
    $y = $_POST['y'];
    $z = $_POST['z'];
    $masa = $_POST['masa'];
    $detect = $_POST['detect'];
    $energy = $_POST['energy'];
    $file = $_POST['file'];

    $date_today = date("mdyhIs");
    $papka = 'usrfiles/'.$id.'/';
    /*Создание папки для изображения*/

    $files = scandir($papka);
    $filesCount = count($files);
    $fileName = $filesCount - 1;

    /*Залив файла на сервак*/
    copy($_FILES['file']["tmp_name"],$papka.$fileName);





        /*Добавление в таблицу Продукты*/
    $sql = mysql_query("UPDATE products SET title = '$title' , description = '$desc' , price = '$price' , category = '$cat' WHERE id = '$id'");

    /*Добавление в таблицу Характеристики*/
    $sql = mysql_query("UPDATE harakteristiks SET x='$x', y='$y', z='$z', masa='$masa', detect='$detect', energy='$energy' WHERE id = '$id'");
}

    if (isset($_GET['del']))
    {
        $id = $_GET['del'];
        
        $sql = mysql_query("DELETE FROM products WHERE id = '$id'");
        $sql = mysql_query("DELETE FROM harakteristiks WHERE id = '$id'");
        unset($_POST);
    }
    ?>

</form>

<?php
}
?>