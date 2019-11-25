<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About us</title>

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
                    <h1 class="display-4 font-weight-bold">about us</h1>
                    <p class="lead">Website เพื่อการตรวจสอบรายรับรายจ่าย ของห้องเรียน</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Section Blog -->
    <section class="container py-5">
        <h1 class="border-short-bottom text-center">ทีมพัฒนา</h1>
        <div class="row">
            <section class="col-12 col-sm-6 col-md-3 p-2">
                <div class="card h-100">
                    <a href="#" class="warpper-card-img">
                        <img class="card-img-top" src="#" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">หัวหน้าทีมพัฒนา</h5>
                        <p class="card-text">
                        <h6>ชื่อ - นามสกุล : ศุภพิชญ์ สุขะ</h6>
                        <h6>อายุ : 20</h6>
                        <h6>การศึกษา : </h6>
                        </p>
                    </div>
                    <div class="p-3">
                        <a href="#" class="btn btn-warning btn-block">อ่านเพิ่มเติม</a>
                    </div>
                </div>
            </section>

            <section class="col-12 col-sm-6 col-md-3 p-2">
                <div class="card h-100">
                    <a href="#" class="warpper-card-img">
                        <img class="card-img-top" src="#" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">ผู้จัดการทีมพัฒนา</h5>
                        <p class="card-text">
                        <h6>ชื่อ - นามสกุล : </h6>
                        <h6>อายุ : </h6>
                        <h6>การศึกษา :</h6>
                        </p>

                    </div>
                    <div class="p-3">
                        <a href="#" class="btn btn-warning btn-block">อ่านเพิ่มเติม</a>
                    </div>
                </div>
            </section>

            <section class="col-12 col-sm-6 col-md-3 p-2">
                <div class="card h-100">
                    <a href="#" class="warpper-card-img">
                        <img class="card-img-top" src="#" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">ฝ่ายออกแบบ UX/UI</h5>
                        <p class="card-text">
                        <h6>ชื่อ - นามสกุล : </h6>
                        <h6>อายุ : </h6>
                        <h6>การศึกษา :</h6>
                        </p>
                    </div>
                    <div class="p-3">
                        <a href="#" class="btn btn-warning btn-block">อ่านเพิ่มเติม</a>
                    </div>
                </div>
            </section>

            <section class="col-12 col-sm-6 col-md-3 p-2 ">
                <div class="card h-100">
                    <a href="#" class="warpper-card-img">
                        <img class="card-img-top" src="#" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">ฝ่ายออกแบบ ฐานข้อมูล</h5>
                        <p class="card-text"> 

                        <h6>ชื่อ - นามสกุล : </h6>
                        <h6>อายุ : </h6>
                        <h6>การศึกษา :</h6>

                        </p>        
                    </div>
                    <div class="p-3">
                        <a href="#" class="btn btn-warning btn-block">อ่านเพิ่มเติม</a>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <!-- Section Timeline -->
    <section data-jarallax='{"speed" : 0.6 }' class="position-relative py-5 jarallax"
        style="background-image: url('assets/images/images_1.jpeg');">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="text-dark display-4 font-weight-bold">Timeline About us</h1>
                </div>
            </div>
        </div>
    </section> 

    <!-- Section Timeline map -->
    <section class="container py-5">
        <div class="row">
            <div class="col-12">
                <ul class="timeline">
                    <li>
                        <div class="timeline-badge">
                            <p> 18 สิงหาคม 2561 </p>
                        </div>
                        <div class="timeline-card">
                            <h5>วันเกิด EasyPay</h5>
                            <p class="text-muted">เกิดวันที่ 18 สิงหาคม 2561</p>
                        </div>

                    </li>
                    <li class="inverted">
                        <div class="timeline-badge">
                            <p> 20 สิงหาคม 2562 </p>
                        </div>
                        <div class="timeline-card">
                            <h5>รวบร่วมข้อมูล</h5>
                            <p class="text-muted">รวบร่วมข้อมูลต่าง ความต้องการของผู้ใช้</p>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-badge">
                            <p> 27 สิงหาคม 2562 </p>
                        </div>
                        <div class="timeline-card">
                            <h5>ขั้นตอนการออกแบบ UX/UI</h5>
                            <p class="text-muted">รวบร่วมข้อมูลต่าง ความต้องการของผู้ใช้ และ ออกแบบตามข้อมูล</p>
                        </div>
                    </li>
                    <li class="inverted">
                        <div class="timeline-badge">
                            <p> 30 ตุลาคม 2562 </p>
                        </div>
                        <div class="timeline-card">
                            <h5>Codding</h5>
                            <p class="text-muted">ใช้ข้อมูลที่รวบร่วม นำมาเขียน Website</p>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-badge">
                            <p> 2 พฤศจิกายน 2562 </p>
                        </div>
                        <div class="timeline-card">
                            <h5>ขั้นตอนการทดสอบ ระบบต่างๆ</h5>
                            <p class="text-muted">ทดสอบระบบ Website เพื่อให้แน่ใจว่าคุณจะไม่มีปัญหากับการใช้งาน</p>
                        </div>
                    </li>
                    <li class="timeline-arrow">
                        <i class="fas fa-chevron-down"></i>
                    </li>
                </ul>
            </div>
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