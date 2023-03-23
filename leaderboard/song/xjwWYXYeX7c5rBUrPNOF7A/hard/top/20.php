<?php
header('Content-Type: application/json; charset=utf-8');
$handle = new SQLite3('../../../voez.db');
$query = $handle->query("SELECT playerId, score FROM Score WHERE songId = 'xjwWYXYeX7c5rBUrPNOF7A' AND mode = 'hard' LIMIT 20");
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