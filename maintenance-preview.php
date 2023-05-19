<?php

//  ATTENTION!
//
//  DO NOT MODIFY THIS FILE BECAUSE IT WAS GENERATED AUTOMATICALLY,
//  SO ALL YOUR CHANGES WILL BE LOST THE NEXT TIME THE FILE IS GENERATED.
//  IF YOU REQUIRE TO APPLY CUSTOM MODIFICATIONS, PERFORM THEM IN THE FOLLOWING FILE:
//  /var/www/vhosts/larc.it/httpdocs/wp-content/maintenance/template.phtml


$protocol = $_SERVER['SERVER_PROTOCOL'];
if ('HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol) {
    $protocol = 'HTTP/1.0';
}

header("{$protocol} 503 Service Unavailable", true, 503);
header('Content-Type: text/html; charset=utf-8');
header('Retry-After: 600');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" href="https://larc.it/wp-content/uploads/2021/07/cropped-BOLLINO-32x32.png">
    <link rel="stylesheet" href="https://larc.it/wp-content/maintenance/assets/styles.css">
    <script src="https://larc.it/wp-content/maintenance/assets/timer.js"></script>
    <title>Manutenzione pianificata</title>
</head>

<body>

    <style>
  body { text-align: center; padding: 150px; }
  h1 { font-size: 50px; }
  body { font: 20px Helvetica, sans-serif; color: #333; }
  article { display: block; text-align: left; width: 650px; margin: 0 auto; }
  a { color: #dc8100; text-decoration: none; }
  a:hover { color: #333; text-decoration: none; }
</style>

<article>
    <h1>Sito in manutenzione!</h1>
    <div>
        <p>
			Ci scusiamo per il disagio ma al momento stiamo effettuando dei lavori di manutenzione.
			<br><br><br>
			Le prenotazioni restano disponibili sul portale <a href="https://www.larcservizi.it" target="_blank" title="Vai a Larc Servizi">larcservizi.it</a>
			<br>
			<br>
			Se devi scaricare un referto, puoi farlo su <a href="https://www.larcreferti.it" target="_blank" title="Vai a Larc Referti">larcreferti.it</a>
			<br><br><br>
			Se ne hai bisogno puoi sempre contattarci telefonicamente al numero <a href="tel:+390112484067">011.2484067</a> e <a href="tel:+390110341777">011.0341777</a>, altrimenti torneremo presto online!
        </p>
    </div>
</article>
</body>
</html>
