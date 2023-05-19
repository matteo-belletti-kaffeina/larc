<?php
/*
Plugin Name: Manager Prestazioni
*/

function stampa_specialita($idArea){
    extract(shortcode_atts(array(
        'area' => 'area'
    ), $idArea));
	global $wpdb;
    $contatore=0;
	$id_area_query =  $idArea['area'];
    $myrows = $wpdb->get_results( "SELECT DISTINCT A6vnDNw9U_mp_specialita.PKSpecialita,A6vnDNw9U_mp_specialita.Nome,A6vnDNw9U_mp_specialita.Slug FROM A6vnDNw9U_mp_specialita,A6vnDNw9U_area_specialita, A6vnDNw9U_mp_prestazioni WHERE A6vnDNw9U_mp_prestazioni.PKSpecialita = A6vnDNw9U_mp_specialita.PKSpecialita AND A6vnDNw9U_mp_specialita.PKSpecialita = A6vnDNw9U_area_specialita.id_specialita AND A6vnDNw9U_area_specialita.id_area=".$id_area_query." ORDER BY Nome" );
    foreach ( $myrows as $print ){
		$vetDesc[$contatore] = $print->Nome;
		$vetPK[$contatore] = $print->PKSpecialita;
        $vetSlug[$contatore] = $print->Slug;
		$contatore++;
    }
    if ($contatore!=0){
	echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">';
	echo "
		<style>
			.elencoPrestazioni{
				padding-bottom:15px;
				line-height: 17.5px;
			}
		</style>
	";
	if($contatore > 11){	
		$cont = 0;
		$divisore = $contatore / 4;
		echo "<div class='sc_item_columns sc_item_columns_4 trx_addons_columns_wrap columns_padding_bottom'>";    
		echo "<div class='trx_addons_column-1_4 branche'>";
		while($cont < $divisore ){
			echo "<div class='elencoPrestazioni'><a href='/branca/".$vetSlug[$cont]."'><i class='fas fa-angle-right'></i>  ".$vetDesc[$cont]."</a></div>";
			$cont++;
		}
		echo '</div>';
		echo "<div class='trx_addons_column-1_4 branche'>";
		while($cont < ($divisore*2) ){
			echo "<div class='elencoPrestazioni'><a href='/branca/".$vetSlug[$cont]."'><i class='fas fa-angle-right'></i>  ".$vetDesc[$cont]."</a></div>";
			$cont++;
		}
		echo '</div>';
		echo "<div class='trx_addons_column-1_4 branche'>";
		while($cont < ($divisore*3) ){
			echo "<div class='elencoPrestazioni'><a href='/branca/".$vetSlug[$cont]."'><i class='fas fa-angle-right'></i>  ".$vetDesc[$cont]."</a></div>";
			$cont++;
		}
		echo '</div>';
		echo "<div class='trx_addons_column-1_4 branche'>";
		while($cont < $contatore ){
			echo "<div class='elencoPrestazioni'><a href='/branca/".$vetSlug[$cont]."'><i class='fas fa-angle-right'></i>  ".$vetDesc[$cont]."</a></div>";
			$cont++;
		}
		echo '</div>';
		echo '</div>';	
	}else{
		$cont = 0;
		echo "<div class='sc_item_columns sc_item_columns_4 trx_addons_columns_wrap columns_padding_bottom'>";    
		echo "<div class='trx_addons_column-1_1 branche'>";
		while($cont <  $contatore ){
			echo "<div class='elencoPrestazioni'><a href='/branca/".$vetSlug[$cont]."'><i class='fas fa-angle-right'></i>  ".$vetDesc[$cont]."</a></div>";
			$cont++;
		}
		echo '</div>';
    }
	}	
        else{
            echo "Elenco in fase di aggiornamento.";
        }
}
add_shortcode('sc_stampa_specialita', 'stampa_specialita');

function stampa_prestazioni(){
	echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">';
    global $wpdb;
	$slug_branca = $_GET["branca"];
    //$id_branca = $_GET["id"];
	$brancaRows = $wpdb->get_results( "SELECT * FROM A6vnDNw9U_mp_specialita WHERE A6vnDNw9U_mp_specialita.Slug='".$slug_branca."'");
	foreach ( $brancaRows as $branca ){
        $id_branca = $branca->PKSpecialita;
        echo "<h1>".$branca->Nome."</h1>";
        if($slug_branca == "dentista"){
	   ?>
        <h3>ODONTOLARC VENEZIA</h3>
		<p style="margin-bottom: 1em;">Per informazioni e prenotazioni <a href="tel:0112305128">011.2305128</a> - <a href="tel:3351539243">335.1539243</a></p>
		<p style="margin-bottom: 1em;">E-mail: <a href="mailto:odontolarc@gruppolarc.it">odontolarc@gruppolarc.it</a></p>
        <h3>ODONTOLARC MOMBARCARO</h3>
		<p style="margin-bottom: 1em;">Per informazioni e prenotazioni <a href="tel:0110133711"> 011.0133711</a> - <a href="tel:3938708097">393.8708097</a></p>
		<p style="margin-bottom: 1em;">E-mail: <a href="mailto:odontolarc@gruppolarc.it">odontolarc@gruppolarc.it</a></p>
		<p style="margin-bottom: 1em;">Per prenotare direttamente dal nostro portale web clicca sul pulsante.</p>
		<p style="margin-bottom: 1em;">
			<a href="https://www.larcservizi.it" id="sc_button_1573382268" class="sc_button sc_button_default sc_button_alter sc_button_size_normal sc_button_icon_left">
				<span class="sc_button_text"><span class="sc_button_title">PRENOTA ONLINE</span></span>
			</a>
		</p>
	   <?php }else{ ?>
		<p style="margin-bottom: 1em;">Per informazioni e prenotazioni private:	<a href="tel:0110341777">011.03.41.777</a></p>
		<p style="margin-bottom: 1em;">Per informazioni e prenotazioni in convenzione con il SSN: <a href="tel:0112484067">011.248.40.67</a></p>
		<p style="margin-bottom: 1em;">E-mail: <a href="mailto:prenotazioni@gruppolarc.it">prenotazioni@gruppolarc.it</a></p>
		<p style="margin-bottom: 1em;">Per prenotare direttamente dal nostro portale web clicca sul pulsante.</p>
		<p style="margin-bottom: 1em;">
			<a href="https://www.larcservizi.it" id="sc_button_1573382268" class="sc_button sc_button_default sc_button_alter sc_button_size_normal sc_button_icon_left">
				<span class="sc_button_text"><span class="sc_button_title">PRENOTA ONLINE</span></span>
			</a>
		</p>
	   <?php } }
	$contatore=0;
	echo "<h4>ELENCO PRESTAZIONI:</h4><br>";
    $myrows = $wpdb->get_results( "SELECT * FROM A6vnDNw9U_mp_prestazioni WHERE PKSpecialita='".$id_branca."' ORDER BY Descrizione" );
    foreach ( $myrows as $print ){
        $contatore++;
        echo "<a href='https://www.larcservizi.it/' target='_blank'><i class='fas fa-angle-right'></i>  ".$print->Descrizione."</a>";
        echo "<br>";
    }
}
add_shortcode('sc_stampa_prestazioni', 'stampa_prestazioni');

function stampa_prestazioni_con_parametro($slugBranca){
    echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">';
    global $wpdb;    
    extract(shortcode_atts(array(
        'branca' => 'branca'
    ), $slugBranca));	
	$slug_branca =  $slugBranca['branca'];    
	$brancaRows = $wpdb->get_results( "SELECT * FROM A6vnDNw9U_mp_specialita WHERE A6vnDNw9U_mp_specialita.Slug='".$slug_branca."'");
	foreach ( $brancaRows as $branca ){
        $id_branca = $branca->PKSpecialita;         
    }
	echo "<h4>ELENCO PRESTAZIONI:</h4><br>";
    $myrows = $wpdb->get_results( "SELECT * FROM A6vnDNw9U_mp_prestazioni WHERE PKSpecialita=".$id_branca." ORDER BY Descrizione" );
    foreach ( $myrows as $print ){        
        echo "<a href='https://www.larcservizi.it/' target='_blank'><i class='fas fa-angle-right'></i>  ".$print->Descrizione."</a>";
        echo "<br>";
    }
}
add_shortcode('sc_stampa_prestazioni_con_parametro', 'stampa_prestazioni_con_parametro');

?>