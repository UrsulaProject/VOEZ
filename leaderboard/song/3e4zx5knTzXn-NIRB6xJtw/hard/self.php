<?php
header('Content-Type: application/json; charset=utf-8');
list($playerId) = explode('_', $_GET['access_token']);
$lastScore = -1;

$handle = new SQLite3('../../voez.db');

$query = $handle->query("SELECT score FROM Score WHERE playerId = '".$playerId."' AND songId = '3e4zx5knTzXn-NIRB6xJtw' AND mode = 'hard'");
if (($queryData = $query->fetchArray(SQLITE3_NUM))) {
    list($lastScore) = $queryData;
}
$handle->close();

?>{"score": <?php echo $lastScore; ?>.0, "rank": -1}