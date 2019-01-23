<?php

$chitiettin = $data['tintuc'];
$comment = $data['comment'];
$tinlienquan = $data['tinlienquan'];
$tinnoibat = $data['tinnoibat'];

if(isset($_POST['binhluan'])){
    if(isset($_SESSION['user_id'])){
        $c_tintuc = new C_tintuc();
        $noidung = $_POST['noidung'];
        $id_tin = $_POST['id_tin'];
        $id_user = $_SESSION['user_id'];
        $c_tintuc->them_binh_luan($id_user,$id_tin,$noidung);
    }
    else{
        $_SESSION['chua_dang_nhap'] = 'Bạn vui lòng đăng nhập để thêm bình luận';
        //header("location:" . $_SERVER['HTTP_REFERER']);
    }
}

?>


<!-- Page Content -->
<div class="container">
<div class="row">

    <!-- Blog Post Content Column -->
    <div class="col-lg-9">

        <!-- Blog Post -->

        <!-- Title -->
        <h1><?=$chitiettin->TieuDe?></h1>

        <!-- Author -->
        <p class="lead">
            <?=$chitiettin->TomTat?>
        </p>

        <!-- Preview Image -->
        <img class="img-responsive" src="public/image/tintuc/<?=$chitiettin->Hinh?>" alt="" width="200px">
        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span>Ngày cập nhật <?=$chitiettin->updated_at?></p>
        <hr>

        <!-- Post Content -->
        <p class="lead"><?=$chitiettin->NoiDung?></p>

        <hr>

        <!-- Blog Comments -->
        <?php
        if(isset($_SESSION['chua_dang_nhap'] )){
            echo '<div class="alert alert-danger">'.$_SESSION['chua_dang_nhap'] .'</div>';
        }
        ?>

        <!-- Comments Form -->
        <div class="well">
            <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
            <form role="form" method="post" action="">
                <input type="hidden" name="id_tin" value="<?=$chitiettin->id?>">
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="noidung"></textarea>
                </div>
                <button type="submit" name="binhluan" class="btn btn-primary">Gửi</button>
            </form>
        </div>

        <hr>

        <!-- Posted Comments -->
        <?php
            foreach($comment as $cm){
        ?>
        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?=$cm->name?>
                    <small> <?=$cm->created_at?></small>
                </h4>
                <?=$cm->NoiDung?>
            </div>
        </div>

        <?php
        }
        ?>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-3">

        <div class="panel panel-default">
            <div class="panel-heading"><b>Tin liên quan</b></div>
            <div class="panel-body">
            <?php 
            foreach($tinlienquan as $tinlq){
            ?>
                <!-- item -->
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-5">
                        <a href="chitiet.php?loai_tin=<?=$tinlq->ten_khong_dau?>&alias=<?=$tinlq->TieuDeKhongDau?>&id_tin=<?=$tinlq->id?>">
                            <img class="img-responsive" src="public/image/tintuc/<?=$tinlq->Hinh?>" alt="">
                        </a>
                    </div>
                    <div class="col-md-7">
                        <a href="chitiet.php?loai_tin=<?=$tinlq->ten_khong_dau?>&alias=<?=$tinlq->TieuDeKhongDau?>&id_tin=<?=$tinlq->id?>"><b><?=$tinlq->TieuDe?></b></a>
                    </div>
                    <div class="break"></div>
                </div>
                <!-- end item -->
            <?php
            }
            ?>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"><b>Tin nổi bật</b></div>
            <div class="panel-body">
                <?php
                    foreach($tinnoibat as $tinnb){
                ?>
                <!-- item -->
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-5">
                        <a href="chitiet.php?loai_tin=<?=$tinnb->ten_khong_dau?>&alias=<?=$tinnb->TieuDeKhongDau?>&id_tin=<?=$tinnb->id?>">
                            <img class="img-responsive" src="public/image/tintuc/<?=$tinnb->Hinh?>" alt="">
                        </a>
                    </div>
                    <div class="col-md-7">
                        <a href="chitiet.php?loai_tin=<?=$tinnb->ten_khong_dau?>&alias=<?=$tinnb->TieuDeKhongDau?>&id_tin=<?=$tinnb->id?>"><b><?=$tinnb->TieuDe?></b></a>
                    </div>
                    <div class="break"></div>
                </div>
                <!-- end item -->
                <?php
                }
                ?>
            </div>
        </div>
        
    </div>

</div>
<!-- /.row -->
</div>
<!-- end Page Content -->
