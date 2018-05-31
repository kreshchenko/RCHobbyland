<?php
function db_connect()
{
    $host = 'localhost';
    $user = 'root';
    $pswd = '';
    $db = '';



    $connection = mysql_connect($host, $user, $pswd);
    mysql_set_charset( 'utf8' );
    if(!$connection || !mysql_select_db($db,$connection))
    {
        return false;
    }
    return $connection;
}


function curs_money ()
{
    $d_table=mysql_query("SELECT * FROM products WHERE id=0");
    if (@mysql_num_rows($d_table)) // Если найдена хотя-бы одна строка
    {
        $kurs = mysql_result($d_table,0,"price");
        return $kurs;
    }
    else return false;

}


function db_result_to_array($result)
{
    $res_array = array();

    $count = 0;

    while($row = mysql_fetch_array($result))
    {
        $res_array[$count] = $row;
        $count++;
    }
    return $res_array;
}


function get_products()
{
    db_connect();

    $query = "SELECT * FROM products ORDER BY id DESC";

    $result = mysql_query($query);

    $result = db_result_to_array($result);

    return $result;
}

function get_orders()
{
    db_connect();

    $query = "SELECT * FROM orders ORDER BY id DESC";

    $result = mysql_query($query);

    $result = db_result_to_array($result);

    return $result;
}

function get_last_six_products ()
{
    db_connect();

    $query = "SELECT * FROM products ORDER BY id LIMIT 10";

    $result= mysql_query($query);

    $result = db_result_to_array($result);

    return $result;
}

function get_cat()
{
    db_connect();

    $query = "SELECT * FROM category ORDER BY id";

    $result = mysql_query($query);

    $result = db_result_to_array($result);

    return $result;
}




function get_product($id)
{
    db_connect();
    $query = ("SELECT * FROM products WHERE id = '$id' ");

    $result = mysql_query($query);

    $row = mysql_fetch_array($result);

    return $row;
}

    function get_product_haracteristik ($id)
    {
        db_connect();

        $query2 = ("SELECT * FROM harakteristiks WHERE id = '$id' ") ;
        $result2 = mysql_query ($query2);
        $row2 = mysql_fetch_array($result2);

        return $row2;
    }


function get_cat_products($cat,$sortType)
{
    db_connect();

    switch ($sortType)
    {
        case 'name':
            $query = "SELECT * FROM products WHERE category='$cat' ORDER BY title";
            break;

        case 'price':
            $query = "SELECT * FROM products WHERE category='$cat' ORDER BY price";
            break;

        case 'new':
            $query = "SELECT * FROM products WHERE category='$cat' ORDER BY id DESC";
            break;

        default:
            $query = "SELECT * FROM products WHERE category='$cat' ORDER BY id";
            break;
    }

    $result = mysql_query($query);

    $result = db_result_to_array($result);

    return $result;
}

/*Разница дат для админордер*/
function get_duration ($date_from, $date_till) {
    $date_from = explode('-', $date_from);
    $date_till = explode('-', $date_till);

    $time_from = mktime(0, 0, 0, $date_from[1], $date_from[2], $date_from[0]);
    $time_till = mktime(0, 0, 0, $date_till[1], $date_till[2], $date_till[0]);

    $diff = ($time_till - $time_from)/60/60/24;
    //$diff = date('d', $diff); - как делал))

    return $diff;
}


?>