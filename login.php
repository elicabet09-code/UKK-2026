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

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background-color: #9bd5f7;
            font-family: Arial, sans-serif;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 668px;
            min-height: 470px;
            background-color: #ffffff;

            border: 2px solid #168be0;
            border-radius: 17px;

            box-shadow: 0 3px 4px rgba(0, 0, 0, 0.2);

            padding: 32px 55px;
        }

        .login-box h3 {
            text-align: center;
            font-size: 23px;
            color: #000000;
            margin-bottom: 78px;
        }

        .form-group {
            margin-bottom: 19px;
        }

        .form-group label {
            font-size: 16px;
            color: #000000;
            margin-bottom: 3px;
        }

        .form-control {
            height: 47px;
            background-color: #ededed;
            border: none;
            border-radius: 8px;
            font-size: 15px;
        }

        .form-control:focus {
            background-color: #ededed;
            border: 1px solid #9bd5f7;
            box-shadow: none;
        }

        .btn-login {
            display: block;
            width: 96px;
            height: 34px;

            margin: 22px auto 0;

            background-color: #9bd5f7;
            color: #ffffff;

            border: none;
            border-radius: 8px;
            font-size: 16px;
        }

        .btn-login:hover {
            background-color: #79c2ee;
            color: #ffffff;
        }

        .pesan-error {
            font-size: 14px;
            margin-bottom: 20px;
        }

        @media (max-width: 700px) {
            .login-box {
                width: 90%;
                min-height: auto;
                padding: 30px 25px 60px;
            }

            .login-box h3 {
                font-size: 20px;
                margin-bottom: 50px;
            }
        }
    </style>
</head>

<body>

    <div class="login-box">

        <h3>Login Aplikasi Pelanggaran Siswa</h3>

        <?php
        if (isset($_SESSION['pesan_error'])) {
            echo '<div class="alert alert-danger pesan-error">'
                . htmlspecialchars($_SESSION['pesan_error']) .
                '</div>';

            unset($_SESSION['pesan_error']);
        }
        ?>

        <form action="proses_login.php" method="POST" autocomplete="off">

            <div class="form-group">
                <label for="email">Email Address</label>

                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    required
                    autocomplete="off">
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    required
                    autocomplete="new-password">
            </div>

            <button type="submit" class="btn btn-login">
                Login
            </button>

        </form>

    </div>

</body>
</html>