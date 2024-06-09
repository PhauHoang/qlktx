 <div class="container-fluid">
        <dir class="row">
            <div class="nenbac" style="margin-left: -20px; width: 250px;">
                    <nav id="menu" style="width: 250px;">      
                        <ul>
                            <h3> Sinh Viên </h3> 
                                    <?php if (!isset($_SESSION['sv_login'])) { ?> <li><a href="index.php?action=login">Đăng nhập</a></li> <?php } ?>
                                    <li><a href="index.php?action=capnhapthongtin">Cập nhập thông tin</a></li>
                                    <li><a href="index.php?action=dkphong">Đăng ký phòng ở</a></li>
                                    <li><a href="index.php?action=chuyenphong">Đăng ký chuyển phòng</a></li>
                                    <li><a href="index.php?action=traphong">Trả phòng</a></li>
                                    <li><a href="index.php?action=phongdango">Xem phòng đang ở</a></li>
                                    <li><a href="index.php?action=xemthongbao">Xem thông báo</a></li>
                                    <?php if (isset($_SESSION['sv_login'])) { ?> <li><a style="font-weight: bold;" href="index.php?action=logout">ĐĂNG XUẤT</a></li> <?php } ?>
                                    
                        </ul>        
                      </nav>
            </div>
            <div class="col-8 ">
                <?php include_once('include/content.php'); ?>
            </div>
            <div class="col-2 nenbac">
               <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">   
                    <img src="images/logo.jpg" width="200" 
                         alt="Activities Board">
                    <center><h2><a href="https://tnut.edu.vn/" class="no_underline">
                        Tin tức TNUT</center>
                    </a></h2>
                    <p class="news_item">Ký Túc Xá sẽ mở cửa phục vụ sinh viên ....</p>
                    <img style="width: 215px; height: 300px;" src="images/ktx.png" alt="">
                </div>
            </div>
        </dir>        
    </div>