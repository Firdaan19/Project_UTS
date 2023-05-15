<?php

include_once "../../database/db.php";

$pdo->query("DELETE FROM `order` WHERE id = '$_GET[id]'");

header("Location: dashboard.php?url=order/list");
