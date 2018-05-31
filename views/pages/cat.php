

<div class="row">

    <!--Картинка сверху категории-->

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

    <?php
        /*Картинки категорий*/
        switch ($cat)
        {
            /*Вода*/
            case 'wKateri':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/wKateri.png'>";
                break;
            case 'wKatamarani':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/wKatamarani.png'>";
                break;
            case 'wMotorniyahti':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/wMotorniyahti.png'>";
                break;
            case 'wParusniyahti':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/wParusniyahti.png'>";
                break;
            case 'wUnderwoters':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/wPodlodki.png'>";
                break;
            case 'wZapchasti':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/aAksesuari.png'>";
                break;
            /*Земля*/
            case 'eAuto':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/aAuto.png'>";
                break;
            case 'eBike':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/aMoto.png'>";
                break;
            case 'eRobots':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/aRobots.png'>";
                break;
            case 'eTanks':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/aTank.png'>";
                break;
            case 'eZapchasti':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/aAksesuari.png'>";
                break;
            /*Воздух*/
            case 'hPlanes':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/hPlane.png'>";
                break;
            case 'hHelicopters':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/hHelikopter.png'>";
                break;
            case 'hMulticopters':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/hMultikopter.png'>";
                break;
            case 'hPlaners':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/hParoplan.png'>";
                break;
            case 'hZapchasti':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/aAksesuari.png'>";
                break;
            case 'aAksesuari':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/aAksesuari.png'>";
                break;
            case 'aDetali':
                echo "<img style='margin-top: -70px;' width='100%' src='../../images/itemimg/aAksesuari.png'>";
                break;
        }?>
    </div>

    <!--Фильтры-->
    <div class="filters col-md-2 col-sm-2 col-xs-0 col-lg-2">
        <!--Сортировка по Цене, названию и новизне-->
        <div style="margin-top: 50px; border-radius: 5px;  ">
        <h3>Cортировка по:</h3>
            <ul class="nav nav-pills nav-stacked">
                <li <?php if ($_GET['sort'] == 'name') echo 'class="active"'; ?>>
                    <a href="index.php?view=cat&id=<?php echo $_GET['id']; ?>&sort=name">
                        Названию
                    </a>
                </li>
                <li <?php if ($_GET['sort'] == 'price') echo 'class="active"'; ?>>
                    <a href="index.php?view=cat&id=<?php echo $_GET['id']; ?>&sort=price">
                        Цене
                    </a>
                </li>
                <li <?php if ($_GET['sort'] == 'new') echo 'class="active"'; ?>>
                    <a href="index.php?view=cat&id=<?php echo $_GET['id']; ?>&sort=new">
                        Новинкам
                    </a>
                </li>
            </ul>
        </div>
        <br>

        <!--Ползунок цены-->

    </div>


    <div class="col-md-10 col-sm-10 col-xs-12 col-lg-10">


        <?php
        /*Вывод товаров*/


        $kurs=curs_money();

        $row_size = 0;
        foreach($products as $item):
            if ($row_size == 0)
            {
                echo '<div class="row">';
            }

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

    <div align="center" class="col-md-3 col-lg-3 col-sm-3 col-xs-0 indextovar">
        <div class="indeximage">
            <a href="index.php?view=product&id=<?php echo $item['id'];?>">
                <img style="height: 150px;" src="<?php echo $url;?>">
            </a>
        </div>
        <div class="tovarname">
            <a href="index.php?view=product&id=<?php echo $item['id'];?>"><?php echo $item['title'];?></a>
        </div>
            <br/>
        <div class="tovarfooter">
            <div class="tovarprice col-md-12 col-lg-12 col-sm-12 col-xs-12 label label-success" style="font-size: 15px;">Цена: <?php echo number_format($item['price']*$kurs,0, ',' , ' ');?> UAH</div>
        </div>
    </div>

    <?php
        $row_size = $row_size + 1;
            $i++;
        if ($row_size == 4)
        {
            echo "</div>" ;
            $row_size = 0;
        }
        endforeach;
    ?>


<!-- Отступ справа-->
    </div>

    <br/>
</div>

