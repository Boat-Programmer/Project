<?php $file_name = basename($_SERVER['SCRIPT_FILENAME'], ".php"); ?>
<!-- Section Navber -->
<nav id=navbar class="navbar navbar-expand-lg fixed-top navbar-dark bg-alpha">
    <div class="container mr-auto">
        <a class="navbar-brand" href="index.php">
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
                <li class="nav-item <?php echo $file_name == 'index' ? 'active': '' ?>">
                    <a class="nav-link" href="index.php"><i class="fas fa-home fa-fw"></i> Home</a>
                </li>
                <li class="nav-item <?php echo $file_name == 'about' ? 'active': '' ?>">
                    <a class="nav-link" href="about.php"><i class="fas fa-address-card fa-fw"></i> About us</a>
                </li>
                <li class="nav-item <?php echo $file_name == 'blog' || $file_name == 'blog-detail' ? 'active': '' ?>">
                    <a class="nav-link" href="blog.php"><i class="fas fa-clipboard-list fa-fw"></i> Blog</a>
                </li>
                <li class="nav-item <?php echo $file_name == 'contact' ? 'active': '' ?>">
                    <a class="nav-link" href="contact.php"><i class="fas fa-comments fa-fw"></i> Contents</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['name']; ?>
                        <img src="assets/images/members/<?php echo $_SESSION['image']; ?>" class="rounded-circle" width="30px"
                            alt="">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="dashboard.php"><i class="fas fa-tachometer-alt fa-fw"></i> Dashboard</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="profile.php"><i class="fas fa-edit fa-fw"></i> ประวัติส่วนตัว</a>
                        <a class="dropdown-item" href="changePassword.php"><i class="fas fa-unlock-alt fa-fw"></i> เปลี่ยนรหัสผ่าน</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="php/logout.php"><i class="fas fa-sign-out-alt fa-fw"></i> ออกจากระบบ</a>
                    </div>
                </li>
            </ul>

            <?php } else { ?>
            <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item <?php echo $file_name == 'index' ? 'active': '' ?>">
                    <a class="nav-link" href="index.php"><i class="fas fa-home fa-fw"></i> Home</a>
                </li>
                <li class="nav-item <?php echo $file_name == 'about' ? 'active': '' ?>">
                    <a class="nav-link" href="about.php"><i class="fas fa-address-card fa-fw"></i> About us</a>
                </li>
                <li class="nav-item <?php echo $file_name == 'blog' || $file_name == 'blog-detail' ? 'active': '' ?>">
                    <a class="nav-link" href="blog.php"><i class="fas fa-clipboard-list fa-fw"></i> Blog</a>
                </li>
                <li class="nav-item <?php echo $file_name == 'contact' ? 'active': '' ?>">
                    <a class="nav-link" href="contact.php"><i class="fas fa-comments fa-fw"></i> Contents</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" data-toggle="modal"data-target="#login">
                    <i class="fas fa-sign-in-alt fa-fw"></i> เข้าสู่ระบบ</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" data-toggle="modal"
                    data-target="#register"><i class="fas fa-user-plus fa-fw"></i> สมัครสมาชิก</a>
                </li>
            </ul>
            <?php } ?>
        </div>
    </div>
</nav>

 <!-- Modal Login -->
 <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เข้าสู่ระบบ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" method="post" action="php/login.php">
                        <!--  -->
                        <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                                required>
                        </div>
                        <!--  -->
                        <label class="sr-only" for="inlineFormInputGroupUsername2">Password</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" required>
                        </div>

                        <button type="submit" name="submit_login" class="btn btn-warning btn-block mb-2">เข้าสู่ระบบ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Register -->
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">สมัครสมาชิก</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" id="formRegister" method="post" action="php/register.php">

                        <!-- name_lastname -->
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อ - นามสกุล">
                        </div>

                        <!-- Email -->
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-at"></i></div>
                            </div>
                            <input type="text" class="form-control" id="email" name="email" placeholder="example@domain.com">
                        </div>

                        <!-- Phone -->
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-phone"></i></div>
                            </div>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="เบอร์โทรศัพท์">
                        </div>
                        <!-- Username -->
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        </div>
                        <!-- Password -->
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
                        </div>

                        <!-- Confirm_Password -->
                        <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                        </div>

                        <div class="form-group mb-2 mr-sm-2">
                            <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LfWCbwUAAAAAANnBvwO7G8AqLXkt2ZKKQZa1VCc"></div>
                        </div>

                        <button type="submit" name="btn-submit" id="btn-submit" disabled class="btn btn-warning btn-block mb-2">สมัครสมาชิก</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

  <script>
  
  function recaptchaCallback() {
    $('#btn-submit').removeAttr('disabled');
   }

  </script>
    
    