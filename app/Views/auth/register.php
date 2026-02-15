<?php startSection('content'); ?>

<style>
    /* ====== Register Page Styles ====== */
    .register-container {
        max-width: 400px;
        margin: 80px auto;
        background-color: #fff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        text-align: center;
    }

    h1 {
        color: #4e54c8;
        margin-bottom: 30px;
        font-size: 2rem;
        animation: fadeIn 1s ease forwards;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        padding: 12px 15px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #4e54c8;
        box-shadow: 0 0 5px rgba(78, 84, 200, 0.4);
        outline: none;
    }

    button {
        padding: 12px 0;
        background-color: #4e54c8;
        color: #fff;
        font-size: 1.1rem;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    button:hover {
        background-color: #8f94fb;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.2);
    }

    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(-10px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .register-container a {
        display: block;
        margin-top: 15px;
        color: #4e54c8;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .register-container a:hover {
        color: #8f94fb;
    }
</style>

<div class="register-container">
    <h1>Register</h1>

    <form method="POST">
        <input name="name" type="text" placeholder="Name" required>
        <input name="email" type="email" placeholder="Email" required>
        <input name="password" type="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
      <!-- Login Option -->
    <p style="margin-top:20px; font-size:0.95rem;">
        Already have an account?
        <a href="/login" style="font-weight:600;">Login here</a>
    </p>
</div>

<?php endSection(); ?>
