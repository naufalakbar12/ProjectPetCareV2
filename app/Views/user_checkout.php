<?= $this->extend('base_user') ?>
<?= $this->section('content') ?>
<div class="container py-5">
    <h2 class="pb-4">Ringkasan Pembayaran</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $cart) : ?>
                <tr>
                    <td><?= $cart['name'] ?></td>
                    <td><?= $cart['harga'] ?></td>
                    <td><?= $cart['quantity'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-right">Total</td>
                <td><?= $total ?></td>
            </tr>
        </tfoot>
    </table>

    <div class="card mb-4 box-shadow">
        <div class="card-body">
            <h3 class="card-title">Cara Pembayaran</h3>
            <div>
                <h5>
                    Silahkan lakukan Pembayaran dengan transfer ke nomor rekening tersebut atau pembayaran langsung ke toko
                </h5>
                <h6>BANK BCA - O,Petto</h6>
                <h6>3410934102</h6>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>