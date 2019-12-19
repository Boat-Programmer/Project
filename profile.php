<?php 
   session_start();
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
    
   
   <section class="jumbotron jumbotron-fluid text-center"> 
       <div class="container my-5 my-sm-1">
            <h1>ประวัติส่วนตัว</h1>
       </div>
   </section>


   <section class="container">
     <div class="row">
       <div class="col-12 profile-top">
           <img src="assets/images/<?php echo $row['image']; ?>" class="my-3 img-profile rounded-circle img-thumbnail" alt="Image Profile">
           <div class="card">
               <div class="card-body">
                   <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="username">ชื่อผู้ใช้งาน</label>
                            <input type="text" class="form-control" id="username" value="<?php echo $row['username']; ?>"  disabled>
                        </div>
                  
                   
                        <div class="form-group col-md-6">
                            <label for="name">ชื่อ - นามสกุล</label>
                            <input type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" disabled>
                        </div>
                  
                   
                        <div class="form-group col-md-6">
                            <label for="email">อีเมล์</label>
                            <input type="text" class="form-control" id="email" value="<?php echo $row['email']; ?>" disabled>
                        </div>
                   
                   
                        <div class="form-group col-md-6">
                            <label for="phone">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" id="phone" value="<?php echo $row['phone']; ?>" disabled>
                        </div>

                    </div>
                    
                    <div class="form-group">
                        <label for="phone">ที่อยู่</label>
                        <textarea class="form-control" id="address" rows="5" disabled><?php echo $row['address']; ?></textarea>
                    </div>
                    <a href="dashboard.php" class="btn btn-warning float-left">ย้อนกลับ</a>
                    <a href="profile-edit.php" class="btn btn-warning float-right">แก้ไขข้อมูล</a>

               </div>
           </div>
       </div>
     </div>
   </section>

  <!-- Script jquery bootstrap popper.js -->
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>

</body>
</html>