<?php
$product = $pdo->query("SELECT * FROM product")->fetchAll(PDO::FETCH_ASSOC);
$customer = $pdo->query("SELECT * FROM customer")->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["checkout"])) {
    $order_number = "PO0" . rand(11, 99);
    $qty = $_POST["qty"];
    $customer_id = $_POST["customer_id"];
    $product_id = $_POST["product_id"];

    $query = $pdo->query("SELECT sell_price FROM product WHERE id = $product_id");
    $product_price = $query->fetch(PDO::FETCH_ASSOC);
    $total_price = $qty * $product_price["sell_price"];

    $insert = $pdo->prepare("INSERT INTO `order` (order_number, date, qty, total_price, customer_id, product_id) VALUES ('$order_number', NOW(), '$qty', '$total_price', '$customer_id', '$product_id')")->execute();

    header("location:dashboard.php?url=order/list");
}

?>

<div class="row-cols-md-2">
    <div class="container mb-5">
        <div class="card">
            <div class="container-fluid px-5 py-2">
                <h2 class="py-4 text-center">Add Order</h2>
                <form method="post" class="checkout-form">
                    <div class="row gy-4">

                        <div class="col-md-12">
                            <label for="customer" class="form-label">Customer</label>
                            <select class="form-select" name="customer_id" id="customer" required>
                                <option value="">Select Customer</option>
                                <?php foreach ($customer as $c) : ?>
                                    <option value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="product" class="form-label">Product</label>
                            <select class="form-select" name="product_id" id="product" required>
                                <option value="">Select Product</option>
                                <?php foreach ($product as $p) : ?>
                                    <option value="<?= $p['id']; ?>"><?= $p['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-12 ">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="qty" id="quantity" placeholder="Quantity" min="0" required>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" name="checkout" class="btn btn-primary btn-md">Checkout</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>