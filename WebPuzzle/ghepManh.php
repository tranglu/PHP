

/ $htmlKhung.='<div class="nen col border border-primary">
			// 				<p class="khungghep">'.$i.','.$j.'</p>
							
			// 				</div>';
	    if ($_POST){
	    			
			foreach($_SESSION["mangchon"] as $key =>$value){
				
				if($_SESSION["mangchon"][$key][1] == $i && 
					$_SESSION["mangchon"][$key][2] == $j) {
					$linkmanh=$_SESSION["mangchon"][$key][3];}
				else{$linkmanh="";}
				$htmlKhung.='<div class="nen col border border-primary">
					<img class="img-fluid hinhchen" src="'.$linkmanh.'">
					</div>';
			}
		}	
		else{
			$htmlKhung.=	'<div class="nen col border border-primary">
							<img class="img-fluid hinhchen w-100 h-100" src="'.$linkmanh.'">
							</div>';
			}
						// $htmlKhung.='
							
						// 	<img class="img-fluid hinhchen" src="'.$linkmanh.'">
						// ';
						// 	}
							
			//<img class="img-fluid hinhchen w-100 h-100" src="Image\cun-con-2.jpg">
			// 			}
			// 			}
			// else {
			// 	$htmlKhung.='<div class="col border border-primary">
			// 				<p class="" style="width: 50px;height: 150px;">'.$i.','.$j.'
			// 				<img class="img-fluid" src="'.$linkmanh.'"></p>
			// 			</div>';
			// }
					
		}
		$htmlKhung.=' </div>'; 