<?php

// connessione al database
mysql_connect("localhost", "root", "") or die("Connessione fallita !");

// selezione del DB
mysql_select_db("progetto") or die("Selezione del DB fallita !");

// esecuzione prima query
$count = mysql_query("SELECT COUNT(*) FROM personale");
$res_count = mysql_fetch_row($count);

// numero totale di records
$tot_records = $res_count[0];

// risultati per pagina(secondo parametro di LIMIT)
$per_page = 1;

// numero totale di pagine
$tot_pages = ceil($tot_records / $per_page);

// pagina corrente
$current_page = (!$HTTP_GET_VARS['page']) ? 1 : (int)$HTTP_GET_VARS['page'];

// primo parametro di LIMIT
$primo = ($current_page - 1) * $per_page;

echo "<div align=\"center\">\n<table>\n";

// esecuzione seconda query con LIMIT
$query_limit = mysql_query("SELECT id_per, nome FROM personale LIMIT $primo, $per_page");
while($results = mysql_fetch_array($query_limit)) {
echo " <tr>\n <td>";
echo "<a href=\"dettagli_personale.php?id_per=" . $results['id_per'] . "\">" . $results['nome'] . "</a>
";
echo "</td>\n </tr>\n";
}

// La paginazione
$paginazione = "Totale risultati: " . $tot_pages . "
<br>[";
for($i = 1; $i <= $tot_pages; $i++) {
if($i == $current_page) {
$paginazione .= $i . " ";
} else {
$paginazione .= "<a href=\"?page=$i\" title=\"Vai alla pagina $i\">$i</a> ";
}
}
$paginazione .= "]";


// in questa cella inseriamo la paginazione
echo " <tr>\n <td height=\"50\" valign=\"bottom\" align=\"center\">$paginazione</td>\n";

echo " </tr>\n</table>\n</div>";

mysql_close();

?> 
