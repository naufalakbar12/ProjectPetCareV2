<?= $this->extend('base_user') ?>
<?= $this->section('content') ?>
<div class="container py-5">

    <h2>Shopping History</h2>
    <hr>
    <div class="mb-3">
        <a class="btn btn-info btn-sm" href="/user/history?h=order">Order</a>
        <a class="btn btn-info btn-sm" href="/user/history?h=perawatan">Perawatan</a>
    </div>
    <?php if ($keterangan == 'order') : ?>
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id Order</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)) : ?>
                    <?php $i = 1;
                    foreach ($data as $item) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $item['id_order'] ?></td>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['quantity'] ?></td>
                            <td>Rp. <?= $item['harga'] ?></td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">Your History is empty.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    <?php else :  ?>
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Schedule</th>
                    <th scope="col">Treatment</th>
                    <th scope="col">Animal</th>
                    <th scope="col">Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)) : ?>
                    <?php $i = 1;
                    foreach ($data as $item) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $item['schedule'] ?></td>
                            <td><?= $item['treatment'] ?></td>
                            <td><?= $item['hewan'] ?></td>
                            <td><?= $item['phone'] ?></td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">Your History is empty.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    <?php endif;  ?>
</div>
<?= $this->endSection() ?>