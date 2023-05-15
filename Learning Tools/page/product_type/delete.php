<?php

include_once "../../database/db.php";

$pdo->query("DELETE FROM product_type WHERE id = '$_GET[id]'");

header("Location: dashboard.php?url=product_type/list");
