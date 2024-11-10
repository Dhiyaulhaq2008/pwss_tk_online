<?php
include 'koneksi.php';

$id = $_GET['id'];
$kategori = $conn->query("SELECT * FROM kategori_produk WHERE id_kategori = $id")->fetch_assoc();

if (isset($_POST['update'])) {
    $nama_kategori = $_POST['nama_kategori'];
    $keterangan = $_POST['keterangan'];

    $conn->query("UPDATE kategori_produk SET nama_kategori = '$nama_kategori', keterangan = '$keterangan' WHERE id_kategori = $id");
    header("Location: index_katprod.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori Produk</title>
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

        .search-container {
            margin-bottom: 20px;
        }

        .search-container input[type="text"] {
            padding: 10px;
            width: 200px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin-right: 10px;
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
        <h2>Edit Kategori Produk</h2>
        <form method="POST">
            <label for="nama_kategori">Nama Kategori:</label>
            <input type="text" name="nama_kategori" id="nama_kategori" value="<?php echo htmlspecialchars($kategori['nama_kategori']); ?>" required>

            <label for="keterangan">Keterangan:</label>
            <textarea name="keterangan" id="keterangan" required><?php echo htmlspecialchars($kategori['keterangan']); ?></textarea>

            <button type="submit" name="update">Update Kategori</button>
            <a href="kategori_produk.php" class="button button-cancel">Batal</a>
        </form>
    </div>
</body>
</html>
