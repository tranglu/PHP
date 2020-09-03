<?php 
    include("data/data1.php");
 ?>         

                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <?php 
                                foreach ($arrProductCat as $value) {
                                    echo "<li><a href='#'>$value</a></li>";
                                }
                             ?>
                            
                            
                        </ul>
                    </div>
                </div>
