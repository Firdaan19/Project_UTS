<?php

include_once "../../database/db.php";

$pdo->query("DELETE FROM product WHERE id = '$_GET[id]'");

header("Location: dashboard.php?url=product/list");
