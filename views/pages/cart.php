<h2 align="center">Корзина товаров</h2>

<?php

if ($_SESSION['cart'])
{
?>

<form action="index.php?view=update_cart" method="post" id="cart-form">

    <div class="row">
    <div class="col-lg-2 col-sm-1 col-md-2 col-xs-0"></div>

    <div class="col-lg-8 col-sm-10 col-md-8 col-xs-12">
    <table  class="table table-striped">
        <tr>
            <th>Товар</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Всего</th>
            <th></th>
        </tr>

        <?php

            foreach ($_SESSION['cart'] as $id => $quantity):
                    $product = get_product($id);

                $kurs= curs_money();
        ?>

                    <tr>
                        <td><?php echo $product['title']; ?></td>
                        <td><?php echo number_format($product['price'] * $kurs, 0 , ',' , ''); ?></td>
                        <td>
                            <input type="number" min="0" width="20px" name="<?php echo $id; ?>"
                                   value="<?php echo $quantity; ?>"/>
                        </td>
                        <td><?php echo number_format($product['price'] * $quantity * $kurs, 0, ',' , ' ') ?></td>
                        <td>
                            <a href="index.php?view=cart&delete=<?php echo $id; ?>">
                                <i title="Удалить товар" class="glyphicon glyphicon-remove"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                    endforeach;
            if (isset($_GET['delete']))
            {
                $delete = $_GET['delete'];
                unset ($_SESSION['cart'][$delete]);
                $_SESSION['total_items'] = total_items($_SESSION['cart']);
                $_SESSION['total_price'] = total_price ($_SESSION['cart']);
                echo '<meta http-equiv="refresh" content="0; url=index.php?view=cart">';
            }
                ?>
        <tr>
            <td><h3>Общая сумма к оплате:</h3></td>
            <td></td>
            <td></td>
            <td></td>
            <td align="center"><h3 style="color: rgba(1, 132, 15, 0.93);"><?php echo number_format($_SESSION['total_price'] * $kurs, 0 , ',' , ' ');?> UAH</h3></td>
        </tr>
    </table>
    </div>

    <div class="col-lg-2 col-sm-1 col-md-2 col-xs-0"></div>
    </div>


    <div class="row" style="margin-top: -20px;">
        <br/>
        <div class="col-lg-2 col-sm-1 col-md-2 col-xs-0"></div>

    <div align="center" class="col-lg-8 col-sm-10 col-md-8 col-xs-12">
            <button class="btn btn-primary" type="submit" name="update">
                <i class="glyphicon glyphicon-refresh"></i> Пересчитать
            </button>

                <button class="btn btn-success orderbutton"><i class="glyphicon glyphicon-shopping-cart"></i> <a href="index.php?view=order">Оформить заказ</a></button>

                <button class="btn btn-danger orderbutton"><i class="glyphicon glyphicon-trash"></i> <a href="index.php?view=cart&deleteall=1"> Очистить корзину</a></button>
                <?php
                    if (isset($_GET['deleteall']))
                    {
                        unset ($_SESSION['cart']);
                        echo '<meta http-equiv="refresh" content="0; url=index.php?view=cart">';
                    }
                ?>
    </div>

        <div class="col-lg-2 col-sm-1 col-md-2 col-xs-0"></div>
    </div>

</form>

<?php
}
    else
    {
        echo '<h1 align="center">Ваша корзина пуста=(</h1>';
    }

?>