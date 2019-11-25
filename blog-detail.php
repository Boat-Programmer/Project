<?php

   require_once('php/connect.php');

   $base_path_blog = 'assets/images/blog/';
   $sql = "SELECT * FROM articles WHERE id = '".$_GET['id']."' AND `status` = 'true'";
   $result = $conn->query($sql) or die($conn->error);
   
   if ($result->num_rows > 0){
       $row = $result->fetch_assoc();
   } else {
       header('Location: blog.php');
   }

   $sql_RAND = "SELECT * FROM `articles` WHERE `status` = 'true' ORDER BY RAND()";
   $result_RAND = $conn->query($sql_RAND);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $row['subject'] ?></title>

    <!-- Link Libery file .css && fonttext font.google -->
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <?php include_once('includes/navbar.php')?>

    <!-- Section Page-title -->
    <header data-jarallax='{"speed" : 0.6 }' class="jarallax"
        style="background-image: url('<?php echo $base_path_blog.$row['image'] ?>');">
        <div class="blog-image">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="display-4 font-weight-bold"><?php echo $row['subject'] ?></h1>
                        <p class="lead"><?php echo $row['sub_title'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Section Blog -->
    <section class="container blog-content">
        <div class="row">
            <div class="col-12">
            <?php echo $row['detail'] ?>
            </div>
        </div>
        <div class="col-12">
            <hr>
            <p class="text-right text-muted"><?php echo date_format(new DateTime($row['update_at']),"j F Y");  ?></p>
        </div>
        <div class="col-12">
            <div class="owl-carousel owl-theme">
            <?php while($row_RAND = $result_RAND->fetch_assoc()) { ?>
                <section class="col-12 p-2">
                    <div class="card h-100">
                        <a href="blog-detail.php?id=<?php echo $row_RAND['id'] ?>" class="warpper-card-img">
                            <img class="card-img-top" src="<?php echo $base_path_blog.$row_RAND['image'] ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row_RAND['subject'] ?></h5>
                            <p class="card-text"><?php echo $row_RAND['sub_title'] ?></p>
                        </div>
                        <div class="p-3">
                            <a href="blog-detail.php?id=<?php echo $row_RAND['id'] ?>" class="btn btn-warning btn-block">อ่านเพิ่มเติม</a>
                        </div>
                    </div>
                </section>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php include_once("includes/footer.php")?>

    <div class="to-top">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>

    <!-- Linke script libery file .js -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/jarallax/dist/jarallax.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="assets/js/main.js"></script>
    
    <script>
      $(document).ready(function(){
          $('.owl-carousel').owlCarousel({
             loop : true,
             nav: false,
             dots: true,
             responsive:{
                 0:{
                     item:1
                 },
                 600:{
                     item:2
                 },
                 1000:{
                     item:3
                 }
             }
          });
      });
    </script>

</body>

</html>