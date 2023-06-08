<?= $this->extend('base') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <h5 class="mb-4">Lists Users</h5>
                <div>
                    <a href="<?= base_url('admin/users/tambah/') ?>" class="btn btn-sm btn-outline-info">Tambah Admin</a>
                </div>
            </div>

            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th scope="col ">Name</th>
                        <th scope="col ">Username</th>
                        <th scope="col ">Role</th>
                        <th scope="col ">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['role'] ?></td>
                            <td class="d-flex">
                                <div>
                                    <a href="<?= base_url('admin/users/edit/' . $user['id']) ?>" class="btn btn-sm btn-secondary">Edit</a>
                                </div>
                                <form action="/admin/users/delete/<?= $user['id'] ?>" method="post" onsubmit="return confirm(`Are you sure?`)">
                                    <input type="hidden" name="_method" value="delete" />
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>