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
    <title>สร้างบัญชีกิจกรรม</title>

    <!-- link bootstrap css font -->
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
   <?php include_once('includes/navbar.php')?>
   
   <section class="jumbotron jumbotron-fluid text-center"> 
       <div class="container my-5 my-sm-1">
            <h1>สร้างบัญชีกิจกรรม</h1>
       </div>
   </section>


   <section class="container">
     <div class="row">
       <div class="col-12 profile-top">
           <!-- images -->
           <img src="assets/image/<?php echo $row['image']; ?>" class=" img-profile rounded-circle img-thumbnail" alt="Image Profile">

            

           <div class="card mt-3">
               <div class="card-body">
                   <form id="formUpdate" method="POST" action="php/ceateActivities.php">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="username">ชื่อผู้ใช้งาน</label>
                                <input type="text" class="form-control" name="username" id="username" value="<?php echo $row['username']; ?>" disabled>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">ชื่อบัญชีกิจกรรม</label>
                                <input type="text" class="form-control" name="activities" id="activities" value="">
                            </div>
                    
                    
                            <div class="form-group col-md-6">
                                <label for="name">เวลาเริ่มต้นการชำระเงิน</label>
                                <input type="date" class="form-control" name="datetime_start" id="datetime_start" value="">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name">เวลาสิ้นสุดการชำระเงิน</label>
                                <input type="date" class="form-control" name="datetime_end" id="datetime_end" value="">
                            </div>
                            

                        </div>
                        
                        <div class="form-group">
                            <label for="note">รายละเอียด</label>
                            <textarea class="form-control" name="note" id="note" rows="5"></textarea>
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
  <script src="assets/js/main.js"></script>

  
  <!-- javascript images Profile -->
  <script>

        $( document ).ready(function(){

            $('#formUpdate').validate({
                rules:{
                    name :'required',
                    Account_code: {
                        required: true,
                        
                    },
                    amount:{
                        required : true,
                        number : true,
                        maxlength : 20
                    },
                    note: 'required'
                },
                messages:{
                    name: 'โปรดกรอกข้อมูล ชื่อ - นามสกุล',
                    Account_code: {
                        required : 'โปรดกรอก Account code',
                        email : 'โปรดกรอก Account code ให้ถูกต้อง'
                    },
                    amount:{
                        required : 'โปรดกรอกข้อมูล จำนวนเงิน',
                        number : 'โปรดกรอกตัวเลขเท่านั้น',
                        maxlength : 'โปรดกรอกตัวเลขไม่เกิน 20 ตัว'
                    },
                    note: 'โปรดกรอกข้อมูล'
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


        });

        $('.custom-file-input').on('change', function(){
          var fileName = $(this).val().split('\\').pop()
          $(this).siblings('.custom-file-label').html(fileName)
          if (this.files[0]) {
                var reader = new FileReader()
                $('.figure').addClass('d-block')
                reader.onload = function (e){
                    $('#imgUpload').attr('src', e.target.result)
                }
                
                reader.readAsDataURL(this.files[0])
          }
          
        })

       

       
  </script>

</body>
</html>