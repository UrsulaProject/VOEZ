<?php
header('Content-Type: application/json; charset=utf-8');
list($playerId) = explode('_', $_GET['access_token']);
$lastScore = -1;

$handle = new SQLite3('../../voez.db');

$query = $handle->query("SELECT score FROM Score WHERE playerId = '".$playerId."' AND songId = 'NAx6s6KBoXlLb7XQ7PES4g' AND mode = 'hard'");
if (($queryData = $query->fetchArray(SQLITE3_NUM))) {
    list($lastScore) = $queryData;
}
$handle->close();

?>{"score": <?php echo $lastScore; ?>.0, "rank": -1}