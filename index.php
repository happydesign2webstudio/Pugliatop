<?php
//require delle due classi
require("class.paginazione.php");
require("class.db.php");

$link="";
//imposto a 10 il numero degli articoli da visualizzare per ogni pagina
$max_pagina=10;
//creo l'oggetto Db  passo i parametri del db e apro la connessione
$db=new Db("localhost","root","","wordpress");
$db->openConnectionDb();
//oggetto Paginazione
$pag=new Paginazione($max_pagina,'index.php?');
//ottengo il numero degli articoli presenti nella tabella
$num_rows=$db->numRows("SELECT * FROM articoli");
//il numero delle pagine risultanti
$num_pagine=$pag->getNumPagine($num_rows);
//il valore da passare alla query per avere i risultati per una pagina
$start=$pag->getStart();
$res_query=$db->execQuery("SELECT * from articoli LIMIT $start,$max_pagina");
$record=$db->getRows($res_query);
//visualizzo gli articoli
foreach($record as $row)
{
	echo "<h2>".$row['titolo']."</h2>";
	echo "<p>".$row['articolo']."</p><br />";
}
//in basso visulizzo il link per la paginazione
$link=$pag->getLink($num_pagine);
echo $link;
//alla fine chiudo la connessione al db
$db->closeConnectionDb();
?>