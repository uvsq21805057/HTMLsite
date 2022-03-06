<?php

/*Conexion a la base de datos*/

$user = "theophile";
$password = "postgres";
$dbname = "lessurligneurs";
$port = "5432";
$host = "localhost";

$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

$dbconn = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());


 
// Exécution de la requête SQL
$query = 'SELECT * FROM t_article';
$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());

// Affichage des résultats en HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Libère le résultat
pg_free_result($result);

// Ferme la connexion
pg_close($dbconn);
?>
