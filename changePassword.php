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

    
    <!-- Section jumbotron -->
    <section class="jumbotron jumbotron-fluid text-center">
        <div class="container my-5 my-sm-1">
            <h1>เปลี่ยนรหัสผ่าน</h1>
        </div>
    </section>

    <!-- Section form -->
    <section class="container my-3">
        <div class="row justify-content-center">
            <div class="col-sm-6 profile-top">
                <img src="assets/images/<?php echo $row['image']; ?>"
                    class="my-3 img-profile rounded-circle img-thumbnail" alt="Image Profile">
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <form action="php/ChangePassword.php" class="col-sm-6 col-md-12" method="post"
                                id="formPassword">
                                <div class="form-group col-md-12 col-sm-6">
                                    <label for="oldpassword">รหัสผ่านเดิม</label>
                                    <input type="password" class="form-control" name="oldpassword" id="oldpassword">
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="password">รหัสผ่านใหม่</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="repassword">ยืนยันรหัสผ่านใหม่</label>
                                    <input type="password" class="form-control" name="repassword" id="repassword">
                                </div>
                                <input type="submit" name="submit" class="btn btn-primary btn-block"
                                    value="บันทึกข้อมูล">
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
    <script src="assets/js/password.js"></script>

    <script>
        $(document).ready(function () {
            $('#formPassword').validate({
                rules: {
                    oldpassword: {
                        required: true,
                        minlength: 4
                    },
                    password: {
                        required: true,
                        minlength: 4
                    },
                    repassword: {
                        required: true,
                        minlength: 4,
                        equalTo: '#password'
                    }
                },
                messages: {
                    oldpassword: {
                        required: 'โปรดกรอก รหัสผ่าน',
                        minlength: 'โปรดกรอกข้อมูล ไม่น้อยกว่า 4 ตัวอักษร'
                    },
                    password: {
                        required: 'โปรดกรอก รหัสผ่าน',
                        minlength: 'โปรดกรอกข้อมูล ไม่น้อยกว่า 4 ตัวอักษร'
                    },
                    repassword: {
                        required: 'โปรดกรอก รหัสผ่าน',
                        minlength: 'โปรดกรอกข้อมูล ไม่น้อยกว่า 4 ตัวอักษร',
                        equalTo: 'โปรดกรอกข้อมูลรหัสผ่านให้ตรงกัน'
                    }

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
        })

        function recaptchaCallback() {
            $('#submit').removeAttr('disabled');
        }

    </script>

</body>

</html>