 <?
//script by gabriele97 http://gabriele97.no-ip.rog http://gabriele97.wordpress.com
// variabile per numero di record in ogni pagina
$x_pag = 2;
//pagina scelta da GET
$pag = $_GET['pag'];
// Controllo se $pag è valorizzato.....in caso contrario gli assegno valore 1
if (!$pag) $pag = 1; 
// Mi connetto al database
$conn = mysql_connect("localhost","root","lagreca7991");
mysql_select_db("cdcol", $conn);
// Uso mysql_num_rows per contare le righe presenti all'interno della tabella dell'utente
$all_rows = mysql_num_rows(mysql_query("SELECT id FROM cds"));
// Tramite una semplice operazione matematica definisco il numero totale di pagine
$all_pages = ceil($all_rows / $x_pag);
// Calcolo da quale record iniziare
$first = ($pag - 1) * $x_pag;
// Recupero i record per la pagina corrente...
// utilizzando LIMIT per partire da $first e contare fino a $x_pag
$rs = mysql_query("SELECT * FROM cds LIMIT $first, $x_pag");
$nr = mysql_num_rows($rs);
if ($nr != 0){
  for($x = 0; $x < $nr; $x++){
    $row = mysql_fetch_assoc($rs);
    echo "<table><tr>";
    echo "<td>" . $row['titel'] . "</td>";
    echo "</tr></table>";
  }
}else{
  echo "Nessun record trovato!";
}
mysql_close($conn);
echo "Pagina: ";
for ($ind = 1; $ind <= $all_pages; $ind++) {
if(($ind==$all_pages)==FALSE){
echo "<a href='1.php?pag=$ind'>".$ind."</a>-";
}else{
echo "<a href='1.php?pag=$all_pages'>".$all_pages."</a>";
}
}
?> 
