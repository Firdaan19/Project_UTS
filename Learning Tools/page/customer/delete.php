<?php

include_once "../../database/db.php";

$pdo->query("DELETE FROM customer WHERE id = '$_GET[id]'");

header("Location: dashboard.php?url=customer/list");
