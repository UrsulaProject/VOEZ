<?php
header('Content-Type: application/json; charset=utf-8');
list($name) = explode('_', $_GET['access_token']);
?>{"user_name": "<?php echo $name; ?>", "last_login_timestamp": 1456481614.0, "is_new_user": true, "id": "ly_1010101", "level": 1}