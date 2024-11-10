<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            width: 100%;
            max-width: 600px;
        }

        h1 {
            color: #333;
            font-size: 30px;
            margin-bottom: 40px;
        }

        .button-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .button {
            display: inline-block;
            padding: 15px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            text-decoration: none;
            border-radius: 8px;
            text-align: center;
            transition: background-color 0.3s;
            width: 100%;
            box-sizing: border-box;
            font-weight: bold;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .button:active {
            background-color: #004085;
        }

        .button-container a {
            height: 100%;
        }

        @media (max-width: 768px) {
            .button-container {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="button-container">
            <a href="index_users.php" class="button">Users</a>
            <a href="index_members.php" class="button">Members</a>
            <a href="index_katprod.php" class="button">Kategori Produk</a>
            <a href="index_produk.php" class="button">Produk</a>
        </div>
    </div>

</body>
</html>
