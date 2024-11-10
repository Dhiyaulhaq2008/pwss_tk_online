<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_member = $_GET['id'];
    $result = $conn->query("SELECT * FROM members WHERE id_member = '$id_member'");
    $row = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $nama_member = $_POST['nama_member'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $conn->query("UPDATE members SET nama_member = '$nama_member', jenis_kelamin = '$jenis_kelamin', no_hp = '$no_hp', alamat = '$alamat' WHERE id_member = '$id_member'");
    header("Location: index_members.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
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

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }

        input, select, textarea {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }

        textarea {
            resize: vertical;
            height: 120px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .cancel-button {
            background-color: #ff4757;
            text-decoration: none;
            color: #fff;
            display: inline-block;
            padding: 10px 20px;
            text-align: center;
            margin-top: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .cancel-button:hover {
            background-color: #d63031;
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 20px;
            }

            input, select, textarea, button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Member</h2>
        <form method="POST">
            <label for="nama_member">Nama Member:</label>
            <input type="text" name="nama_member" id="nama_member" value="<?php echo htmlspecialchars($row['nama_member']); ?>" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" id="jenis_kelamin" required>
                <option value="L" <?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-Laki</option>
                <option value="P" <?php echo ($row['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
            </select>

            <label for="no_hp">No HP:</label>
            <input type="text" name="no_hp" id="no_hp" value="<?php echo htmlspecialchars($row['no_hp']); ?>" required>

            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" required><?php echo htmlspecialchars($row['alamat']); ?></textarea>

            <button type="submit" name="submit">Simpan Perubahan</button>
            <a href="index_members.php" class="cancel-button">Batal</a>
        </form>
    </div>
</body>
</html>
