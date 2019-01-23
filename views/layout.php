<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title> Khoa Pham</title>
    <base href="http://localhost/kp_tintuc/">
    <!-- Bootstrap Core CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="public/css/shop-homepage.css" rel="stylesheet">
    <link href="public/css/my.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.public/js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Tin Tức</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="gioithieu.html">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="lienhe.html">Liên hệ</a>
                    </li>
                </ul>

                <form class="navbar-form navbar-left" role="search" method="get" action="timkiem.php">
			        <div class="form-group">
			          <input type="text" id="txtSearch" class="form-control" placeholder="Search">
			        </div>
			        <button type="button" id="search" class="btn btn-default">Tìm</button>
			    </form>

			    <ul class="nav navbar-nav pull-right">
                    <?php
                    if(isset($_SESSION['user_name'])){
                    ?>
                        <li>
                        	<a>
                        		<span class ="glyphicon glyphicon-user"></span>
                        		<?=$_SESSION['user_name']?>
                        	</a>
                        </li>
                        
                        <li>
                        	<a href="dang-xuat">Đăng xuất</a>
                        </li>
                    <?php
                    }
                    else{
                    ?>

                        <li>
                            <a href="dang-ki">Đăng ký</a>
                        </li>
                        <li>
                            <a href="dang-nhap">Đăng nhập</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>


            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<div class="container" id="datasearch">
    <?php

    include("views/$view.php");
    // $view = isset($_GET['view'])?$_GET['view']:'trang-chu';
    // //echo $view; die;
    // switch ($view) {
    //     case 'chitiet':
    //         include('views/chitiet.php');
    //         break;
    //     case 'dang-ki':
    //         include('views/dangki.php');
    //         break;
    //     case 'dang-nhap':
    //         include('views/dangnhap.php');
    //         break;
    //     case 'dang-xuat':
    //         include('views/dangxuat.php');
    //         break;
    //     case 'lien-he':
    //         include('views/lienhe.php');
    //         break;
    //     case 'loaitin':
    //         include('views/loaitin.php');
    //         break;
    //     case 'gioithieu':
    //         include('views/gioithieu.php');
    //         break;
        
    //     default:
    //         include('views/index.php');
    //         break;
    // }
    ?>
    <!-- end Page Content -->
    </div>
    <!-- Footer -->
    <hr>
    <footer>
        <div class="row">
            <div class="col-md-12">
                <p>Copyright 2017 &copy; Khoa Pham Training by Huong Huong</p>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="public/js/jquery.js"></script>
    <!-- Bootstrap public/js/Core JavaScript -->
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/my.js"></script>
    <script>
        $(document).ready(function(){
            $("#search").click(function(){
                var keyword = $('#txtSearch').val();
                $.post("views/timkiem.php",{tukhoa:keyword},function(data){
                    $('#datasearch').html(data)
                })
            })
        })
    </script>
</body>

</html>