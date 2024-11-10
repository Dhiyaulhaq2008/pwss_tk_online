<?php
include 'koneksi.php';

$search = isset($_POST['search']) ? $_POST['search'] : '';
$query = "SELECT * FROM users";
if ($search) {
    $query .= " WHERE nama LIKE '%$search%' OR username LIKE '%$search%'";
}
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Users</title>
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
            max-width: 1200px;
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

        a.button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a.button:hover {
            background-color: #0056b3;
        }

        .button-secondary {
            background-color: #ff4757;
        }

        .button-secondary:hover {
            background-color: #d63031;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #dee2e6;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            color: #495057;
        }

        table thead {
            background-color: #f8f9fa;
        }

        table th {
            font-weight: bold;
            color: #333;
        }

        table tbody tr:nth-child(even) {
            background-color: #f1f3f5;
        }

        table tbody tr:hover {
            background-color: #e9ecef;
            cursor: pointer;
        }

        td a.button {
            font-size: 14px;
            padding: 6px 12px;
        }

        td a.button.button-secondary {
            margin-left: 8px;
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

        @media (max-width: 768px) {
            h2 {
                font-size: 20px;
            }

            table, th, td {
                font-size: 14px;
            }

            a.button {
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Users</h2>
        <div class="search-container">
            <form method="POST">
                <input type="text" name="search" placeholder="Cari pengguna..." value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit">Cari</button>
            </form>
        </div>
        <a href="add_user.php" class="button">Tambah User</a>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $key => $row) {?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $row["nama"]; ?></td>
                        <td><?php echo $row["username"]; ?></td>
                        <td><?php echo $row["level"]; ?></td>
                        <td>
                            <a href="edit_user.php?id=<?php echo $row["id_users"]; ?>" class="button">Edit</a>
                            <a href="delete_user.php?id=<?php echo $row["id_users"]; ?>" class="button button-secondary" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>