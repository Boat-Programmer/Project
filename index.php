<?php 

  require_once('php/connect.php');
  session_start();
  $tag = isset($_GET['tag']) ? $_GET['tag'] : 'all';
  $sql = "SELECT * FROM articles WHERE `status` = 'true' LIMIT 6";
  $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>หน้าหลัก</title>

    <!-- Link Libery file .css && fonttext font.google -->
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <?php include_once('includes/navbar.php')?>

    <!-- Section Carousel -->
    <section id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-img" style="background-image: url('assets/images/images_1.jpeg')">
                    <!-- <div class="carousel-caption">
                        <h1 class="display-4 font-weight-bold">EasyPay</h1>
                        <p class="lead">Website การจัดบัญชี</p>
                    </div> -->
                    <div class="backscreen"></div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-img" style="background-image: url('assets/images/images_2.jpeg')">
                    <!-- <div class="carousel-caption">
                        <h1 class="display-4 font-weight-bold">EasyPay</h1>
                        <p class="lead">Website (HTML CSS Javascript)</p>
                    </div> -->
                    <div class="backscreen"></div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-img" style="background-image: url('assets/images/images_3.jpeg')">
                    <!-- <div class="carousel-caption">
                        <h1 class="display-4 font-weight-bold">EasyPay</h1>
                        <p class="lead">Website การจัดบัญชี</p>
                    </div> -->
                    <div class="backscreen"></div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </section>

    <!-- Section Jumbotron -->
    <section class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="border-short-bottom">EasyPay</h1>
            <p class="lead">EasyPay บริการตรวจสอบและจัดทำระบบบัญชี ซึ่งมีระบบในการแจ้งเตือนผ่าน Line Appilcation
                จึงทำให้ผู้ใช้นั้นสามารถรู้ความเคลื่อนไหวทางการเงินได้อย่างสะดวก</p>
            <a class="btn btn-primary " role="button" href="#">สมัครสมาชิก</a>
        </div>
    </section>

    <!-- Section Blog -->
    <section class="container">
        <h1 class="border-short-bottom text-center">บทความ Blog</h1>
        <div class="row">
         <?php while($row = $result->fetch_assoc()) { ?>
            <section class="col-12 col-sm-6 col-md-4 p-2">
                <div class="card h-100">
                    <a href="blog-detail.php?id=<?php echo $row['id'] ?>" class="warpper-card-img">
                        <img class="card-img-top" src="<?php echo $base_path_blog.$row['image'] ?>" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['subject'] ?></h5>
                        <p class="card-text"><?php echo $row['sub_title'] ?></p>
                    </div>
                    <div class="p-3">
                        <a href="blog-detail.php?id=<?php echo $row['id']?>" class="btn btn-warning btn-block">อ่านเพิ่มเติม</a>
                    </div>
                </div>
            </section>    
        <?php } ?>
        </div>
    </section>
     
    <?php include_once('includes/footer.php') ?>

    <div class="to-top">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>

                

    <!-- Linke script libery file .js -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>