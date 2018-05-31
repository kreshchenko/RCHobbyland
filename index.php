<?php

include('db_fnc.php');
include('cart_fnc.php');

session_start();

if (!isset($_SESSION['cart']))
{
    $_SESSION['cart'] = array();
    $_SESSION['total_items'] = 0;
    $_SESSION['total_price'] = 0.00;
    $kurs= curs_money();
}

$view = empty($_GET['view']) ? 'index' : $_GET['view'];

switch($view)
{
    case ('index'):
        $products = get_products();
        $kurs = curs_money();
        break;

    case ('aboutshop'):
        $kurs = curs_money();
        break;

    case ('cat'):
        $cat=$_GET['id'];
        $sortType = $_GET['sort'];
        $products = get_cat_products($cat,$sortType);
        $kurs = curs_money();
        break;

    case ('product'):
        $id = $_GET['id'];
        $product = get_product($id);
        $product2 = get_product_haracteristik ($id);
        $kurs = curs_money();
        break;

    case ('add_to_cart'):
            $id= $_GET['id'];
            $add_item = add_to_cart($id);
            $_SESSION['total_items'] = total_items($_SESSION['cart']);
            $_SESSION['total_price'] = total_price ($_SESSION['cart']);
            header ('Location: index.php?view=product&id='.$id);
        break;

    case ('update_cart'):
            update_cart();
            $_SESSION['total_items'] = total_items($_SESSION['cart']);
            $_SESSION['total_price'] = total_price ($_SESSION['cart']);
            $kurs = curs_money();
            header ('Location: index.php?view=cart');
        break;

    case ('cart'):
            $kurs = curs_money();
        break;

    case ('adminorders'):
        $products = get_orders();
        $kurs = curs_money();
        break;

    case ('order'):
        $kurs = curs_money();
        break;

    case ('addproduct'):
        $kurs = curs_money();
        break;

    case ('redactor'):
        $kurs = curs_money();
        break;
}


$arr = array('index','cat', 'product','cart','add_to_cart','update_cart','order','aboutshop','dostavka','adminorders','addproduct','upload','redactor','kursmoney');
if (!in_array($view, $arr)) $view='notfound';


include ($_SERVER['DOCUMENT_ROOT'].'/views/layouts/shop.php');
?>