<?= $this->extend('base') ?>
<?= $this->section('content') ?>
<div class="container py-5">
    <h3 class="mb-3">Edit Admin</h3>
    <form action="/admin/users/edit/<?= $user['id'] ?>" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input value="<?= $user['name'] ?>" type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input value="<?= $user['username'] ?>" type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input value="<?= $user['password'] ?>" type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Role</label>
            <select name="role" id="role" class="form-control">
                <option value="USER" <?php ($user['role'] == "USER") ? 'selected' : "" ?>>USER</option>
                <option value="ADMIN" <?php ($user['role'] == "ADMIN") ? 'selected' : "" ?>>ADMIN</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>