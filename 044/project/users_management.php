<?php
session_start();

/* ----------------- CONNECT DATABASE ----------------- */
$mysqli = new mysqli("localhost", "root", "", "044");
if ($mysqli->connect_errno) {
    die("❌ Database connection failed: " . $mysqli->connect_error);
}

/* ---- ดึงข้อมูลทุกแถวในตาราง users ---- */
$sql = "SELECT * FROM users";
$result = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>Users Management</title>

    <style>
        :root {
            --mint-50: #f2fffb;
            --mint-200: #c8fff0;
            --mint-300: #9cf5df;
            --mint-500: #2ecaa9;
            --mint-600: #24ae8f;
            --mint-700: #1b8b6c;
            --dark-text: #06321f;
        }

        body {
            background: linear-gradient(135deg, var(--mint-50), var(--mint-200) 40%, var(--mint-300));
            font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            min-height: 100vh;
            margin: 0;
            color: var(--dark-text);
        }

        /* -------------------- Navbar -------------------- */
        .navbar {
            width: 100%;
            padding: 15px 30px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 15px rgba(5, 40, 20, 0.1);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .navbar .brand {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--mint-700);
        }

        .navbar .user-area {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .navbar .user-area span {
            font-size: 1rem;
            font-weight: 600;
            color: var(--dark-text);
        }

        .logout-small {
            background: linear-gradient(90deg, #54e6c6, #2ecaa9);
            color: white;
            padding: 8px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.25s;
            box-shadow: 0 4px 12px rgba(46, 202, 169, 0.3);
        }

        .logout-small:hover {
            background: linear-gradient(90deg, #2ecaa9, #24ae8f);
        }

        .nav-link {
            font-weight: 600;
            color: var(--mint-700);
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 8px;
            transition: 0.25s ease;
            background: rgba(46, 202, 169, 0.15);
        }

        .nav-link:hover {
            background: var(--mint-500);
            color: white;
        }

        .brand-area {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* -------------------- Profile Card -------------------- */
        .wrapper {
            display: flex;
            justify-content: center;
            padding: 30px 20px;
        }

        .profile-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.88));
            box-shadow: 0 8px 25px rgba(5, 40, 20, 0.15);
            border-radius: 12px;
            max-width: 500px;
            width: 100%;
            padding: 40px;
            text-align: center;
        }

        h1 {
            color: var(--mint-700);
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        p {
            font-size: 1rem;
            margin: 8px 0;
        }

        hr {
            border: none;
            height: 1px;
            background: var(--mint-300);
            margin: 25px 0;
        }

        a.logout-btn {
            display: inline-block;
            background: linear-gradient(90deg, #54e6c6, #2ecaa9);
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 10px;
            transition: 0.3s;
            box-shadow: 0 8px 15px rgba(46, 202, 169, 0.25);
        }

        a.logout-btn:hover {
            background: linear-gradient(90deg, #2ecaa9, #24ae8f);
            box-shadow: 0 0 12px rgba(46, 202, 169, 0.4);
        }


        h1 {
            text-align: center;
            color: #1b8b6c;
            margin-bottom: 20px;
        }

        .search-box {
            width: 100%;
            max-width: 350px;
            margin: 0 auto 20px auto;
            padding: 12px 15px;
            border-radius: 10px;
            outline: none;
            border: 2px solid #2ecaa9;
            background: #ffffffcc;
            backdrop-filter: blur(8px);
            font-size: 1rem;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.15);
        }

        th {
            background: #2ecaa9;
            color: white;
            padding: 12px;
            cursor: pointer;
            position: relative;
        }

        th:hover {
            background: #24ae8f;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #e5e5e5;
        }

        tr:hover {
            background: #f1fff9;
        }

        .btn {
            padding: 6px 14px;
            border-radius: 6px;
            color: white;
            font-weight: 600;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .edit-btn {
            background: #1b8b6c;
        }

        .edit-btn:hover {
            background: #157058;
        }

        .delete-btn {
            background: #d9534f;
        }

        .delete-btn:hover {
            background: #b94441;
        }

        .top-bar {
            max-width: 1200px;
            margin: 0 auto 20px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .add-btn {
            background: #1b8b6c;
            color: white;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(27, 139, 108, 0.3);
            transition: 0.25s;
        }

        .add-btn:hover {
            background: #157058;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="brand-area">
            <div class="brand">Mint Grid</div>
            <a href="users_management.php" class="nav-link">Users Management</a>
        </div>

        <div class="user-area">
            <span>👤 <?= htmlspecialchars($_SESSION['fullname']); ?></span>
            <a href="logout.php" class="logout-small">Logout</a>
        </div>
    </nav>

    <h1>Users Management</h1>

    <div class="top-bar">
        <input type="text" id="searchInput" class="search-box" placeholder="🔍 ค้นหา user...">
        <a href="add_user.php" class="add-btn">+ Add User</a>
    </div>


    <table id="usersTable">
        <thead>
            <tr>
                <?php
                if ($result->num_rows > 0) {
                    $firstRow = $result->fetch_assoc();

                    // --- แสดงเฉพาะ column ที่ไม่ใช่ password ---
                    foreach ($firstRow as $colName => $value) {
                        if ($colName == 'password') continue;
                        echo "<th onclick=\"sortTable('$colName')\">" . htmlspecialchars($colName) . "</th>";
                    }

                    echo "<th>Actions</th></tr></thead><tbody>";

                    // --- แสดง row แรก ---
                    echo "<tr>";
                    foreach ($firstRow as $key => $value) {
                        if ($key == 'password') continue;
                        echo "<td>" . htmlspecialchars($value) . "</td>";
                    }
                    echo "<td>
                        <a href='edit_user.php?id={$firstRow['id']}' class='btn edit-btn'>Edit</a>
                        <a href='delete_user.php?id={$firstRow['id']}' class='btn delete-btn'
                           onclick=\"return confirm('ลบผู้ใช้นี้?');\">Delete</a>
                      </td>";
                    echo "</tr>";
                }
                ?>
        </thead>

        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";

                // --- ซ่อน password ---
                foreach ($row as $key => $value) {
                    if ($key == 'password') continue;
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }

                echo "<td>
                <a href='edit_user.php?id={$row['id']}' class='btn edit-btn'>Edit</a>
                <a href='delete_user.php?id={$row['id']}' class='btn delete-btn'
                   onclick=\"return confirm('ลบผู้ใช้นี้?');\">Delete</a>
              </td>";

                echo "</tr>";
            }
            ?>
        </tbody>
    </table>


    <script>
        /* ------------------ SEARCH ------------------ */
        document.getElementById("searchInput").addEventListener("keyup", function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll("#usersTable tbody tr");

            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        });

        /* ------------------ SORT ------------------ */
        function sortTable(columnName) {
            const table = document.getElementById("usersTable");
            const rows = Array.from(table.rows).slice(1);
            const columnIndex = [...table.rows[0].cells].findIndex(th => th.innerText === columnName);

            let isAscending = table.getAttribute("data-sort-order") !== "asc";
            table.setAttribute("data-sort-order", isAscending ? "asc" : "desc");

            rows.sort((rowA, rowB) => {
                let cellA = rowA.cells[columnIndex].innerText.toLowerCase();
                let cellB = rowB.cells[columnIndex].innerText.toLowerCase();

                if (!isNaN(cellA) && !isNaN(cellB)) {
                    return isAscending ? cellA - cellB : cellB - cellA;
                }

                return isAscending ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA);
            });

            rows.forEach(row => table.appendChild(row));
        }
    </script>

</body>

</html>