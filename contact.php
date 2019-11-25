<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>

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
                    <h1 class="display-4 font-weight-bold">Contact</h1>
                    <p class="lead">มีปัญหาอะไร หรือ สงสัยอะไรในการใช้งาน EasyPay เราช่วยคุณได้</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Section Blog -->
    <section class="container py-5">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="border-short-bottom">รายละเอียด</h2>
            </div>
            <div class="col-sm-4 mb-3">
                <div class="card  h-100">
                    <div class="card-body">
                        <i class="fa fa-address-card fa-4x text-info" aria-hidden="true"></i>
                        <h4 class="card-title">address</h4>
                        <P class="card-text">999/999 แขวงลาดกระบัง กรุงเทพมหานคร</P>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3">
                <div class="card  h-100">
                    <div class="card-body">
                        <i class="fa fa-phone-square fa-4x text-info" aria-hidden="true"></i>
                        <h4 class="card-title">phone</h4>
                        <P class="card-text">099-9999999</P>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3">
                <div class="card  h-100">
                    <div class="card-body">
                        <i class="fa fa-envelope fa-4x text-info" aria-hidden="true"></i>
                        <h4 class="card-title">email</h4>
                        <P class="card-text">sample@.ac.th</P>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> แบบฟอร์มติดต่อเรา</h5>
                        <form id="formContact" method="post" action="php/contact.php">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="name">ชื่อ</label>
                                    <input type="text" class="form-control" id="name" name="name" required placeholder="ชื่อของคุณ">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="name">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required placeholder="เบอร์โทรศัพท์">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="name">อีเมล์</label>
                                    <input type="text" class="form-control" id="email" name="email" required placeholder="อีเมล์ของคุณ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">ข้อความของคุณ</label>
                                <textarea id="message" name="message" rows="5" class="form-control"
                                    required placeholder="เขียนข้อความของคุณที่นี้"></textarea>
                            </div>
                            <div id="recaptcha-wrapper" class="text-center my-2">
                                <div class="g-recaptcha d-inline-block" data-callback="recaptchaCallback1" data-sitekey="6LepfsQUAAAAAI7pxkOxZU85P2Frx94aXhQRE_ah"></div>
                            </div>
                            <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-warning d-block mx-auto disabled">ส่งข้อความ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('includes/footer.php')?>

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
    
    <script>
    $( document ).ready(function(){
    $('#formContact').validate({
        rules:{
            name :'required',
            email: {
                required: true,
                email: true
            },
            phone:{
                required : true,
                number : true,
                maxlength : 20
            }
        },
        messages:{
            name: 'โปรดกรอกข้อมูล ชื่อ - นามสกุล',
            email: {
                required : 'โปรดกรอก Email',
                email : 'โปรดกรอก Email ให้ถูกต้อง'
            },
            phone:{
                required : 'โปรดกรอกข้อมูล เบอร์โทรศัพท์',
                number : 'โปรดกรอกตัวเลขเท่านั้น',
                maxlength : 'โปรดกรอกตัวเลขไม่เกิน 20 ตัว'
            },
        },
        errorElement: 'div',
        errorPlacement: function (error, element){
            error.addClass( 'invalid-feedback' )
            error.insertAfter( element )
        },
        highlight: function (element , errorClass, validClass){
            $( element ).addClass( 'is-invalid' ).removeClass( 'is-valid' )
        },
        unhighlight: function (element , errorClass, validClass){
            $( element ).addClass( 'is-valid' ).removeClass( 'is-invalid' )
        }
        
    });
})

function recaptchaCallback1() {
    $('#btn-submit').removeAttr('disabled');
}

$(function(){
            // global variables
            captchaResized = false;
            captchaWidth = 304;
            captchaHeight = 78;
            captchaWrapper = $('#recaptcha-wrapper');
            captchaElements = $('#rc-imageselect, .g-recaptcha');

            $(window).on('resize', function() {
                resizeCaptcha();
            });

            resizeCaptcha();
        });

        function resizeCaptcha() {
            if (captchaWrapper.width() >= captchaWidth) {
                if (captchaResized) {
                    captchaElements.css('transform', '').css('-webkit-transform', '').css('-ms-transform', '').css('-o-transform', '').css('transform-origin', '').css('-webkit-transform-origin', '').css('-ms-transform-origin', '').css('-o-transform-origin', '');
                    captchaWrapper.height(captchaHeight);
                    captchaResized = false;
                }
            } else {
                var scale = (1 - (captchaWidth - captchaWrapper.width()) * (0.05/15));
                captchaElements.css('transform', 'scale('+scale+')').css('-webkit-transform', 'scale('+scale+')').css('-ms-transform', 'scale('+scale+')').css('-o-transform', 'scale('+scale+')').css('transform-origin', '0 0').css('-webkit-transform-origin', '0 0').css('-ms-transform-origin', '0 0').css('-o-transform-origin', '0 0');
                captchaWrapper.height(captchaHeight * scale);
                if (captchaResized == false) captchaResized = true;
            }
        }
        // resizeCaptcha();
    </script>
   
</body>

</html>