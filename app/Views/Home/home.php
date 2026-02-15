<?php startSection('content'); ?>

<style>
    /* ====== Home Page Styles ====== */
    h1 {
        font-size: 2.2rem;
        margin-bottom: 15px;
        color: #4e54c8;
        position: relative;
        animation: fadeIn 1s ease forwards;
    }

    p {
        font-size: 1.1rem;
        margin-bottom: 10px;
        color: #555;
        animation: fadeIn 1.2s ease forwards;
    }

    /* Add some subtle highlight for role */
    p:last-child {
        font-weight: 600;
        color: #4e54c8;
    }

    /* Container for Home info */
    .home-container {
        background-color: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0,0,0,0.05);
        max-width: 600px;
        margin: 40px auto;
        text-align: center;
    }

    /* Animations */
    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(-10px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    /* Optional: make text color gradient on hover for h1 */
    h1:hover {
        background: linear-gradient(90deg, #4e54c8, #8f94fb);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        cursor: default;
    }
</style>

<div class="home-container">
    <h1>Welcome <?= $user['name'] ?></h1>
    <p>Email: <?= htmlspecialchars($user['email']) ?></p>
    <p>Role: <?= htmlspecialchars($user['role']) ?></p>
</div>

<?php endSection(); ?>
