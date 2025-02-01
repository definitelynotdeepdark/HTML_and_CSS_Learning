<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item by ID</title>
    <link rel="stylesheet" href = "editstyles.css">
</head>
<body>
    <div class="container">
        <h1>Edit Item</h1>
        <?php
        // รับค่า ID จากพารามิเตอร์ GET
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // เชื่อมต่อฐานข้อมูล
            $conn = new mysqli('localhost', 'root', '12345678', 'myDB');

            // ตรวจสอบการเชื่อมต่อ
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // ดึงข้อมูลจากฐานข้อมูล
            $sql = "SELECT * FROM MyGuests WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc(); // รับข้อมูลรายการที่ต้องการแก้ไข
                ?>
                <form action="edit1.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <label for="item-name">Name:</label>
                    <input type="text" id="item-name" name="name" value="<?php echo $row['name']; ?>" required>

                    <label for="item-lname">Lastname:</label>
                    <input id="item-lname" name="lname" value ="<?php echo $row['lname']; ?>" require>

                    <button type="submit" class="edit-btn">Save Changes</button>
                </form>
                <?php
            } else {
                echo "<p>No item found with ID $id.</p>";
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "<p>ID not specified.</p>";
        }
        ?>
    </div>
</body>
</html>
