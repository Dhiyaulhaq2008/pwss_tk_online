<?php
include 'koneksi.php';

$id_produk = $_GET['id'];

$query = "SELECT * FROM produk WHERE id_produk = $id_produk";
$result = $conn->query($query);
$product = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $id_kategori = $_POST['id_kategori'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $jumlah_produk = $_POST['jumlah_produk'];

    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    if ($gambar) {
        $image_path = "uploads/" . $gambar;
        move_uploaded_file($tmp_name, $image_path);
        $conn->query("UPDATE produk SET id_kategori = '$id_kategori', nama_produk = '$nama_produk', harga = '$harga', jumlah_produk = '$jumlah_produk', gambar = '$gambar' WHERE id_produk = $id_produk");
    } else {
        $conn->query("UPDATE produk SET id_kategori = '$id_kategori', nama_produk = '$nama_produk', harga = '$harga', jumlah_produk = '$jumlah_produk' WHERE id_produk = $id_produk");
    }

    header("Location: index_produk.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
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
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            text-align: left;
        }

        input[type="text"], input[type="number"], select, textarea {
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

        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-container input[type="text"] {
            padding: 10px;
            width: 200px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin-right: 10px;
        }

        .search-container button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #0056b3;
        }

        .input-file {
            padding: 10px;
        }

        .input-file input[type="file"] {
            width: 100%;
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 20px;
            }

            input[type="text"], input[type="number"], select, textarea {
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
        <h2>Edit Produk</h2>
        <form method="POST" enctype="multipart/form-data">
            <label for="id_kategori">Kategori Produk:</label>
            <select name="id_kategori" id="id_kategori" required>
                <?php
                $kategori_result = $conn->query("SELECT * FROM kategori_produk");
                while ($kategori = $kategori_result->fetch_assoc()) {
                    $selected = ($kategori['id_kategori'] == $product['id_kategori']) ? 'selected' : '';
                    echo "<option value='{$kategori['id_kategori']}' $selected>{$kategori['nama_kategori']}</option>";
                }
                ?>
            </select>

            <label for="nama_produk">Nama Produk:</label>
            <input type="text" name="nama_produk" id="nama_produk" value="<?php echo $product['nama_produk']; ?>" required>

            <label for="harga">Harga:</label>
            <input type="number" name="harga" id="harga" value="<?php echo $product['harga']; ?>" required>

            <label for="jumlah_produk">Jumlah Produk:</label>
            <input type="number" name="jumlah_produk" id="jumlah_produk" value="<?php echo $product['jumlah_produk']; ?>" required>

            <label for="gambar">Gambar:</label>
            <input type="file" name="gambar" id="gambar" class="input-file">
            <?php if ($product['gambar']) { ?>
                <p>Gambar Saat Ini:</p>
                <img src="uploads/<?php echo $product['gambar']; ?>" width="100" alt="Gambar Produk">
            <?php } ?>

            <button type="submit" name="update">Update Produk</button>
            <a href="index_produk.php" class="button button-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
