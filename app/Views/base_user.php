<html>

<head>
    <?= $this->include('layouts/head') ?>
</head>

<body>
    <?= $this->include('layouts/navbar_user') ?>

    <main role="main " class="container">

        <?= $this->renderSection('content') ?>
    </main>
    <?= $this->include('layouts/footer') ?>

    <?= $this->include('layouts/scripts') ?>
</body>

</html>