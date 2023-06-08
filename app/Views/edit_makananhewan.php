<?= $this->extend('base') ?>
<?= $this->section('content') ?>
<div class="container py-5">
    <h3 class="mb-3">Edit Makanan</h3>
    <form action="/admin/makanan/edit/<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="example-product-photo">Photo</label>
            <input type="file" class="form-control" id="example-product-photo" aria-describedby="photoHelp" name="photo">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input value="<?= $data['name'] ?>" type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input value="<?= $data['harga'] ?>" type="number" class="form-control" id="harga" name="harga">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>