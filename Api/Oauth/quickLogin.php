<?php
header('Content-Type: application/json; charset=utf-8');
?>{"data":{"code":"<?php echo substr($_POST['username'].'_qwertyuiopasdfghjklzxcvbnmqwertyuiopasdfgh', 0, 43); ?>"},"errno":200,"errinfo":""}