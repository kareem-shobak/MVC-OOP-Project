<?php startSection('content'); ?>

<style>
    /* ====== Edit Product Page Styles (same as Add with Update tweaks) ====== */
    h1 {
        font-size: 2rem;
        margin-bottom: 25px;
        color: #4e54c8;
    }

    form {
        background-color: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0,0,0,0.05);
        max-width: 500px;
        margin-bottom: 20px;
    }

    form label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        color: #333;
    }

    form input[type="text"],
    form input[type="number"] {
        width: 100%;
        padding: 10px 15px;
        border-radius: 8px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
        font-size: 1rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    form input[type="text"]:focus,
    form input[type="number"]:focus {
        border-color: #4e54c8;
        box-shadow: 0 0 5px rgba(78, 84, 200, 0.5);
        outline: none;
    }

    /* Update button with distinct color */
    form button {
        background-color: #f4b105;
        color: #fff;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    form button:hover {
        background-color: #ff8787;
        transform: translateY(-2px);
        box-shadow: 0 6px 10px rgba(0,0,0,0.2);
    }

    a.back-link {
        display: inline-block;
        margin-top: 15px;
        color: #4e54c8;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    a.back-link:hover {
        color: #8f94fb;
    }

    /* Center form for larger screens */
    @media (min-width: 768px) {
        form {
            margin: 0 auto 20px auto;
        }
    }
</style>

<h1>Edit Product</h1>

<form method="POST">
    <label>Name</label>
    <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>

    <label>Price</label>
    <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($product['price']) ?>" required>

    <button type="submit">Update</button>
</form>

<a href="/products" class="back-link">← Back to Products</a>

<?php endSection(); ?>
