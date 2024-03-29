<?php

   require_once('php/connect.php');
   session_start();
   $base_path_blog = 'assets/images/blog/';
   $tag = isset($_GET['tag']) ? $_GET['tag'] : 'all';
   $sql = "SELECT * FROM `articles` WHERE `tag` LIKE '%".$tag."%' AND `status` = 'true'";

   $result = $conn->query($sql) or die($conn->error);
   if (!$result) {
       header('Location : blog.php');
   }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>

    <!-- Link Libery file .css && fonttext font.google -->
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <?php include_once('includes/navbar.php')?>

    <header data-jarallax='{"speed" : 0.6 }' class="page-title jarallax"
        style="background-image: url('assets/images/images_2.jpeg');">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 font-weight-bold">blog</h1>
                    <p class="lead">สิ่งที่คุณสงสัยในการใช้งาน เราสามารถตอบคุณได้</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Section Blog -->
    <section class="container py-5">
        <div class="row pb-4">
            <div class="col-12 text-center">
                <div class="btn-group-custom">
                    <a href="blog.php?tag=all" class="btn btn-outline-warning <?php echo $tag == 'all' ? 'active': '' ?>">
                        ทั้งหมด
                    </a>
                    <a href="blog.php?tag=ข่าวสาร" class="btn btn-outline-warning <?php echo $tag == 'ข่าวสาร' ? 'active': '' ?>">
                        ข่าวสาร
                    </a>
                    <a href="blog.php?tag=การใช้งาน" class="btn btn-outline-warning <?php echo $tag == 'คู่มือการใช้' ? 'active': '' ?>">
                        คู่มือการใช้
                    </a>
                    <a href="blog.php?tag=วิธีแก้ปัญหา" class="btn btn-outline-warning <?php echo $tag == 'วิธีแก้ปัญหา' ? 'active': '' ?>">
                        วิธีแก้ปัญหา
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
                <?php 
                if($result->num_rows){
                while($row = $result->fetch_assoc()) { 
                    ?>
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
                            <a href="blog-detail.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-block">อ่านเพิ่มเติม</a>
                        </div>
                    </div>
                </section>

                <?php 
                    }

                } else { 
                ?>
                <section class="col-12">
                    <p class="text-center">ไม่มีข้อมูล</p>
                </section>
                <?php } ?>
            </div>
    </section>


    <?php include_once("includes/footer.php")?>

    <div class="to-top">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>

    <!-- Linke script libery file .js -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/jarallax/dist/jarallax.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>