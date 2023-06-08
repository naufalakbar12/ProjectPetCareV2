<?= $this->extend('base') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <h5 class="mb-4">Jadwal Perawatan</h5>
            </div>

            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th scope="col ">Nama Customer</th>
                        <th scope="col ">Hewan</th>
                        <th scope="col ">Perawatan</th>
                        <th scope="col ">Jadwal</th>
                        <th scope="col ">Nomor Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $item) : ?>
                        <tr>
                            <td><?= $item['user'] ?></td>
                            <td><?= $item['hewan'] ?></td>
                            <td><?= $item['treatment'] ?></td>
                            <td><?= $item['schedule'] ?></td>
                            <td><?= $item['phone'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>