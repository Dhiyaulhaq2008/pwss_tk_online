<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama_kategori = $_POST['nama_kategori'];
    $keterangan = $_POST['keterangan'];

    $conn->query("INSERT INTO kategori_produk (nama_kategori, keterangan) VALUES ('$nama_kategori', '$keterangan')");
    header("Location: index_katprod.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori Produk</title>
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
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            width: 90%;
            max-width: 600px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            margin: 20px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            text-align: left;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            font-size: 16px;
        }

        button, a.button {
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
        }

        button:hover, a.button:hover {
            background-color: #0056b3;
        }

        .button-secondary {
            background-color: #ff4757;
        }

        .button-secondary:hover {
            background-color: #d63031;
        }

        .button-cancel {
            background-color: #db1514; 
        }

        .button-cancel:hover {
            background-color: #5a6268; 
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 20px;
            }

            input[type="text"], textarea {
                font-size: 14px;
            }

            button, a.button {
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Kategori Produk</h2>
        <form method="POST">
            <label for="nama_kategori">Nama Kategori:</label>
            <input type="text" name="nama_kategori" id="nama_kategori" required>

            <label for="keterangan">Keterangan:</label>
            <textarea name="keterangan" id="keterangan" required></textarea>

            <button type="submit" name="submit">Tambah Kategori</button>
            <a href="index_katprod.php" class="button button-cancel">Batal</a>
        </form>
    </div>
</body>
</html>
