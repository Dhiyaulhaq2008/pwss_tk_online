<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id_kategori = $_POST['id_kategori'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $jumlah_produk = $_POST['jumlah_produk'];
    
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_path = "uploads/" . $gambar;
    
    move_uploaded_file($gambar_tmp, $gambar_path);
    
    $conn->query("INSERT INTO produk (id_kategori, nama_produk, harga, jumlah_produk, gambar) 
    VALUES ('$id_kategori', '$nama_produk', '$harga', '$jumlah_produk', '$gambar')");
    
    header("Location: index_produk.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
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

        input[type="text"], input[type="number"], select, input[type="file"] {
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

        .button-cancel {
            background-color: #db1514; 
        }

        .button-cancel:hover {
            background-color: #5a6268; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Produk</h2>
        <form method="POST" enctype="multipart/form-data">
            <label for="id_kategori">Kategori Produk:</label>
            <select name="id_kategori" id="id_kategori" required>
                <?php
                $categories = $conn->query("SELECT * FROM kategori_produk");
                while ($category = $categories->fetch_assoc()) {
                    echo "<option value='".$category['id_kategori']."'>".$category['nama_kategori']."</option>";
                }
                ?>
            </select>

            <label for="nama_produk">Nama Produk:</label>
            <input type="text" name="nama_produk" id="nama_produk" required>

            <label for="harga">Harga:</label>
            <input type="number" name="harga" id="harga" required>

            <label for="jumlah_produk">Jumlah Produk:</label>
            <input type="number" name="jumlah_produk" id="jumlah_produk" required>

            <label for="gambar">Gambar:</label>
            <input type="file" name="gambar" id="gambar" required>

            <button type="submit" name="submit">Tambah Produk</button>
            <a href="index_produk.php" class="button button-cancel">Batal</a>
        </form>
    </div>
</body>
</html>