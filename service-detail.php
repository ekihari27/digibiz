<?php
include "db.php";

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM services WHERE id = $id");
$data = mysqli_fetch_assoc($query);

$features = json_decode($data['features'], true);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $data['title']; ?> - Detail Layanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-off-white">

    <div class="max-w-4xl mx-auto px-6 py-20">

        <img src="<?= $data['image']; ?>" class="w-full h-[400px] object-cover rounded-3xl mb-10">

        <h1 class="font-display text-5xl font-black mb-4"><?= $data['title']; ?></h1>

        <p class="text-gray-600 text-lg mb-6"><?= $data['short_desc']; ?></p>

        <h2 class="font-bold text-2xl mb-3">Detail Layanan</h2>
        <p class="text-gray-700 leading-relaxed mb-8"><?= nl2br($data['long_desc']); ?></p>

        <h2 class="font-bold text-2xl mb-3">Fitur</h2>
        <ul class="list-disc pl-6 mb-8">
            <?php foreach ($features as $f): ?>
                <li class="text-gray-700"><?= $f; ?></li>
            <?php endforeach; ?>
        </ul>

        <h2 class="font-bold text-2xl mb-3">Harga</h2>
        <p class="text-electric-blue text-3xl font-black mb-10">Rp <?= number_format($data['price'], 0, ',', '.'); ?></p>

        <a href="packages.html"
           class="px-6 py-3 bg-black text-white rounded-full font-bold hover:bg-electric-blue transition">
           Pesan Sekarang
        </a>

    </div>

</body>
</html>
