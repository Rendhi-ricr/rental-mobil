<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card img {
            height: 200px;
            /* Pastikan gambar memiliki tinggi konsisten */
            object-fit: cover;
            /* Mengisi area gambar tanpa merusak proporsi */
        }
    </style>

</head>

<body>
    <?= $this->include('layouts-front/nav'); ?>

    <!-- Mobil Populer -->
    <?= $this->renderSection('content') ?>


    <!-- Footer -->
    <?= $this->include('layouts-front/footer'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>