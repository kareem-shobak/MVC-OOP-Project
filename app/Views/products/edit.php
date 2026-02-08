<?php startSection('content'); ?>

<h1>Edit Product</h1>

<form method="POST">
    <label>Name</label><br>
    <input type="text" name="name" value="<?= $product['name'] ?>" required><br><br>
    <label>Price</label><br>
    <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required><br><br>
    <button type="submit">Update</button>
</form>

<a href="/products">Back</a>

<?php endSection(); ?>
