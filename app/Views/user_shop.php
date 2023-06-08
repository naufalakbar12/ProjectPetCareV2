<?= $this->extend('base_user') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-4">Shop</h5>
            <div class="pb-5">
                <a class="btn btn-info btn-sm" href="/user/shop?q=all">LIHAT SEMUA</a>
                <a class="btn btn-info btn-sm" href="/user/shop?q=food">MAKANAN HEWAN</a>
                <a class="btn btn-info btn-sm" href="/user/shop?q=tool">PERALATAN HEWAN</a>
            </div>
            <div class="row">

                <?php foreach ($data as $item) : ?>
                    <div class="col-md-3">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="/photos/<?= $item['image'] ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?= $item['name'] ?></h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url('user/add_to_cart') ?>?id=<?= $item['id'] ?>&name=<?= $item['name'] ?>&harga=<?= $item['harga'] ?>&quantity=1" class="btn btn-sm btn-outline-success">Add to Cart</a>
                                        <!-- <a href="#" class="btn btn-sm btn-outline-success">Add To Cart</a> -->
                                    </div>
                                    <small class="text-muted">Rp <?= $item['harga'] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>