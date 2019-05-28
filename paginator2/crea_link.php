<?php
function crea_url($url_base, $pagina) {
    if(strpos($url_base,'?') === false) {
        return $url_base . '?pag=' . $pagina;
    } else {
        return $url_base . '&amp;pag=' . $pagina;
    }
}

function crea_link($url_base, $pagina_corrente, $numero_pagina) {
    if($pagina_corrente == $numero_pagina) {
        return "[$numero_pagina]";
    } else {
        return '<a href="' . crea_url($url_base, $numero_pagina) . '">' . $numero_pagina . '</a>';
    }
}

// funzione che crea i link alle pagine dei risultati
function paginazione($tot_pagine, $url_base, $pagina_corrente, $pagine_vicine) {
    $link_paginazione = "Pagine: ";

    // link alla pagina precedente
    if($pagina_corrente != 1) {
        $link_paginazione .= '<a href="' . crea_url($url_base, $pagina_corrente - 1) . '">&laquo;</a> ';
    }

    // mostriamo sempre il link alla prima pagina
    $link_paginazione .= crea_link($url_base, $pagina_corrente, 1);

    // se il prossimo link non è alla seconda pagina aggiungo dei puntini ...
    // oppure la sola pagina mancante
    if($pagina_corrente - $pagine_vicine > 2) {
        if($pagina_corrente - $pagine_vicine == 3) {
            $link_paginazione .= " " . crea_link($url_base, $pagina_corrente, 2);
        } else {
            $link_paginazione .= " ... ";
        }
    }

    // creo i link alla pagina corrente ed a quelle ad essa vicine
    for($i = $pagina_corrente - $pagine_vicine; $i <= $pagina_corrente + $pagine_vicine; $i++) {
         // se tra quelle vicine c'è la prima pagina (già riportata)
        if($i < 2) continue;

         // se tra quelle vicine c'è l'ultima pagina (che mostrerò con le prossime istruzioni)
        if($i > $tot_pagine - 1) continue;

        $link_paginazione .= " " . crea_link($url_base, $pagina_corrente, $i);
    }

    // se il precedente link non era alla penultima pagina aggiungo dei puntini ...
    // oppure la sola pagina mancante
    if($pagina_corrente + $pagine_vicine < $tot_pagine - 1) {
        if($pagina_corrente + $pagine_vicine == $tot_pagine - 2) {
            $link_paginazione .= " " . crea_link($url_base, $pagina_corrente, $tot_pagine - 1) . " ";
        } else {
            $link_paginazione .= " ... ";
        }
    }

    // mostriamo il link all'ultima pagina se questa non coincide con la prima
    if($tot_pagine != 1) {
        $link_paginazione .= " " . crea_link($url_base, $pagina_corrente, $tot_pagine);
    }

    // link alla pagina successiva
    if($pagina_corrente != $tot_pagine) {
        $link_paginazione .= ' <a href="' . crea_url($url_base, $pagina_corrente + 1) . '">&raquo;</a>';
    }

    return $link_paginazione;
}
?>
