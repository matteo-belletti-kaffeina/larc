<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
$wpdb = new wpdb( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
if(isset($_GET["term"])){
    $sql = 'SELECT p.*, s.Slug FROM A6vnDNw9U_mp_prestazioni as p , A6vnDNw9U_mp_specialita as s WHERE s.PKSpecialita=p.PKSpecialita AND (p.Descrizione LIKE "%'.$_GET["term"] . '%" OR p.Descrizione LIKE "'.$_GET["term"] . '%" OR p.Descrizione LIKE "'.$_GET["term"] . '") ORDER BY Descrizione';
    $results = $wpdb->get_results($sql);
	$tot = count($results);
    if($tot > 0){
		echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">';
			if($tot >8){
				$nPerCol = $tot / 3;
				$cont = 0;
				foreach ($results as $result){
					//$vetStampa[$cont] = '<a style="padding-left:20px;padding-top:20px;" href="/branca?branca='.$result->PKSpecialita.'"><i class="fas fa-angle-right"></i>   '.$result->Descrizione."</a><br>";
					$vetStampa[$cont] = '<li style="padding-bottom:10px;" ><a href="/branca/'.$result->Slug.'"><p style="line-height:5px;margin-bottom:0px;">'.$result->Descrizione."</p></a></li>";
					$cont++;
				}
				$cont = 0;
		?>
			<div class="colonna1terzo"><ul style="margin-left:20px;margin-top: 20px; ">
				<?php
					while($cont < $nPerCol){
						echo $vetStampa[$cont];
						$cont++;
					}
				?></ul>
			</div>
			<div class="colonna1terzo"><ul style="margin-left:20px;margin-top: 20px; ">
				<?php
					while($cont < ($nPerCol*2)){
						echo $vetStampa[$cont];
						$cont++;
					}
				?></ul>
			</div>
			<div class="colonna1terzo"><ul style="margin-left:20px;margin-top: 20px; ">
				<?php
					while($cont < $tot){
						echo $vetStampa[$cont];
						$cont++;
					}
				?></ul>
			</div>
				<?php	  
			}else{
				foreach ($results as $result){
					echo '<a style="padding-left:20px;padding-top:20px;" href="/branca/'.$result->Slug.'"><i class="fas fa-angle-right"></i>   ' . $result->Descrizione . "</a><br>";
				}
			}
	} else{
		echo '<p style="padding-left:20px;padding-top:20px;">Nessuna corrispondenza</p>';
	}
}
?>