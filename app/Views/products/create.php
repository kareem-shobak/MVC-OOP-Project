<?php startSection('content'); ?>

<h1>Add Product</h1>

<form method="POST">
    <label>Name</label><br>
    <input type="text" name="name" required><br><br>
    <label>Price</label><br>
    <input type="number" step="0.01" name="price" required><br><br>
    <button type="submit">Add</button>
</form>

<a href="/products">Back</a>

<?php endSection(); ?>
