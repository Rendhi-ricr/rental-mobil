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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.btn-sewa').forEach(button => {
            button.addEventListener('click', function() {
                const isLoggedIn = this.getAttribute('data-is-logged-in') === 'true';
                const loginUrl = this.getAttribute('data-login-url'); // URL login ke auth
                const bookingUrl = this.getAttribute('data-booking-url'); // URL booking

                if (!isLoggedIn) {
                    // Jika user belum login, tampilkan SweetAlert
                    Swal.fire({
                        title: 'Harus Login',
                        text: 'Anda harus login untuk melanjutkan proses penyewaan.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Login Sekarang',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Arahkan ke halaman login
                            window.location.href = loginUrl;
                        }
                    });
                } else {
                    // Jika user sudah login, arahkan ke halaman booking
                    window.location.href = bookingUrl;
                }
            });
        });
    </script>


</body>

</html>