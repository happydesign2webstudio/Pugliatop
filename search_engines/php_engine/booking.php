<?php

$nome=$_POST['nome'];

$email=$_POST['email'];

$numero=$_POST['numero'];

$residenza=$_POST['residenza'];

$citta=$_POST['citta'];

$giorni=$_POST['giorni'];

$persone=$_POST['persone'];

$idromassaggio=$_POST['idromassaggio'];

$spa=$_POST['spa'];

$cfitness=$_POST['cfitness'];

$animali=$_POST['animali'];

$pagamento=$_POST['pagamento'];

$comment=$_POST['comment'];

echo"<h1>Ordinazione</h1><br><hr><br>";

if($citta=="New York")

$a=800;

else if($citta=="Londra")

$a=700;

else if($citta=="Miami")

$a=900;

else if($citta=="Roma")

$a=500;

else if($citta=="Parigi")

$a=25;

if($idromassaggio=="idromassaggio")

$b=5;

else $b=0;

if($spa=="spa")

$c=10;

else $c=0;

if($cfitness=="cfitness")

$d=10;

else $d=0;

if($animali=="animali")

$e=5;

else $e=0;

$ris=($a+$b+$c+$d+$e)*$giorni;

echo"Gentile Signore/a $nome ($email / $numero / $residenza) ha scelto di prenotare:<br>";

echo"$citta.<br>";

echo"Per $persone persone, numero di giorni: $giorni.<br>";

echo"Opzione aggiuntive:<br>";

echo" - $idromassaggio<br>";

echo" - $spa<br>";

echo" - $cfitness<br>";

echo" - $animali<br>";

echo"La sua spesa totale e' $ris <br>";

echo"Pagamento: $pagamento<br>";

echo"Ulteriori richieste: $comment <br>";

echo"Grazie per aver prenotato la tua vacanza con Il CORSO SIA BASSI LODI travels!.<br>";

?>
