<?php
header('Content-Type: application/json; charset=utf-8');
list($songId, $mode) = explode('__', $_POST['play_token']);
list($playerId) = explode('_', $_POST['access_token']);
$nowScore = (int)$_POST['score'];
$isNewHighScore = 'false';
$lastScore = 0;

$handle = new SQLite3('voez.db');

$query = $handle->query("SELECT score FROM Score WHERE playerId = '".$playerId."' AND songId = '".$songId."' AND mode = '".$mode."'");
if (($queryData = $query->fetchArray(SQLITE3_NUM))) {
    list($lastScore) = $queryData;
    $handle->query("UPDATE Score SET score = ".$nowScore." WHERE playerId = '".$playerId."' AND songId = '".$songId."' AND mode = '".$mode."'");
} else {
    $handle->query("INSERT INTO Score (playerId, songId, mode, score) VALUES ('".$playerId."', '".$songId."', '".$mode."', ".$nowScore.")");
}
$handle->close();

if ($nowScore > $lastScore) {
    $isNewHighScore = 'true';
}
?>{"revision_id": "6p7FjyD1ZOG_SvnzXnd1rQ", "song_id": "<?php echo $songId; ?>", "mode": "<?php echo $songMode; ?>", "account_internal_id": "ly_2407001", "score": <?php echo $nowScore.'.0'; ?>, "rank": 3, "note_count": {"total": <?php echo $_POST['note_count_total']; ?>, "max_perfect": <?php echo $_POST['note_count_max_perfect']; ?>, "perfect": <?php echo $_POST['note_count_perfect']; ?>, "good": <?php echo $_POST['note_count_good']; ?>, "miss": <?php echo $_POST['note_count_miss']; ?>, "max_combo": <?php echo $_POST['note_count_max_combo']; ?>}, "timestamp": {"$date": 1456558537000}, "is_valid": true, "id": "DNZTGkotvtf1kr2mHkAbHQ", "is_new_high_score": <?php echo $isNewHighScore; ?>}