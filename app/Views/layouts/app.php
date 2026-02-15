<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY MVC</title>

    <style>
        /* ======================= Reset ======================= */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f8;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* ======================= Header ======================= */
        header {
            background: linear-gradient(90deg, #4e54c8, #8f94fb);
            color: #fff;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: 1px;
            background-color: white;
            padding: 10px;
            border-radius: 9px;
        }

        nav {
            display: flex;
            gap: 15px;
        }

        nav a {
            background-color: rgba(255,255,255,0.2);
            padding: 10px 18px;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        nav a:hover {
            background-color: rgba(255,255,255,0.4);
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        }

        /* ======================= Main Content ======================= */
        main {
            flex: 1;
            padding: 40px;
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
        }

        /* ======================= Footer ======================= */
        footer {
            background-color: #4e54c8;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            font-size: 0.9rem;
            margin-top: auto;
            box-shadow: 0 -4px 6px rgba(0,0,0,0.1);
        }

        /* ======================= Buttons Styling ======================= */
        .btn {
            display: inline-block;
            background-color: #fff;
            color: #4e54c8;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

    <!-- ======================= HEADER ======================= -->
    <header>
        <h1>My MVC Project</h1>
        <nav>
            <a href="/" class="btn">Home</a>
            <a href="/products" class="btn">Products</a>
            <a href="/logout" class="btn">Logout</a>
        </nav>
    </header>

    <!-- ======================= MAIN CONTENT ======================= -->
    <main>
        <?php yieldSection('content'); ?>
    </main>

    <!-- ======================= FOOTER ======================= -->
    <footer>
        &copy; <?= date('Y') ?> My MVC Project. All rights reserved.
    </footer>

</body>
</html>
