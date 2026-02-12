<?php startSection('content'); ?>

<style>
    /* ====== Products Page Styles ====== */
    h1 {
        font-size: 2rem;
        margin-bottom: 20px;
        color: #4e54c8;
    }

    a.btn-add {
        display: inline-block;
        background-color: #4e54c8;
        color: #fff;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    a.btn-add:hover {
        background-color: #8f94fb;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        border-radius: 8px;
        overflow: hidden;
    }

    table th, table td {
        padding: 12px 15px;
        text-align: left;
    }

    table th {
        background-color: #4e54c8;
        color: #fff;
        font-weight: 600;
    }

    table tr:nth-child(even) {
        background-color: #f4f6f8;
    }

    table tr:hover {
        background-color: #e0e4ff;
        transition: background-color 0.3s ease;
    }

    table td a {
        color: #4e54c8;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    table td a:hover {
        color: #8f94fb;
    }
</style>

<h1>Products</h1>
<a href="/products/create" class="btn-add">Add New Product</a>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?= htmlspecialchars($product['id']) ?></td>
        <td><?= htmlspecialchars($product['name']) ?></td>
        <td>$<?= htmlspecialchars($product['price']) ?></td>
        <td>
            <a href="/products/edit?id=<?= $product['id'] ?>">Edit</a> |
            <a href="/products/delete?id=<?= $product['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php endSection(); ?>
