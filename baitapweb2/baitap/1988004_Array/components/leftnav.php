<?php
include_once("./data/data1.php");
include_once("./data/data2.php");
?>

<aside id="left_column">
  <h2 class="title">CATEGORIES</h2>
  <nav>
    <OL>
      <?php
      for ($i = 0; $i < count($Cat_Array); $i++)
      { 
        $childcat = 'Cat_'.$i.'_Array';
        echo '<li><b><a href="#">'. strtoupper($Cat_Array[$i]).'</a></b><ul>';
        for($j = 0; $j < count($$childcat); $j++) 
        { 
          echo '<LI><a href="#">'.$$childcat[$j].'</a></LI>';
        } 
        echo '</ul></li>';
      } 
      ?>
      </LI>
    </OL>
  </nav>
  <!-- /nav -->
</aside>