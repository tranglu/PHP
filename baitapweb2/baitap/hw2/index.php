<?php 
function xuat1SP($tensp,$url,$mota,$gia){
  $html="
        <div class='column1'>
        <h3>$tensp</h3>
        <img src='../../images/$url' alt='' />
        <div class='columnText'>$mota</div>
        <div class='columnLink'>USD $gia <span class='order'>| <a href='#''>Order Now</a></span> </div>
      </div>";
      echo $html;
}
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Universal</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
 
  <div class="clear"></div>
  <div id="header">
    <div id="logo"></div>
    <div id="menu2">
      <ul>
        <li><a href="..\..\index.html">Home</a></li>
        
      </ul>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <div id="banner">
    <h1>DIGITAL R50</h1>
    <div class="features">
      <ul>
        <li>How it work? <br />
          <span class="bannertxt">Lorem ipsum dolor sit amet, adipiscing elit.</span></li>
        <li>Features and Benefits<br />
          <span class="bannertxt">Nunc consectetuer diam ac odio.</span></li>
        <li>Specifications<br />
          <span class="bannertxt">Vivamus eleifend sollicitudin velit</span></li>
      </ul>
    </div>
    <div class="readMore"><a href="#">ReadMore</a></div>
  </div> 
  <div class="compatibility">
    <div class="compatibilitybox">
      <div class="compatibilitytxt"> Compatibility : </div>
      <div class="compatibilityicon"> <a href="#"> <img src="../../images/window.jpg" alt="" border="0" /> </a> </div>
      <div class="compatibilityicon"> <a href="#"> <img src="../../images/mac.jpg" alt="" border="0" /> </a> </div>
      <div class="compatibilityicon"> <a href="#"> <img src="../../images/3.jpg" alt="" border="0" /> </a> </div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <div class="welCome">
     <div id="columZone">
      <?php 
      #khai báo mang chua du lieu
      include("data.php");
       /*$n=rand(4,20);
      for($i=1;$i<$n;$i++)
      {
         xuat1SP($arr["tensp"]. $i,$arr["url"],$arr["mota"],$arr["gia"]);
      }*/
        
       foreach ($arrSP as $arr)
         
      {
        xuat1SP($arr["tensp"],$arr["url"],$arr["mota"],$arr["gia"]);
      };
      ?>
       <div class="clear"></div>
      }
    </div> 

   
  </div>
  <div class="bottom_container">
    <div id="container2">
      <div class="welCome">
        <div class="welComeleft"></div>
        <div class="welComeright"></div>
        <h2>WELCOME TO OUR SHOP </h2>
      </div>
      <div class="welCometextBox1">
        <div class="welCometext"> <span class="welCometextBold">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</span> Duis cursus tortor. Nunc consectetuer diam ac odio. Pellentesque vel mauris sit amet urna malesuada ornare. Curabitur venenatis est eget arcu. Donec vestibulum. Proin rutrum. Morbi commodo fringilla orci. Ut vel tortor. In ut velit. Vivamus hendrerit aliquam quam. Curabitur placerat eros vitae libero. Fusce sagittis commodo purus. Cras orci. Quisque at justo.<br />
          <br />
          <span class="welCometextBold">Nunc viverra. Aliquam suscipit egestas turpis. Aenean mollis est.</span> Sed feugiat, nulla sit amet dictum aliquam, massa leo elementum risus, sed gravida felis erat ut libero. Integer sem nisi, adipiscing non, sagittis eget, hendrerit non, nisi. Aliquam ante. Nam magna. Pellentesque vitae velit at dui semper sodales. Curabitur accumsan ornare libero. Quisque auctor. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla adipiscing porta ante. </div>
      </div>
    </div>
    <div class="welCometextBox2">
      <h4>LATEST NEWS</h4>
      <div class="news">
        <p><span>Nullam Quasta massiva</span> Consectetuer non, congue ac, ligula. Suspendisse hendrerit auctor velit. </p>
        <p><span>Feugiat aliquam</span> Ut interdum nisi eget dolor. Ut at magna ac pede feugiat aliquam. </p>
      </div>
      <div class="more"><a href="#">more...</a></div>
    </div>
  </div>
  <div class="clear"></div>
  <div id="footer">
    <ul>
      Copyright (c) Sitename.com. All rights reserved. Design by Stylish <a href="http://www.stylishtemplate.com">Website Templates</a>.
    </ul>
  </div>
</div>
</body>
</html>
