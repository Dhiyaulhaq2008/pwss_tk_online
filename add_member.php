<?php
include 'koneksi.php'; // Menghubungkan ke database

if (isset($_POST['submit'])) {
    $nama_member = $_POST['nama_member'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    // Menambahkan member ke database
    $conn->query("INSERT INTO members (nama_member, jenis_kelamin, no_hp, alamat) VALUES ('$nama_member', '$jenis_kelamin', '$no_hp', '$alamat')");
    header("Location: index_members.php"); // Redirect ke halaman member.php setelah berhasil
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Member</title>
    <style>
        /* CSS yang digunakan untuk halaman Tambah Member */
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

        input[type="text"], input[type="password"], select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            height: 120px;
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
            background-color: #6c757d;
        }

        .button-cancel:hover {
            background-color: #5a6268;
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 20px;
            }

            label, input[type="text"], input[type="password"], select, textarea {
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
        <h2>Tambah Member</h2>
        <form method="POST">
            <label for="nama_member">Nama Member:</label>
            <input type="text" name="nama_member" id="nama_member" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" id="jenis_kelamin" required>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>

            <label for="no_hp">No HP:</label>
            <input type="text" name="no_hp" id="no_hp" required>

            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" required></textarea>

            <button type="submit" name="submit">Tambah Member</button>
            <a href="index_members.php" class="button button-cancel">Batal</a>
        </form>
    </div>
</body>
</html>
