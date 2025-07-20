<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Size Chart - HoopLife</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <header class="bg-white shadow-md sticky top-0 z-10">
    <div class="container mx-auto flex justify-between items-center px-6 py-4">
      <div class="text-2xl font-bold text-red-600">🏀 HOOPLIFE</div>
      <nav class="space-x-6 text-sm hidden md:block">
        <a href="home.php" class="hover:text-red-500">Home</a>
        <a href="index.php" class="hover:text-red-500">Shop</a>
        <a href="add_product.php" class="hover:text-red-500">Add Product</a>
        <a href="size_chart.php" class="text-red-600 font-semibold">Size Chart</a>
      </nav>
    </div>
  </header>

  <!-- Section: Size Chart -->
  <section class="container mx-auto px-6 py-10">
    <h2 class="text-3xl font-bold text-center mb-8 text-red-600">📏 ตารางไซส์สินค้า</h2>

    <!-- Size Chart: เสื้อ -->
    <div class="mb-10">
      <h3 class="text-xl font-semibold mb-4">👕 ไซส์เสื้อ (Shirts)</h3>
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow-md">
          <thead class="bg-gray-200 text-gray-700">
            <tr>
              <th class="py-3 px-4 text-left">ขนาด</th>
              <th class="py-3 px-4 text-left">รอบอก (นิ้ว)</th>
              <th class="py-3 px-4 text-left">ความยาวเสื้อ (นิ้ว)</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-t">
              <td class="py-3 px-4">S</td>
              <td class="py-3 px-4">36-38</td>
              <td class="py-3 px-4">26</td>
            </tr>
            <tr class="border-t">
              <td class="py-3 px-4">M</td>
              <td class="py-3 px-4">39-41</td>
              <td class="py-3 px-4">27</td>
            </tr>
            <tr class="border-t">
              <td class="py-3 px-4">L</td>
              <td class="py-3 px-4">42-44</td>
              <td class="py-3 px-4">28</td>
            </tr>
            <tr class="border-t">
              <td class="py-3 px-4">XL</td>
              <td class="py-3 px-4">45-47</td>
              <td class="py-3 px-4">29</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Size Chart: กางเกง -->
    <div class="mb-10">
      <h3 class="text-xl font-semibold mb-4">🩳 ไซส์กางเกง (Shorts)</h3>
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow-md">
          <thead class="bg-gray-200 text-gray-700">
            <tr>
              <th class="py-3 px-4 text-left">ขนาด</th>
              <th class="py-3 px-4 text-left">รอบเอว (นิ้ว)</th>
              <th class="py-3 px-4 text-left">ความยาวขา (นิ้ว)</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-t">
              <td class="py-3 px-4">S</td>
              <td class="py-3 px-4">28-30</td>
              <td class="py-3 px-4">18</td>
            </tr>
            <tr class="border-t">
              <td class="py-3 px-4">M</td>
              <td class="py-3 px-4">31-33</td>
              <td class="py-3 px-4">19</td>
            </tr>
            <tr class="border-t">
              <td class="py-3 px-4">L</td>
              <td class="py-3 px-4">34-36</td>
              <td class="py-3 px-4">20</td>
            </tr>
            <tr class="border-t">
              <td class="py-3 px-4">XL</td>
              <td class="py-3 px-4">37-39</td>
              <td class="py-3 px-4">21</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- หมายเหตุ -->
    <div class="bg-yellow-100 text-yellow-800 p-4 rounded">
      📌 <strong>หมายเหตุ:</strong> ขนาดอาจคลาดเคลื่อน ±1 นิ้ว ขึ้นอยู่กับการวัดและการผลิต
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-200 text-center py-4 mt-12 text-sm text-gray-600">
    &copy; <?= date("Y") ?> HoopLife. All rights reserved.
  </footer>

</body>
</html>
