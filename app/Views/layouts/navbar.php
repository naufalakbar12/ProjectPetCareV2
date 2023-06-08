<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: white;">
    <a class="navbar-brand" href="#">
      <img src="<?= base_url('logo1.png') ?>" style="width:150px" />
    </a>
    <!-- Navbar brand yo -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link active" href="/admin/users">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/admin/peralatan">Peralatan Hewan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/admin/makanan">Makanan Hewan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/admin/jadwal-perawatan">Jadwal Perawatan Hewan</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="/admin/shop">Shop</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link active" href="/logout">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
</header>