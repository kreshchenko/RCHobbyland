



<script type="text/javascript" src="../../js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        mode : "textareas",
        theme : "simple"
    });
</script>

<?php
if (isset($_SESSION['auth']))
    echo 'Привіт начальнік, <a href="/index.php?view=adminorders&logout">Вихід';
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
    ?>


    <div class="addorders col-lg-offset-1 col-lg-5 col-md-offset-0 col-md-12 col-xs-12 col-sm-12">

        <form action="index.php?view=addproduct" method="post" id="addProduct" enctype="multipart/form-data">
            Назва товару: <input type="text" name="title" class="input-sm" style="width: 100%;">
            <br/>
            Опис товару: <textarea id="letter" style="width: 100%; height: 200px;" name="desc"></textarea><br/>

            Ціна: <input type="text" name="price" class="input-sm" style="width: 100%;">
            Категорія товару:
            <select name="cat">
                <option value="wKateri">Катеры</option>
                <option value="wKatamarani">Катамараны</option>
                <option value="wMotorniyahti">Моторные яхты</option>
                <option value="wParusniyahti">Парусные яхты</option>
                <option value="wUnderwoters">Подводные лодки</option>
                <option value="wZapchasti">Запчастини до водних</option>
                <option value="eAuto">Машины</option>
                <option value="eBike">Мотоциклы</option>
                <option value="eRobots">Роботы</option>
                <option value="eTanks">Танки</option>
                <option value="eZapchasti">Запчастини до наземних</option>
                <option value="hPlanes">Самолеты</option>
                <option value="hHelicopters">Вертолеты</option>
                <option value="hMulticopters">Мульикопетры</option>
                <option value="hPlaners">Планеры</option>
                <option value="hZapchasti">Запчастини до літаючих</option>
                <option value="aAksesuari">Аксессуары</option>
                <option value="aDetali">Запчасти</option>
            </select>

    </div>

    <div class="addorders col-lg-5 col- col-md-12 col-xs-12 col-sm-12">

        <table class="table">
            <tr>
                <td> Висота (мм):</td>
                <td><input type="text" name="x" class="input-sm" style="width: 65%;"></td>
            </tr>
            <tr>
                <td>Ширина (мм):</td>
                <td><input type="text" name="y" class="input-sm" style="width: 65%;"></td>
            </tr>
            <tr>
                <td>Довжина (мм):</td>
                <td><input type="text" name="z" class="input-sm" style="width: 65%;"></td>
            </tr>
            <tr>
                <td>Вага (г):</td>
                <td><input type="text" name="masa" class="input-sm" style="width: 65%;"></td>
            </tr>
            <tr>
                <td>Радіус роботи пульту (м):</td>
                <td><input type="text" name="detect" class="input-sm" style="width: 65%;"></td>
            </tr>
            <tr>
                <td>Час роботи від аккум. (хв):</td>
                <td><input type="text" name="energy" class="input-sm" style="width: 65%;"></td>
            </tr>
            <tr>
                <td>Картинка:</td>
                <td><input type="file" name="file" class="input-sm"></td>
            </tr>
        </table>

        <div align="center">
            <button class="btn btn-success" type="submit" name="order">
                ДОбавить товар
            </button>
        </div>
    </div>
    </form>


    <?php

    if (isset($_POST['order'])) {
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

        /*Добавление в таблицу Продукты*/
        $sql = mysql_query("INSERT INTO products (title,description,price,category)  VALUES ('$title','$desc','$price','$cat')");
        /*Последний идентификатор в базе*/
        $lastid = mysql_insert_id();

        $papka = 'usrfiles/' . $lastid . '/';
        /*Создание папки для изображения*/
        @mkdir($papka, 0777);
        /*Залив файла на сервак*/
        @copy($_FILES['file']["tmp_name"], $papka .'1');

        /*Добавление в таблицу Характеристики*/
        $sql = mysql_query("INSERT INTO harakteristiks (id,x,y,z,masa,detect,energy)  VALUES ('$lastid','$x','$y','$z','$masa','$detect','$energy')");

    }

}?>
