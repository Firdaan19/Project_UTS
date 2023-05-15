<?php
$query = $pdo->query("SELECT * FROM `order` WHERE id = '$_GET[id]'");
$order = $query->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['edit'])) {
    $order_number = $_POST['order_number'];
    $qty = $_POST['qty'];
    $total_price = $_POST['total_price'];

    $insert = $pdo->prepare("UPDATE `order` SET order_number='$order_number', qty='$qty', total_price='$total_price' WHERE id = '$_POST[id]'")->execute();

    header("Location: dashboard.php?url=order/list");
}

?>

<div class="row-cols-md-2">
    <div class="container mb-5">
        <div class="card">
            <div class="container-fluid px-5 py-2">
                <h2 class="py-4 text-center">Edit Order</h2>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $order['id']; ?>">
                    <div class="mb-3">
                        <label for="order_number" class="form-label">Order Number</label>
                        <input type="text" class="form-control" id="order_number" name="order_number" value="<?= $order['order_number']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="qty" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="qty" name="qty" value="<?= $order['qty']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_price" class="form-label">Total Price</label>
                        <input type="number" class="form-control" id="total_price" name="total_price" value="<?= $order['total_price']; ?>" required>
                    </div>
                    <div class="modal-footer my-4">
                        <a href="order.php?title=Order" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-dark ms-2" name="edit">Edit Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>