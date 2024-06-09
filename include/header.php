<div>
      <div class="container-fluid">
        <div class="row nenxanh">
                <div class="col-md-4">
                    <img style="width: 520px; height: 70px;" class="logo" src="images/logo.jpg" alt="">
                </div>
        </div>
        <div class="row">
            <div class="col-12">
                <nav class="menu">
                    <ul style="display: flex; justify-content: space-between;">
                        <div>
                            <li><a  href="#">Trang chủ</a></li>
                            <li><a  href="#">Thông tin tuyển sinh</a></li>
                            <li><a href="#">Liên hệ</a></li>
                        </div>
                        <div>
                            <?php if (!isset($_SESSION['sv_login'])) { ?> <li><a class="ad" href="index.php?action=login" style="font-weight: bold;">ĐĂNG NHẬP</a></li> <?php } ?>
                        </div>
                    </ul>
                </nav>
            </div>          
        </div>
    </div> 
</div>
 
