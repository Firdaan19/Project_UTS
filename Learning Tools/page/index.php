<?php require '../templates/header.php'; ?>

<?php $products = $pdo->query('SELECT * FROM product')->fetchAll(PDO::FETCH_ASSOC); ?>

<section class="p-5 img-fluid" style="background-image: url('../assets/img/hero.jpg'); background-size: cover; background-position: center center;">
    <div class="container pt-5">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-11 col-lg-9 col-xl-7 col-xxl-6 text-center text-white">
                <h1 class="display-3 fw-bold mb-3">Learning Tools</h1>
                <p class="lead mb-5">Boost your school's digitalization. Transform the way you teach. Try Constructor software. Transform your teaching with technology and become a top school with Constructor.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center pb-5">
                    <a class="btn btn-light btn-lg px-4 gap-3" href="#product">View Products</a>
                    <a class="btn btn-outline-light btn-lg px-4" href="login.php">Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="product">
    <div class="container py-5 mx-auto">
        <h1 class="text-center fw-bold mb-5">View Products</h1>
        <div class="d-flex align-items-strecth gap-3 flex-wrap justify-content-center">
            <?php foreach ($products as $p) : ?>
                <div class="animate__animated animate bounce card " style="width: 18rem;">
                    <div class="container mt-3">
                        <img src="https://i.ibb.co/gRpP2Lm/icons8-online-128.png" class="card-img-top " alt="...">
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="">
                            <h5 class="card-title ms-1"><?= $p["name"]; ?></h5>
                            <p class="card-text mb-5 ms-1 fw-semibold">Rp. <?= $p["sell_price"]; ?></p>
                        </div>
                        <a class="btn btn-product btn-primary" href="detail.php?id=<?= $p["id"]; ?>">Detail</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<?php require '../templates/footer.php'; ?>