<h2 align="center" xmlns="http://www.w3.org/1999/html">Оформление заказа</h2>

<?php
if($_SESSION['cart'] && !isset($_POST['order']))
{
    ?>

<div class="row">
<!--Левый отступ-->
<div class="col-lg-1 col-md-1 col-sm-0 col-xs-0"></div>


<!--Блок формы-->
<div class="col-lg-5 col-md-5 col-sm-6 col-xs-6">

    <form action="index.php?view=order" method="post" id="cart-form">

             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <span style="font-size: 27px;">Персональные даные</span>
             </div>
        <br/>
        <br/>
        <br/>
            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7">Ф.И.О:</div>
            <div class="col-lg-8 col-md-7 col-sm-6 col-xs-5"> <input type="text" name="name" class="input-sm" required="required" /></div>
        <br/>
            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7">Адрес доставки:</div>
            <div class="col-lg-8 col-md-7 col-sm-6 col-xs-5"><input type="text" name="address" class="input-sm" required="required"/></div>
        <br/>
            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7"> E-Mail:</div>
            <div class="col-lg-8 col-md-7 col-sm-6 col-xs-5"> <input type="email" name="email" class="input-sm" required="required"/></div>
        <br/>
            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7"> Телефончик:</div>
            <div class="col-lg-8 col-md-7 col-sm-6 col-xs-5"> <input type="text" name="phone" class="input-sm" required="required"/></div>
        <br/>
            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7"> СпосОБ доставки:</div>
            <div class="col-lg-8 col-md-7 col-sm-6 col-xs-5">
                <input type="radio" name="s_name" value="Самовивіз" checked="checked" /> Cамовывоз <br />
                <input type="radio" name="s_name" value="по Вінниці" /> по Виннице<br />
                <input type="radio" name="s_name" value="по Україні" /> по Украине<br />
            </div>
</div>

<!--Блок товара-->
<div class="col-lg-5 col-md-5 col-sm-6 col-xs-0">

        <table class="table">
            <tr>
                <th>Товар</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Всего</th>
            </tr>

            <?php
                /*kursmoney*/
            $kurs=curs_money();

            foreach($_SESSION['cart'] as $id => $quantity):
                $product = get_product($id);
                ?>

                <tr>
                    <td><?=$product['title'];?></td>
                    <td>$<?=number_format($product['price']*$kurs,0 , ',' , '');?></td>
                    <td><?=$quantity;?></td>
                    <td><?=number_format($product['price'] * $quantity * $kurs, 0 , ',' , '');?></td>
                </tr>

            <?php endforeach;?>
            <tr>
                <td><h3>Всего к оплате:</h3></td>
                <td></td>
                <td></td>
                <td align="center"><h3><?php echo number_format($_SESSION['total_price'] * $kurs, 0 , ',' , '');?> UAH</h3></td>
            </tr>
        </table>

    <p align="center">
        <button class="btn btn-success" type="submit" name="order">
            Оформмить заказ
        </button>
    </p>
</div>
    </form>

    <!--Правый отступ-->
    <div class="col-lg-1 col-md-1 col-sm-0 col-xs-0"></div>
</div>

<?php
}
if($_SESSION['cart'] && isset($_POST['order']))
{
    /*foreach($_POST as $ArrKey => $ArrStr)
    {
        $ArrKey = $_POST[$ArrKey];
    }*/
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $s_name = $_POST['s_name'];

    $date = date('Y-m-d');
    $time = date('H:i:s');
    foreach($_SESSION['cart'] as $id => $quantity):
        $product = get_product($id);
        $query = mysql_query("INSERT INTO orders(s_name,phone,name,address,email,date,time,product,prod_id,price,qty) VALUES ('$s_name','$phone','$name','$address','$email','$date','$time','{$product['title']}','{$product['id']}','{$product['price']}','$quantity')");
    endforeach;
    unset ($_SESSION['cart']);
    echo "<p align='center'><h2 align='center'>Ваш заказ успешно принят!</h2><h3 align='center'> В ближайшее время с вами свяжеться наш оператор!</h3></p>";

}
?>
