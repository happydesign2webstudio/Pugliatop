<?php
include 'paginazione.php';

$DB_host     = 'localhost';
$DB_user     = 'root';
$DB_password = 'kumakassiokuno';
$DB_name     = 'jodsp_strutture_short';

$righe_per_pagina = 1;
$url_base = "index.php";
$pagine_vicine = 1;

// ----------------------------------------------------------------
//         C O N N E S S I O N E   A L   D A T A B A S E

$link = mysql_connect($DB_host, $DB_user, $DB_password);
if (!$link) {
    die ('Non riesco a connettermi: ' . mysql_error());
}

$db_selected = mysql_select_db($DB_name, $link);
if (!$db_selected) {
    die ("Errore nella selezione del database: " . mysql_error());
}

// ----------------------------------------------------------------
//    C A L C O L O   D E L   N U M E R O   D I   P A G I N E

// ricavo il numero totale di record
$query = "SELECT COUNT(*) FROM Comune";
$result = mysql_query($query);
// record complessivi
$tot_righe = mysql_result($result,0);
// totale pagine
$tot_pagine = ceil($tot_righe / $righe_per_pagina);

// ----------------------------------------------------------------
//                 P A G I N A   C O R R E N T E

$pagina_corrente = isset($_GET['pag']) ? (int)$_GET['pag'] : 1;

// se la pagina corrente è minore di 1
if($pagina_corrente < 1)  {
    header('location: ' . $url_base);
    exit();
}

// se la pagina corrente è maggiore dell'ultima pagina
if($pagina_corrente > $tot_pagine) {
    header('location: ' . crea_url($url_base, $tot_pagine));
    exit();
}

// ----------------------------------------------------------------
//            E S T R A Z I O N E   D E I   R E C O R D

// calcolo la prima riga da estrarre con la query
$prima_riga = ($pagina_corrente - 1) * $righe_per_pagina;

$query = "SELECT *
          FROM jodsp_strutture_short
          ORDER BY comune, cod_istat
          LIMIT $prima_riga, $righe_per_pagina";

$result = mysql_query($query);
if (!$result) {
    die("Errore nella query $query: " . mysql_error());
}

$elenco_comuni = array();
while ($row = mysql_fetch_assoc($result)) {
    $elenco_comuni[] = $row;
}

// creazione dei link di paginazione
$link_paginazione = paginazione($tot_pagine, $url_base, $pagina_corrente, $pagine_vicine);

// carico il template HTML
include 'index.html';
?>
