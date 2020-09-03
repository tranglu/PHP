
<?php 
//session_start();
$doi=$_SESSION['doi'];
//if(defined("key")==false) header("location:index.php");
$temp5="
 <div class='container'>
 
 <form action='Layouts/Rieng/xulyadd.php' method='POST'>
            <div class='row'>
            <div class='col-xs-3'>Đội</div>
            <div class='col-xs-9'><input class='form-control' type='text' name='doi'value='$doi'></div>
            </div>
             <div class='row'>
            <div class='col-3'>Họ Tên</div>
            <div class='col-9'><input class='form-control' type='text' name='hoten' ></div>
            </div>
             <div class='row'>
            <div class='col-3'>Email</div>
                  <div class='col-9'><input class='form-control' type='text' name='email' ></div>
            </div>
            <p>
              <input type='submit' class='btn-lg display-5' value='Lưu'> - <button class='btn-lg display-5'><a href='../../index.php'>HỦY</a></button>
            </p>
          </form> 
       
          </div>";
 ?>