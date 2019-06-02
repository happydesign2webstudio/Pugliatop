<?php
//includiamo il file della classe
@require("paginazione.php");

//connettiamoci a MySQL e selezioniamo il database
class MySQL
{ 
  function MySQL() 
  { 
    $this->host_name = "localhost";
    $this->user_name = "username";
    $this->password = "password";
    $this->data_name = "dbseodir";
    $this->link = @mysql_connect($this->host_name, $this->user_name, $this->password) or die (mysq_error()); 
    @mysql_select_db($this->data_name) or die (mysq_error()); 
  } 
} 

$data = new MySQL();
 
// istanziamo la classe per l'impaginazione
$p = new Paging;

// numero massimo di risultati per pagina
$max = 10;

// identifichiamo la pagina da cui iniziare la numerazione
$inizio = $p->paginaIniziale($max);

// contiamo i records nel database
$query_count = @mysql_query("SELECT * FROM sitezzz") or die (mysql_error());
$count = @mysql_num_rows($query_count) or die (mysql_error());

// troviamo il numero delle pagine che dovrà essere contato
$pagine = $p->contaPagine($count, $max);

// limitiamo la SELECT al numero di risultati per pagina
$query = @mysql_query("SELECT * FROM sitezzz LIMIT ".$inizio.",".$max) or die (mysql_error());

//mostriamo le pagine
$lista = $p->listaPagine($_GET['p'], $pagine);
echo $lista . "<br>";

//mostriamo il navigatore Precedente/Successiva
$navigatore = $p->precedenteSuccessiva($_GET['p'], $pagine);
echo $navigatore;
?>
