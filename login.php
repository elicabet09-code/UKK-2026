<?php
// login.php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Pelanggaran Siswa</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Segoe UI', Arial, sans-serif;

            display: flex;
            justify-content: center;
            align-items: center;

            background: linear-gradient(
                135deg,
                #dff3ff,
                #a9ddfa,
                #eaf7ff
            );
        }

        .login-container {
            width: 420px;
            max-width: 92%;
        }

        .login-box {
            background: #ffffff;
            padding: 40px 38px;
            border-radius: 22px;

            border: 1px solid #e4f2fc;

            box-shadow:
                0 15px 45px rgba(56, 142, 190, 0.15);
        }

        .login-icon {
            width: 75px;
            height: 75px;

            margin: 0 auto 20px;

            display: flex;
            justify-content: center;
            align-items: center;

            background: #e5f5ff;
            color: #2999dc;

            border-radius: 22px;
            font-size: 32px;
        }

        .login-box h3 {
            text-align: center;
            font-size: 24px;
            font-weight: 700;
            color: #263746;

            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #8999a7;
            font-size: 14px;
            margin-bottom: 32px;
        }

        .form-group {
            margin-bottom: 21px;
        }

        .form-group label {
            font-size: 14px;
            font-weight: 600;
            color: #405364;
            margin-bottom: 8px;
        }

        .input-group {
            height: 49px;
            background: #f5faff;
            border: 1px solid #e1edf5;
            border-radius: 10px;
            overflow: hidden;
        }

        .input-group-text {
            background: transparent;
            border: none;
            color: #72acd0;
            padding-left: 15px;
        }

        .form-control {
            height: 47px;
            background: transparent;
            border: none;
            font-size: 14px;
            color: #34495e;
        }

        .form-control:focus {
            background: transparent;
            box-shadow: none;
            border: none;
        }

        .input-group:focus-within {
            border-color: #79c4ed;
            box-shadow: 0 0 0 3px rgba(121, 196, 237, 0.15);
        }

        .btn-login {
            width: 100%;
            height: 49px;

            margin-top: 12px;

            border: none;
            border-radius: 10px;

            background: linear-gradient(
                135deg,
                #55b5eb,
                #258ed0
            );

            color: white;
            font-size: 15px;
            font-weight: 600;

            transition: 0.3s;
        }

        .btn-login:hover {
            background: linear-gradient(
                135deg,
                #329edb,
                #197ab8
            );

            transform: translateY(-2px);
            box-shadow: 0 7px 15px rgba(37, 142, 208, 0.25);
            color: white;
        }

        .footer-text {
            text-align: center;
            font-size: 12px;
            color: #a0adb8;
            margin-top: 27px;
            margin-bottom: 0;
        }

        .pesan-error {
            font-size: 13px;
            border-radius: 9px;
        }

        @media (max-width: 480px) {
            .login-box {
                padding: 32px 24px;
            }

            .login-box h3 {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

<div class="login-container">

    <div class="login-box">

        <!-- Ikon Aplikasi -->
        <div class="login-icon">
            <i class="fas fa-user-shield"></i>
        </div>

        <!-- Judul -->
        <h3>Selamat Datang!</h3>

        <p class="subtitle">
            Silakan login ke Aplikasi Pelanggaran Siswa
        </p>

        <!-- Pesan Error -->
        <?php
        if (isset($_SESSION['pesan_error'])) {
            echo '<div class="alert alert-danger pesan-error">'
                . htmlspecialchars($_SESSION['pesan_error']) .
                '</div>';

            unset($_SESSION['pesan_error']);
        }
        ?>

        <!-- Form Login -->
        <form action="proses_login.php" method="POST" autocomplete="off">

            <!-- Email -->
            <div class="form-group">

                <label for="email">Email Address</label>

                <div class="input-group">

                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        placeholder="Masukkan email Anda"
                        required
                        autocomplete="off">

                </div>

            </div>

            <!-- Password -->
            <div class="form-group">

                <label for="password">Password</label>

                <div class="input-group">

                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        placeholder="Masukkan password"
                        required
                        autocomplete="new-password">

                </div>

            </div>

            <!-- Tombol Login -->
            <button type="submit" class="btn btn-login">
                Login <i class="fas fa-arrow-right ml-2"></i>
            </button>

        </form>

        <!-- Footer -->
        <p class="footer-text">
            &copy; 2026 Aplikasi Pelanggaran Siswa
            <br>
            Sistem Informasi Sekolah
        </p>

    </div>

</div>

</body>
</html>