<?php
header('Content-Type: application/json; charset=utf-8');
list($playerId) = explode('_', $_GET['access_token']);
$lastScore = -1;

$handle = new SQLite3('../../voez.db');

$query = $handle->query("SELECT score FROM Score WHERE playerId = '".$playerId."' AND songId = 'A-NvjTi9T-gwjMhI_x2JPA' AND mode = 'easy'");
if (($queryData = $query->fetchArray(SQLITE3_NUM))) {
    list($lastScore) = $queryData;
}
$handle->close();

?>{"score": <?php echo $lastScore; ?>.0, "rank": -1}