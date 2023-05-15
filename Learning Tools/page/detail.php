<?php require '../templates/header.php' ?>

<?php
$id = $_GET["id"];
$product = $pdo->query("SELECT product.*, product_type.name as product_type FROM product INNER JOIN product_type ON product.product_type_id = product_type.id WHERE product.id = $id")->fetch(PDO::FETCH_ASSOC);
?>

<section id="product" class="mb-5">
    <div class="container py-5 mx-auto">
        <h1 class="text-center fw-bold mb-5">View Products</h1>
        <div class="d-flex align-items-strecth gap-3 flex-wrap justify-content-center">
            <div class="animate__animated animate bounce card " style="width: 18rem;">
                <div class="container mt-3">
                    <img src="https://i.ibb.co/gRpP2Lm/icons8-online-128.png" class="card-img-top " alt="...">
                </div>
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="mb-5">
                        <h5 class="card-title ms-1"><?= $product["name"]; ?></h5>
                        <p class="card-text mb-0 ms-1 fw-semibold">Sell Price : Rp. <?= $product["sell_price"]; ?></p>
                        <p class="card-text mb-0 ms-1 fw-semibold">Stock : <?= $product["stock"]; ?></p>
                        <p class="card-text ms-1 fw-semibold">Category : <?= $product["product_type"]; ?></p>
                    </div>
                    <a class="btn btn-product btn-primary" href="index.php">Back</a>
                </div>
            </div>
        </div>
    </div>
</section>



<?php require '../templates/footer.php' ?>