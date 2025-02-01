<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $lname = $_POST['lname'];

    // เชื่อมต่อฐานข้อมูล
    $conn = new mysqli('localhost', 'root', '12345678', 'myDB');

    // ตรวจสอบการเชื่อมต่อ
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // อัปเดตข้อมูลในฐานข้อมูล
    $sql = "UPDATE MyGuests SET firstname = ?, lastname = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $name, $lname, $id);

    if ($stmt->execute()) {
        echo "Item with ID $id has been updated successfully.";
    } else {
        echo "Error updating item: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header("location:all.php");
}
?>
