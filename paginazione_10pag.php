// esecuzione prima query 
    $count = mysql_query('select eccc'); 
     
    $res_count = mysql_fetch_row($count); 
     
    // numero totale di records 
    $tot_records = $res_count[0]; 

    // risultati per pagina(secondo parametro di LIMIT) 
    $per_page = 20; 

    // numero totale di pagine 
    $tot_pages = ceil($tot_records / $per_page); 

    // pagina corrente 
    $current_page =(!isset($_GET['page'])) ? $pag = 1 : $pag = $_GET['page']; 

    // primo parametro di LIMIT 
    $primo = ($current_page - 1) * $per_page; 

$query_limit ='SELECT * FROM tab LIMIT '.$primo.','.$per_page; 
eseguo query stampo i ris... 

// in questa cella inseriamo la paginazione 
    $paginazione = "Pagine totali: " . $tot_pages . " 
    ["; 
    for($i = 1; $i <= $tot_pages; $i++) { 
        if($i == $current_page) {$paginazione .= $i . " ";} 
        else { 
            $paginazione .= "<a href=\"?page=$i&a=c&regione=$regione&tipo=$tipo\" >$i</a> "; 
        } 
    } 
    $paginazione .= "]"; 
    $output.=' <tr> <td colspan="3" height="50" valign="bottom" align="center" class="testo">'.$paginazione.'</td></tr>'; 
    } 
    else 
    { 
    $output.='<tr><td colspan="4" align="center"><b>La ricerca non ha portato risultati, prova a cambiare i criteri di ricerca</b></td></tr>'; 
    }  
