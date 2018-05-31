
    <div class="col-sm-1 hidden-xs col-lg-1 col-md-1"></div>
    <div class="col-sm-5 col-xs-12 col-lg-5 col-md-5">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <div id="carousel" class="carousel slide col-md-12 col-sm-12 col-lg-12 col-xs-12">
                <!--Слайды-->
                <div class="carousel-inner">
                    <?php

                    /*kursMoney*/
                    $kurs=curs_money();

                    $dir = "usrfiles/".$product['id']."/";
                    $files = scandir($dir);

                    if (count($files) == 2) { //Папка с картинками пуста
                        echo '<div class="item active" align="center">';
                        echo '<img class="slideimg" src="../../images/logo.png">';
                        echo '<div class="carousel-caption"></div>';
                        echo '</div>';
                    }

                        $tmp = 0;//переменная для стиля актив
                        for ($i = 0; $i < count($files); $i++) //перебираем все файлы
                        {
                            if (($files[$i] != ".") && ($files[$i] != "..")) //Если файл не точка или 2 точки
                            {
                                $active = 'item'; //стиль
                                $path = $dir . $files[$i];
                                if ($tmp == 0) {
                                    $active = 'item active'; //Стилль для первого елемента
                                    $tmp = $tmp + 1;
                                }
                                echo '<div class="' . $active . '" align="center">';
                                echo '<img class="slideimg" src="' . $path . '">';
                                echo '<div class="carousel-caption"></div>';
                                echo '</div>';
                            }
                        }


                    ?>

                </div>
                <!--СТрелки переключение слайдов-->
                <?php
                if (count($files) > 3)//Если в папке с картинками ничего нет
                {
                    ?>
                    <a href="#carousel" class="left carousel-control" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a href="#carousel" class="right carousel-control" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
        <br/>
        <div align="center" class="col-md-6 col-sm-6 col-xs-12 col-md-6">
            <h3 style="color: rgba(1, 132, 15, 0.93);"><?php echo number_format($product['price']*$kurs,0, ',' , ' ')?> UAH</h3>
        </div>
        <div align="center" class="col-md-6 col-sm-6 col-xs-0 col-md-6" style="margin-top: 15px;">
            <button class="btn btn-primary">
                <a style="text-decoration: none; color: #ffffff" href="index.php?view=add_to_cart&id=<?php echo $product['id']?>">Добавить в корзину</a>
            </button>
        </div>
    </div>
    <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <h2>
                <?php echo $product['title']?>
            </h2>
        </div>

        <div class="tabbable"> <!-- Only required for left/right tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">Описание</a></li>
                <li><a href="#tab2" data-toggle="tab">Тех. характеристики</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <p><?echo $product['description']?></p>
                </div>
                <div class="tab-pane" id="tab2">
                    <p>
                        <table class="table">
                        <tr>
                            <td>Высота: </td>
                            <td><?php echo $product2['x'] ?> мм</td>
                        </tr>
                        <tr>
                            <td>Ширина: </td>
                            <td><?php echo $product2['y'] ?> мм</td>
                        </tr>
                        <tr>
                            <td>Длина: </td>
                            <td><?php echo $product2['z'] ?> мм</td>
                        </tr>
                        <tr>
                            <td>Вес: </td>
                            <td><?php echo $product2['masa'] ?> г</td>
                        </tr>
                        <tr>
                            <td>Радиус действия: </td>
                            <td><?php echo $product2['detect'] ?> м</td>
                        </tr>
                        <tr>
                            <td>Время роботы без подзарядки: </td>
                            <td><?php echo $product2['energy'] ?> хв</td>
                        </tr>
                        </table>
                    </p>
                </div>
            </div>
        </div>


    </div>
    <div class="col-sm-1 hidden-xs col-lg-1 col-md-1"></div>






