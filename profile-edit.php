<?php 

   require_once('php/connect.php');
   if (!isset($_SESSION['id'])) {
       header('location:index.php');
   } 
   $sql = "SELECT * FROM `members` WHERE `id` = '".$_SESSION['id']."' ";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   
   //  ชุดคำสั่งป้องกันการแฮค  
   if(!$result->num_rows){
       header('location:index.php');
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>

    <!-- link bootstrap css font -->
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- Section Navber -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-alpha">
        <div class="container mr-auto">
            <a class="navbar-brand" href="#">
                <!-- <img src="/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30"
                class="d-inline-block align-top" alt=""> -->
                EasyPay
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php if(isset($_SESSION['id'])){ ?>
                <!-- setting text Right -> mr-auto && Left -> ml-auto  && Text-Center -->
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="about.php">About us</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Contents</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['name']; ?>
                            <img src="assets/images/<?php echo $_SESSION['image']; ?>" class="rounded-circle"
                                width="30px" alt="">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="profile.php">ประวัติส่วนตัว</a>
                            <a class="dropdown-item" href="changePassword.php">เปลี่ยนรหัสผ่าน</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="php/logout.php">ออกจากระบบ</a>
                        </div>
                    </li>

                </ul>


                <?php } else { ?>
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item link">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="about.php">About us</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Contents</a>
                    </li>
                    <button type="button" class="btn btn-warning m-md-1 mt-3" data-toggle="modal" data-target="#login">
                        เข้าสู่ระบบ
                    </button>
                    <button type="button" class="btn btn-warning m-md-1 mt-3" data-toggle="modal"
                        data-target="#register">
                        สมัครสมาชิก
                    </button>
                </ul>
                <?php } ?>
            </div>
        </div>
    </nav>

    <!-- Section Jumbotron -->
    <section class="jumbotron jumbotron-fluid text-center">
        <div class="container my-5 my-sm-1">
            <h1>ประวัติส่วนตัว</h1>
        </div>
    </section>

    <!-- Section Form -->
    <section class="container">
        <div class="row">
            <div class="col-12 profile-top">
                <!-- images -->
                <img src="assets/images/<?php echo $row['image']; ?>" class=" img-profile rounded-circle img-thumbnail"
                    alt="Image Profile">

                <!-- Button trigger modal -->
                <button type="button" class="btn mx-auto d-block my-3 btn-warning" data-toggle="modal"
                    data-target="#exampleModal">
                    เปลี่ยนรูปภาพ
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">อัพโหลดรูปภาพ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="php/UpdateImage.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <figure class="figure text-center d-none mt-2">
                                        <img id="imgUpload" class="figure-img img-fluid rounded" alt="">
                                    </figure>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form id="formUpdate" method="POST" action="php/UpdateProfile.php">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username">ชื่อผู้ใช้งาน</label>
                                    <input type="text" class="form-control" name="username" id="username"
                                        value="<?php echo $row['username']; ?>" disabled>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="name">ชื่อ - นามสกุล</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="<?php echo $row['name']; ?>">
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="email">อีเมล์</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        value="<?php echo $row['email']; ?>">
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="phone">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        value="<?php echo $row['phone']; ?>">
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="phone">ที่อยู่</label>
                                <textarea class="form-control" name="address" id="address"
                                    rows="5"><?php echo $row['address']; ?></textarea>
                            </div>
                            <a href="profile.php" class="btn btn-warning float-left">ย้อนกลับ</a>
                            <input type="submit" name="submit" class="btn btn-primary float-right" value="บันทึกข้อมูล">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Script jquery bootstrap popper.js -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>

    <!-- javascript images Profile -->
    <script>

        $(document).ready(function () {

            $('#formUpdate').validate({
                rules: {
                    name: 'required',
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        number: true,
                        maxlength: 20
                    },
                    address: 'required'
                },
                messages: {
                    name: 'โปรดกรอกข้อมูล ชื่อ - นามสกุล',
                    email: {
                        required: 'โปรดกรอก Email',
                        email: 'โปรดกรอก Email ให้ถูกต้อง'
                    },
                    phone: {
                        required: 'โปรดกรอกข้อมูล เบอร์โทรศัพท์',
                        number: 'โปรดกรอกตัวเลขเท่านั้น',
                        maxlength: 'โปรดกรอกตัวเลขไม่เกิน 20 ตัว'
                    },
                    address: 'โปรดกรอกข้อมูลที่อยู่'
                },
                errorElement: 'div',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback')
                    error.insertAfter(element)
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid').removeClass('is-valid')
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-valid').removeClass('is-invalid')
                }

            });


        });

        $('.custom-file-input').on('change', function () {
            var fileName = $(this).val().split('\\').pop()
            $(this).siblings('.custom-file-label').html(fileName)
            if (this.files[0]) {
                var reader = new FileReader()
                $('.figure').addClass('d-block')
                reader.onload = function (e) {
                    $('#imgUpload').attr('src', e.target.result)
                }

                reader.readAsDataURL(this.files[0])
            }

        })

    </script>

</body>

</html>