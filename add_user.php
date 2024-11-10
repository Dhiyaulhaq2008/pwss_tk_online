<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Enkripsi password
    $level = $_POST['level'];

    // Menambahkan pengguna baru ke database
    $conn->query("INSERT INTO users (nama, username, password, level) VALUES ('$nama', '$username', '$password', '$level')");
    header("Location: index_users.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <style>
        /* style.css */

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

        input[type="text"], input[type="password"], select {
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
            background-color: #6c757d;
        }

        .button-cancel:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah User</h2>
        <form method="POST">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>

            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <label for="level">Level:</label>
            <select name="level" id="level" required>
                <option value="admin">Admin</option>
                <option value="operator">Operator</option>
            </select>

            <button type="submit" name="submit">Tambah User</button>
            <a href="index_users.php" class="button button-cancel">Batal</a>
        </form>
    </div>
</body>
</html>