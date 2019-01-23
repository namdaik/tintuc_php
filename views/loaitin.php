<?php

$tintuc = $data['tintuc'];
$tenloaitin = $data['loaitin'];
$theloai = $data['theloai'];
$phantrang = $data['list'];
?>

    <!-- Page Content -->
    
        <div class="row">
            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                        Navigation
                    </li>
                    <?php
                    foreach($theloai as $tl){
                        $loaitin = explode(',', $tl->tenLoaitin);
                    ?>
                    <li href="#" class="list-group-item menu1">
                        <?=$tl->Ten?>
                    </li>
                    <ul>
                        <?php
                        foreach($loaitin as $pair)
                        {
                                list($id,$ten, $tenkhongdau) = explode (':',$pair);
                        ?>
                        <li class="list-group-item">
                            <a href="<?=$tenkhongdau?>-<?=$id?>"><?=$ten?></a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <?php
                    }
                    ?>
                </ul>
            </div>

            <div class="col-md-9 " id="datasearch">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b><?php echo $tenloaitin->Ten?></b></h4>
                    </div>
                    <?php
                        foreach($tintuc as $tin){
                    ?>
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="<?=$tin->ten_khong_dau?>/<?=$tin->TieuDeKhongDau?>-<?=$tin->id?>.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="public/image/tintuc/<?=$tin->Hinh?>" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3><?=$tin->TieuDe?></h3>
                            <p><?=$tin->TomTat?></p>
                            <a class="btn btn-primary" href="<?=$tin->ten_khong_dau?>/<?=$tin->TieuDeKhongDau?>-<?=$tin->id?>.html">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    <?php
                    }
                    ?>
                    <!-- Pagination -->
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <?=$phantrang?>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
            </div> 

        </div>

    <!-- end Page Content -->



