<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Магазин радиоуправляемых моделей" />
    <title>RCHobbyland.com.ua - магазин радиомоделей!!!</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="css/fle">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script type="text/javascript" src="../../js/jquery-1.6.1.min.js" ></script>
    <script type="text/javascript" src="../../js/jquery.ui-slider.js"></script>
    <script type="text/javascript" src="../../js/editor/ed.js"></script>


    <![endif]-->
</head>
<body>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>

<div class="container" style="background-color: #ffffff">
<div class="row" id="verh">
        <a href="index.php">
            <img class="hidden-xs" width="20%" style="margin-left: 50px;"  src="../../images/logo.png">
        </a>
        <img width="70%" src="../../images/shpaka.png">

    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                    <span class="sr-only">Корзина и другое</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="color: #080808;">RCHobbyLand.com.ua</a>
            </div>
            <div class="collapse navbar-collapse" id="responsive-menu">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="index.php?view=aboutshop">Магазины</a>
                    </li>
                    <li><a href="index.php?view=dostavka">Доставка и оплата</a> </li>
                    <li <?php  if ($_SESSION['total_items'] != 0) echo 'id="blink1"' ; ?>>
                        <a href="index.php?view=cart">
                            Корзина (<? echo $_SESSION['total_items']; ?>)
                            <?php
                                if ($_GET['view']=='cart' || $_GET['view']=='dostavka' || $_GET['view']=='aboutshop' || $_GET['view']=='order' || $_GET['view']=='addproduct' || $_GET['view']=='adminorders' || $_GET['view']=='redactor' || $_GET['view']=='kursmoney')
                                {

                                }
                                else
                                {
                                    echo " - ";
                                    $kurs = curs_money();
                                    echo number_format($_SESSION['total_price'] * $kurs,0,',',' ');
                                }
                            ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <!--Menu-->
    <div class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu2">
                    <span class="sr-only">Меню</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="responsive-menu2">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Вода<b class="caret"></b> </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?view=cat&id=wKateri">Катеры</a></li>
                            <li><a href="index.php?view=cat&id=wKatamarani">Катамараны</a></li>
                            <li><a href="index.php?view=cat&id=wMotorniyahti">Моторные яхты</a></li>
                            <li><a href="index.php?view=cat&id=wParusniyahti">Парусные яхты</a></li>
                            <li><a href="index.php?view=cat&id=wUnderwoters">Подводные лодки</a></li>
                            <li><a href="index.php?view=cat&id=wZapchasti">Запчасти</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Земля<b class="caret"></b> </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?view=cat&id=eAuto">Машины</a></li>
                            <li><a href="index.php?view=cat&id=eBike">Мотоциклы</a></li>
                            <li><a href="index.php?view=cat&id=eRobots">Роботы</a></li>
                            <li><a href="index.php?view=cat&id=eTanks">Танкы</a></li>
                            <li><a href="index.php?view=cat&id=eZapchasti">Запчасти</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Воздух<b class="caret"></b> </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?view=cat&id=hPlanes">Самолеты</a></li>
                            <li><a href="index.php?view=cat&id=hHelicopters">Вертолеты</a></li>
                            <li><a href="index.php?view=cat&id=hMulticopters">Мультикоптеры</a></li>
                            <li><a href="index.php?view=cat&id=hPlaners">Планеры</a></li>
                            <li><a href="index.php?view=cat&id=hZapchasti">Запчасти</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Другое<b class="caret"></b> </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?view=cat&id=aAksesuari">Аксессуары</a></li>
                            <li><a href="index.php?view=cat&id=aDetali">Детали</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
    <?php
        $categories = get_cat();
        foreach ($categories as $item):
    ?>

    <?php
        endforeach;
    ?>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/views/pages/'.$view.'.php'); ?>


    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" >
        <hr style="border: 1px solid #000">
    </div>

<div class="row">

    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 col-xs-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-offset-1">
    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <img width="100%" src="../../images/contactsbtn.png">
    </div>

    <div class="dostavkaimage col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <a href="index.php?view=aboutshop">
            <img width="100%" src="../../images/vnbtn.png">
        </a>
    </div>

    <div class="dostavkaimage col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <a href="index.php?view=dostavka">
            <img width="100%" src="../../images/dostavkabtn.png">
        </a>
    </div>
    </div>

</div>


<br/>
<!--footer-->
<div class="panel-footer">
    Разработано: Игорь Крещенко<br/>
    063-815-75-37
</div>

</div>
</body>
</html>