<!DOCTYPE html>
    <head>
        <title>PHP Pagination</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
    <?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
        <tr>
                <td><?php echo $results->data[$i]['Comune']; ?></td>
                <td><?php echo $results->data[$i]['Tipologia']; ?></td>
                <td><?php echo $results->data[$i]['Categoria']; ?></td>
                <td><?php echo $results->data[$i]['Denominazione']; ?></td>
                <td><?php echo $results->data[$i]['Prezzo a/s']; ?></td>
                <td><?php echo $results->data[$i]['Prezzo b/s']; ?></td>
                <td><?php echo $results->data[$i]['id']; ?></td>
                <td><?php echo $results->data[$i]['Longitudine']; ?></td>
                <td><?php echo $results->data[$i]['Latitudine']; ?></td>
                <td><?php echo $results->data[$i]['AccessibilitÃ_Struttura']; ?></td>
                <td><?php echo $results->data[$i]['RicettivitÃ_Animali']; ?></td>
                <td><?php echo $results->data[$i]['Link_SolidRes']; ?></td>
        </tr>
<?php endfor; ?>
require_once 'Paginator.class.php';
 
    $conn       = new mysqli( '127.0.0.1', 'root', 'root', 'world' );
 
    $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
    $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
    $query      = "SELECT Comune, Tipologia, Categoria, 'Nome', 'Prezzo a/s', 'Prezzo b/s, 'id', 'Longitudine', 'Latitudine', 'Accessibilità_Struttura', 'Ricettività_Animali', 'Link_SolidRes'FROM josdp_strutture WHERE City.CountryCode = Country.Code";
 
    $Paginator  = new Paginator( $conn, $query );
 
    $results    = $Paginator->getData( $page, $limit );
        <div class="container">
                <div class="col-md-10 col-md-offset-1">
                <h1>PHP Pagination</h1>
                <table class="table table-striped table-condensed table-bordered table-rounded">
                        <thead>
                                <tr>
        <th>Comune</th>
        <th>Tipologia</th>
        <th>Categoria</th>
        <th>Denominazione</th>
        <th>Prezzo a/s</th>
        <th>Prezzo b/s</th>
        <th>ID_Struttura</th>
         <th>Longitudine</th>
        <th>Latitudine</th>
        <th>AccessibilitÃ  Struttura</th>
        <th>RicettivitÃ  Animali</th>
        <th>Link SolidRes</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                </table>
                </div>
        </div>
        </body>
</html>
