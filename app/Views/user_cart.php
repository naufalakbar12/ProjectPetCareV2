<?= $this->extend('base_user') ?>
<?= $this->section('content') ?>
<div class="container py-5">

    <h2>Shopping Cart</h2>
    <hr>
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($cartItems)) : ?>
                <?php $i = 1;
                foreach ($cartItems as $item) : ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $item['name'] ?></td>
                        <td>Rp. <?= $item['harga'] ?></td>
                        <td>
                            <form action="<?= base_url('user/cart/update') ?>" method="post">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <input type="hidden" name="name" value="<?= $item['name'] ?>">
                                <input type="hidden" name="harga" value="<?= $item['harga'] ?>">
                                <input type="number" name="quantity" value="<?= $item['quantity'] ?>">
                                <button type="submit" class="btn btn-sm btn-success">Update</button>
                            </form>
                        </td>
                        <td>
                            <form action="<?= base_url('user/cart/delete') ?>" method="post">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php $i++;
                endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">Your cart is empty.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="text-end">
        <?php if (!empty($cartItems)) : ?>
            <h5>Total:Rp. <?= $total ?></h5>
            <form action="<?= base_url('user/order') ?>" method="post">
                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                <input type="hidden" name="harga" value="<?= $item['harga'] ?>">
                <input type="hidden" name="name" value="<?= $item['name'] ?>">
                <input type="hidden" name="quantity" value="<?= $item['quantity'] ?>">
                <button type="submit" class="btn btn-success">Checkout</button>
            </form>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>