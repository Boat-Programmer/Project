<?php $file_name = basename($_SERVER['SCRIPT_FILENAME'], ".php") ?>

<!-- Section Footer -->
<footer class="semi-footer mt-5 p-5 text-center text-md-left">
        <div class="row">
            <div class="col-md-4">
                <a class="navbar-brand" href="#">
                    <!-- <img src="" width="" height=""> -->
                    <h1>EasyPay</h1>
                </a>
                <p>
                    <i class="fas fa-phone-square"></i> : 09-999-9999 <br>

                    <i class="fa fa-envelope"></i> : email@example.com <br>

                    <i class="fa fa-address-card"></i> : Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos
                    voluptatem minima eligendi dolor voluptatum sapiente deleniti ab nulla nemo quibusdam repellendus
                    aspernatur, voluptate saepe quo provident repellat eius fugit reprehenderit. <br>
                </p>
                <a href="#" target="_blank">
                    <i class="fab fa-facebook-square"></i>
                </a>
                <a href="#" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" target="_blank">
                    <i class="fab fa-line"></i>
                </a>

            </div>
            <div class="col-md-3">
                <h4>เมนู</h4>
                <ul class="navbar-nav">
                    <li class="nav-item <?php echo $file_name == 'index' ? 'active': '' ?>">
                        <a class="nav-link" href="index.php"><i class="fas fa-home fa-fw"></i> Home</a>
                    </li>
                    <li class="nav-item <?php echo $file_name == 'about' ? 'active': '' ?>">
                        <a class="nav-link" href="about.php"><i class="fas fa-address-card fa-fw"></i> About</a>
                    </li>
                    <li class="nav-item <?php echo $file_name == 'blog' || $file_name == 'blog-detail' ? 'active': '' ?>">
                        <a class="nav-link" href="blog.php"><i class="fas fa-clipboard-list fa-fw"></i> Blog</a>
                    </li>
                    <li class="nav-item <?php echo $file_name == 'contact' ? 'active': '' ?>">
                        <a class="nav-link" href="contact.php"><i class="fas fa-comments fa-fw"></i> Contact</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>เกี่ยวกับเรา</h4>
                <p>บริการ Website ด้านการจัดการทางด้านการเงิน โดยมีระบบสนับสนุนในการทำงาน มีระบบแจ้งเตือนการทำธุรกรรม
                </p>
            </div>
        </div>
    </footer>
    <footer class="footer">
        <span>©CopyRight 2019 <a href="#">EasyPay studio</a>
            ALL right Reserved
        </span>
    </footer>