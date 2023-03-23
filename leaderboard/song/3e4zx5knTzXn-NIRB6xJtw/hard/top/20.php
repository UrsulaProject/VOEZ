<?php
header('Content-Type: application/json; charset=utf-8');
$handle = new SQLite3('../../../voez.db');
$query = $handle->query("SELECT playerId, score FROM Score WHERE songId = '3e4zx5knTzXn-NIRB6xJtw' AND mode = 'hard' LIMIT 20");
$result = array();
while(($queryData = $query->fetchArray(SQLITE3_NUM))) {
    list($playerId, $lastScore) = $queryData;
    $result[] = array(
        "icon_id" => null, 
        "score" => $lastScore.'.0XXX',
        "id" => 'ly_1010101'.count($result),
        "name" => $playerId
    );
}
$handle->close();
echo str_replace('score":"', 'score":', str_replace('0XXX"', '0', json_encode($result)));