
<div class="row" id="slider">
    <div id="carousel" class="carousel slide col-md-12 col-sm-12 col-lg-12 col-xs-12 slider_vs_contacts">
        <!--Индикаторы слайдов-->
        <ol class="carousel-indicators">
            <li class="active" data-target="#carousel" data-slide-to="0"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <!--Слайды-->
        <div class="carousel-inner">
            <div class="item active" align="center">
                <img class="slideimg" src="usrfiles/firsslide.png">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item" align="center">
                <img class="slideimg" src="usrfiles/secondslide.png">
                <div class="carousel-caption">

                </div>
            </div>
            <div class="item" align="center">
                <img class="slideimg" src="usrfiles/thirdslide.png">
                <div class="carousel-caption"></div>
            </div>
        </div>

        <!--СТрелки переключение слайдов-->
        <a href="#carousel" class="left carousel-control" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a href="#carousel" class="right carousel-control" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>


<!--Случайные товары-->
<div class="row gradient hidden-xs" style="background-color: #080808">


    <div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 col-sm-12 col-xs-12">
    <?php
    $number = 0;

    $d_table=mysql_query("SELECT * FROM products WHERE id=0");
    if (mysql_num_rows($d_table)) // Если найдена хотя-бы одна строка
    {
        $kurs = mysql_result($d_table,0,"price");
    }


    foreach($products as $item): {
        $number += 1;

        $dir = "usrfiles/".$item['id']."/";
        $files = scandir($dir);

        if (count($files) == 2)
        {
            $url = "../../images/logo.png";
        }
        else
        {
            $url = $dir . $files[2];
        }
        ?>

        <div align="center" class="col-md-3 col-lg-3 col-sm-3 col-xs-3 indexindextovar">
            <div class="indeximage">
                <a href="index.php?view=product&id=<?php echo $item['id']; ?>">
                    <img height="150px;" src="<?php echo $url; ?>">
                </a>
            </div>
            <div class="tovarname">
                <a href="index.php?view=product&id=<?php echo $item['id']; ?>"><?php echo $item['title']; ?></a>
            </div>
            <div class="tovarfooter">
                <div class="tovarprice col-md-12 col-lg-12 col-sm-12 col-xs-12 badge badge-warning">
                    Цена: <?php echo number_format ($item['price'] * $kurs); ?> UAH
                </div>
            </div>
        </div>

    <?php
        if ($number == 4)
        {
            break;
        }
    }

    endforeach;
    ?>
    </div>
</div>