<?php
$to = "nicolo@kaffeina.it";
$subject = "Invio sync";
$txt = "Tabelle aggiornate da LARC, pronte per la sincronizzazione.";
$headers = "From: donotreply@larc.it" . "\r\n" .
"CC: alessandro@kaffeina.it";

mail($to,$subject,$txt,$headers);
echo "Processo di sincronizzazione avviato. In attesa di conferma dall'amministratore di sistema.";
?>