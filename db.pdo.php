<?php

$pdo = new \PDO('mysql:host=' . db_host . ';dbname=' . db_database . '', db_user, db_pass );
// To avoid having to specify the fetch mode every time
$pdo->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
// To make PDO throw exceptions and showing SQL errors
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
