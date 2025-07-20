<?php
$conn = new mysqli("localhost", "root", "", "shopdb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? '';
    $price = $_POST["price"] ?? '';
    $category = $_POST["category"] ?? '';
    $imagePath = '';

    // ตรวจสอบและอัปโหลดรูป
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
        $targetDir = "images/";
        $filename = time() . '_' . basename($_FILES["image"]["name"]);
        $targetFile = $targetDir . $filename;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $imagePath = $targetFile;
        } else {
            $error = "ไม่สามารถอัปโหลดรูปได้";
        }
    }

    // บันทึกเข้า DB
    if (!$error && $name && $price && $imagePath) {
        $stmt = $conn->prepare("INSERT INTO products (name, image, price, category) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $name, $imagePath, $price, $category);

        if ($stmt->execute()) {
            $success = "เพิ่มสินค้าเรียบร้อยแล้ว!";
        } else {
            $error = "เกิดข้อผิดพลาดในการเพิ่มสินค้า";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>เพิ่มสินค้า - HoopLife</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4 text-center text-red-600">📦 เพิ่มสินค้าใหม่</h2>

    <?php if ($success): ?>
      <div class="bg-green-100 text-green-800 p-3 rounded mb-4"><?= $success ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
      <div class="bg-red-100 text-red-800 p-3 rounded mb-4"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
      <div class="mb-4">
        <label class="block mb-1 font-medium">ชื่อสินค้า</label>
        <input type="text" name="name" required class="w-full p-2 border rounded" />
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-medium">ราคา ($)</label>
        <input type="number" step="0.01" name="price" required class="w-full p-2 border rounded" />
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-medium">หมวดหมู่</label>
        <select name="category" class="w-full p-2 border rounded">
          <option value="short">Shorts</option>
          <option value="shirt">Shirts</option>
          <option value="accessory">Accessory</option>
        </select>
      </div>

      <div class="mb-4">
        <label class="block mb-1 font-medium">เลือกรูปสินค้า</label>
        <input type="file" name="image" accept="image/*" required class="w-full" />
      </div>

      <button type="submit" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 transition">
        ➕ เพิ่มสินค้า
      </button>
    </form>

    <div class="text-center mt-4">
      <a href="index.php" class="text-blue-600 underline">← กลับหน้ารายการสินค้า</a>
    </div>
  </div>

</body>
</html>
