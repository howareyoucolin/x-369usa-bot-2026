<?php
$db->query("
    CREATE TABLE login_tokens (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        token VARCHAR(20) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8
");
