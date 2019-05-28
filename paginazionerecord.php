 <?php

// connessione al database
mysql_connect(“host”, “user”, “password”) or die(“Connessione fallita !”);

// selezione del DB
mysql_select_db(“nome_db”) or die(“Selezione del DB fallita !”);

// esecuzione prima query
$count = mysql_query(“SELECT COUNT(id) FROM nome_tabella”);
$res_count = mysql_fetch_row($count);

// numero totale di records
$tot_records = $res_count[0];

// risultati per pagina(secondo parametro di LIMIT)
$per_page = 10;

// numero totale di pagine
$tot_pages = ceil($tot_records / $per_page);

// pagina corrente
$current_page = (!$_GET[‘page’]) ? 1 : (int)$_GET[‘page’];

// primo parametro di LIMIT
$primo = ($current_page – 1) * $per_page;

echo “<div align=”center”>n<table>n”;

// esecuzione seconda query con LIMIT
$query_limit = mysql_query(“SELECT id, nome FROM nome_tabella LIMIT $primo, $per_page”);
while($results = mysql_fetch_array($query_limit)) {
echo ” <tr>n <td>”;
echo “<a href=”page.php?id=” . $results[‘id’] . “”>” . $results[‘nome’] . “</a>
“;
echo “</td>n </tr>n”;
}

// includiamo uno dei files contenenti la paginazione, commentate l’altro ovviamente
include(“paginazione_1.php”);
//include(“paginazione_2.php”);

// in questa cella inseriamo la paginazione
echo ” <tr>n <td height=”50″ valign=”bottom” align=”center”>$paginazione</td>n”;

echo ” </tr>n</table>n</div>”;

mysql_close();

?> 
