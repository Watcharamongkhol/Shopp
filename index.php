<?php
$conn = new mysqli("localhost", "root", "", "shopdb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>HoopLife Shop</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <header class="bg-white shadow-md sticky top-0 z-10">
    <div class="container mx-auto flex justify-between items-center px-6 py-4">
      <div class="text-2xl font-bold text-red-600">🏀 HOOPLIFE</div>
      <nav class="space-x-6 text-sm hidden md:block">
        <a href="home.php" class="hover:text-red-500">Home</a>
        <a href="index.php" class="text-red-600 font-semibold">Shop</a>
        <a href="add_product.php" class="hover:text-red-500">Add Product</a>
        <a href="size_chart.php" class="hover:text-red-500">Size Chart</a>
      </nav>
      <div class="text-xl space-x-3">
        <a href="#">🛒</a>
        <a href="#">👤</a>
      </div>
    </div>
  </header>

  <!-- ปุ่มเพิ่มสินค้า -->
  <div class="container mx-auto px-6 mt-6 flex justify-end">
    <a href="add_product.php" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition text-sm">
      ➕ เพิ่มสินค้า
    </a>
  </div>

  <!-- Section: สินค้า -->
  <section class="container mx-auto px-6 py-6">
    <h2 class="text-2xl font-bold mb-6 text-center text-red-600">🛍 สินค้าทั้งหมด</h2>
    <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3">
      <?php while($row = $result->fetch_assoc()): ?>
        <div class="bg-white p-4 rounded-xl shadow hover:shadow-lg transition">
          <img src="<?= $row['image'] ?>" alt="<?= $row['name'] ?>" class="w-full h-52 object-cover rounded-md mb-3" />
          <h3 class="text-lg font-semibold mb-1"><?= $row['name'] ?></h3>
          <p class="text-red-600 text-md font-bold mb-2">$<?= $row['price'] ?></p>
          <button class="w-full bg-gray-800 text-white py-2 rounded hover:bg-gray-900 transition">สั่งซื้อ</button>
        </div>
      <?php endwhile; ?>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-200 text-center py-4 mt-12 text-sm text-gray-600">
    &copy; <?= date("Y") ?> HoopLife. All rights reserved.
  </footer>

</body>
</html>