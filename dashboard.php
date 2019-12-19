<?php  

session_start(); 
require_once('php/connect.php');
if (!isset($_SESSION['id'])) {
    header('location:index.php');
} 
$sql = "SELECT * FROM `members` WHERE `id` = '".$_SESSION['id']."' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql_activite = "SELECT * FROM `activite`";
$result_activite = $conn->query($sql_activite);


$sql_paymemt = "SELECT * FROM `paymemt`";
$result_paymemt = $conn->query($sql_paymemt);

$sql = "SELECT * FROM activite";
    $result = mysqli_query($conn, $sql);
 
    if (mysqli_num_rows($result) > 0) {
 
        while($row = mysqli_fetch_assoc($result)) {
            
            $labels[] = $row['name'];
            
            $data[] = $row['payment'];
        }
    }
//  ชุดคำสั่งป้องกันการแฮค  
if(!$result->num_rows){
    header('location:index.php');
}



?>
<?php $file_name = basename($_SERVER['SCRIPT_FILENAME'], ".php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <!-- Link Libery file .css && fonttext font.google -->
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="node_modules/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css">
    <link rel="stylesheet" href="node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="node_modules/chart.js/dist/Chart.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    
    <?php include_once('includes/navbar.php')?>
   
      
        <div style="margin:auto;width:800px;">
            <div id='calendar'></div>
        </div>
  


    <section class="container py-1">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="border-short-bottom">Dashboard</h2>
            </div>
            
        </div>
    </section>

    <div class="container py-5">
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>

    <section class="container text-right">
        <button type="button" class="btn btn-outline-warning " data-toggle="modal" data-target="#Articles"
            data-whatever="@mdo"><i class="fas fa-users fa-2x " aria-hidden="true"></i> สร้างบัญชี</button>
        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#Payments"
            data-whatever="@fat"><i class="fab fa-btc fa-2x " aria-hidden="true"></i> ชำระเงิน</button>
    </section>


    <section class="container py-5">
      <div class="card h-100">
         <div class="card-body">
         <h4 class="card-title">บัญชีกิจกรรม</h4>
         <table id="myTable1" class="table table-bordered table-striped table-sm display">
          <thead>
          <tr>
            <th>ID.</th>
            <th>Username</th>
            <th>ชื่อบัญชีกิจกรรม</th>
            <th>จำนวนเงิน</th>
            <th>ยอดเงิน</th>
            <th>ประเภทการชำระ</th>
            <th>เวลาสิ้นสุดการชำระเงิน</th>
            <th>รายละเอียด</th>
          </tr>
          </thead>
          <tbody>
          <?php 
              $num = 0;
              while($row = $result_activite->fetch_assoc()) { 
                $num++;
          ?>
            <tr>
              <td><?php echo $num; ?></td>
              <td><?php echo $row['username'] ?></td>
              <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['coin'] ?></td>
              <td><?php echo $row['payment'] ?></td>
              <td><?php echo $row['type'] ?></td>
              <td><?php echo $row['time'] ?></td>
              <td><?php echo $row['message'] ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
         </div>
      </div>

    </section>

    <section class="container py-5">
      <div class="card h-100">
         <div class="card-body">
         <h4 class="card-title">ประวัติการชำระเงิน</h4>
         <table id="myTable0" class="table table-bordered table-striped table-sm display">
          <thead>
          <tr>
            <th>ID.</th>
            <th>Username</th>
            <th>ชื่อบัญชีกิจกรรม</th>
            <th>จำนวนเงิน</th>
            <th>ประเภทการชำระ</th>
            <th>เวลาการชำระเงิน</th>
            <th>หลักฐานการชำระ</th>
            <th>รายละเอียด</th>
          </tr>
          </thead>
          <tbody>
          <?php 
              $num = 0;
              while($row = $result_paymemt->fetch_assoc()) { 
                $num++;
          ?>
            <tr>
              <td><?php echo $num; ?></td>
              <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['activite'] ?></td>
              <td><?php echo $row['coin'] ?></td>
              <td><?php echo $row['type'] ?></td>
              <td><?php echo $row['time'] ?></td>
              <td><?php echo $row['image'] ?></td>
              <td><?php echo $row['message'] ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
         </div>
      </div>

    </section>

    <div class="modal fade" id="Articles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">สร้างบัญชี</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formUpdate" method="POST" action="php/activite.php">
                        <div class="form-group">
                            <label for="name" class="col-form-label">ชื่อบัญชี : </label>
                            <input type="text" class="form-control" id="name" name="name">


                            <label for="name" class="col-form-label">กำหนดจำนวนเงินการชำระ :</label>
                            <input type="text" class="form-control" id="coin" name="coin">

                             <label for="name" class="col-form-label">ประเภทการชำระ : </label>
                            <select class="form-control" id="type" name="type">
                                <option>จ่ายกับหัวหน้าห้อง</option>
                                <option>จ่ายผ่านบัญชีธนาคาร</option>
                                <option>จ่ายกับหัวหน้าห้อง - จ่ายผ่านบัญชีธนาคาร</option>
                            </select>

                            <label for="name" class="col-form-label">เลขบัญชีธนาคาร :</label>
                            <input type="text" class="form-control" id="number" name="number">

                            <label for="data" class="col-form-label">เวลาสิ้นสุดการชำระ : </label>
                            <input type="date" class="form-control" id="time" name="time">
                    
                            <label for="text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message" name="message"></textarea>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" name="submit" class="btn btn-primary" value="บันทึกข้อมูล">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Payments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ชำระเงิน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="php/UpdateCoin.php">
                        <div class="form-group">

                            
                        <div class="form-group">
                                <label for="name">บัญชีกิจกรรม</label>
                                <select class="form-control" name="activite">
                                     <?php
                                     $sql = "SELECT * FROM activite";
                                     $result = $conn->query($sql);
                                     while ($row = $result->fetch_assoc()) 
                                     {             
                                       $id = $row['id'];
                                       $name = $row['name'];
                                       echo"<option value='$name'>$id : $name</option>"; 
                                     }
                                     ?>
                                </select>
                            </div>
                                
                            
                            
                            <label for="recipient-name" class="col-form-label">จำนวนเงิน : </label>
                            <input type="text" class="form-control" id="coin" name="coin">
                        
                            
                            <label for="recipient-name" class="col-form-label">ประเภทการชำระ: </label>
                            <select class="form-control" name="type" id="type">
                                <option>จ่ายกับหัวหน้าห้อง</option>
                                <option>จ่ายผ่านบัญชีธนาคาร</option>
                            </select>

                            <label for="recipient-name" class="col-form-label">เวลาการชำระ : </label>
                            <input type="date" class="form-control" id="time" name="time">

                            <label for="recipient-name" class="col-form-label">หลักฐานการชำระเงิน </label>
                            <input type="file" class="form-control-file" id="image" name="image">


                    
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message" name="message"></textarea>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" name="submit" id="submit" class="btn btn-primary" value="ชำระเงิน">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('includes/footer.php') ?>

    <div class="to-top">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>

    <!-- Linke script libery file .js -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="node_modules/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="node_modules/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="node_modules/jszip/dist/jszip.min.js"></script>
    <script src="node_modules/pdfmake/pdfmake/build/pdfmake.js"></script>
    <script src="node_modules/pdfmake/pdfmake/build/vfs_fonts.js"></script>
    <script src="node_modules/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="node_modules/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="node_modules/chart.js/dist/Chart.min.js"></script>
   
    
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
    $(document).ready( function () {
      $('#myTable0').DataTable({
        "scrollY": true,
        "scrollY": true,
        dom: '<f<"mb-3"B>ltip>',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
        
      });    
     } );

     $(document).ready( function () {
      $('#myTable1').DataTable({
        "scrollY": true,
        dom: '<f<"mb-3"B>ltip>',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
        
      });    
     } );

     //ต้องระบุตามชื่อของ ไฟล์ font
    pdfMake.fonts = {
        Roboto: {
        normal: 'THSarabunNew.ttf',
        bold: 'THSarabunNew-Bold.ttf',
        italics: 'THSarabunNew-Italic.ttf',
        bolditalics: 'THSarabunNew-BoldItalic.ttf'
        }
    }
    

    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        //type: 'bar',
        //type: 'line',
        type: 'pie',
        data: {
            labels: <?=json_encode($labels)?>,
            datasets: [{
                label: 'ยอดเงิน',
                data: <?=json_encode($data, JSON_NUMERIC_CHECK);?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
             responsive: true,
             title: {
                display: true,
                text: 'ยอดเงินกิจกรรม'
            }
        }
    });

    </script>
</body>

</html>