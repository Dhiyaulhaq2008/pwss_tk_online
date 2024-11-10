<?php
include 'koneksi.php';

$id = $_GET['id'];
$user = $conn->query("SELECT * FROM users WHERE id_users = $id")->fetch_assoc();

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $level = $_POST['level'];
    
    $conn->query("UPDATE users SET nama = '$nama', username = '$username', level = '$level' WHERE id_users = $id");
    header("Location: index_users.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
        <h2>Edit User</h2>
        <form method="POST">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($user['nama']); ?>" required>

            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>

            <label for="level">Level:</label>
            <select name="level" id="level" required>
                <option value="admin" <?php echo ($user['level'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                <option value="operator" <?php echo ($user['level'] == 'operator') ? 'selected' : ''; ?>>Operator</option>
            </select>

            <button type="submit" name="update">Update User</button>
            <a href="index_users.php" class="cancel-button">Batal</a>
        </form>
    </div>
</body>
</html>
