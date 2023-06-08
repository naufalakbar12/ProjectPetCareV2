<?= $this->extend('base_user') ?>
<?= $this->section('content') ?>
<div class="container py-5">
    <h3 class="mb-3">Daftar Perawatan Hewan</h3>
    <form action="/user/req-perawatan" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Jenis Hewan</label>
            <input type="text" class="form-control" id="name" name="hewan" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Nomor Telepon</label>
            <input type="number" class="form-control" id="username" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Schedule</label>
            <input type="date" class="form-control" id="password" name="schedule" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Jenis Perawatan</label>
            <select name="treatment" id="role" class="form-control" required>
                <option value="Semua Layanan Grooming">Semua Layanan Grooming</option>
                <option value="Memandikan">Memandikan</option>
                <option value="Menyikat">Menyikat</option>
                <option value="Menyisir Bulu">Menyisir Bulu</option>
                <option value="Membersihkan Area Mata dan Telinga">Membersihkan Area Mata dan Telinga</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>