<?php
$conn = new mysqli("localhost", "root", "", "shopdb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงสินค้าล่าสุด 3 รายการ
$sql = "SELECT * FROM products ORDER BY id DESC LIMIT 3";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>HoopLife | หน้าแรก</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- แถบด้านบน -->
  <div class="bg-red-600 text-white text-center p-2 text-sm font-semibold">
    🎉 โปรโมชั่นวันนี้! ซื้อครบ 100$ ลดทันที 10%
  </div>

  <!-- Header -->
  <header class="bg-white shadow-md sticky top-0 z-10">
    <div class="container mx-auto flex justify-between items-center px-6 py-4">
      <div class="text-2xl font-bold text-red-600">🏀 HOOPLIFE</div>
      <nav class="space-x-6 text-sm hidden md:block">
        <a href="home.php" class="text-red-600 font-semibold">Home</a>
        <a href="index.php" class="hover:text-red-500">Shop</a>
        <a href="add_product.php" class="hover:text-red-500">Add Product</a>
      </nav>
      <div class="text-xl space-x-3">
        <a href="#">🛒</a>
        <a href="#">👤</a>
      </div>
    </div>
  </header>

  <!-- Banner -->
  <section class="bg-cover bg-center h-64" style="background-image: url('https://images.unsplash.com/photo-1606813902983-3ac672e1f705');">
    <div class="bg-black bg-opacity-50 h-full flex items-center justify-center">
      <h1 class="text-white text-4xl font-bold text-center">Mamba Day Collection</h1>
    </div>
  </section>

  <!-- Section: สินค้าใหม่ -->
  <section class="container mx-auto px-6 py-10">
    <h2 class="text-2xl font-bold mb-6 text-center">🆕 สินค้าใหม่ล่าสุด</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <?php while($row = $result->fetch_assoc()): ?>
        <div class="bg-white p-4 rounded-xl shadow hover:shadow-lg transition">
          <img src="<?= $row['image'] ?>" alt="<?= $row['name'] ?>" class="w-full h-48 object-cover rounded mb-3" />
          <h3 class="text-lg font-semibold"><?= $row['name'] ?></h3>
          <p class="text-red-600 font-bold">$<?= $row['price'] ?></p>
        </div>
      <?php endwhile; ?>
    </div>
  </section>

  <!-- Section: โปรโมชั่น -->
  <section class="bg-white py-10 mt-10 shadow-inner">
    <div class="container mx-auto px-6">
      <h2 class="text-2xl font-bold mb-4 text-center">🔥 โปรโมชั่นพิเศษ</h2>
      <div class="text-center text-gray-700 text-lg">
        ซื้อครบ <span class="font-bold text-red-600">$100</span> รับส่วนลดทันที <span class="font-bold text-red-600">10%</span><br>
        ใช้โค้ด: <span class="bg-red-200 text-red-800 px-2 py-1 rounded font-mono">HOOP10</span>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-200 text-center py-4 mt-12 text-sm text-gray-600">
    &copy; <?= date("Y") ?> HoopLife. All rights reserved.
  </footer>

</body>
</html>
