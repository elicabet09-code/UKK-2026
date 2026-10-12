<?php

session_start();

// Jika sudah login, langsung ke dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
<script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Login Pelanggaran Siswa</title>
</head>

<body>
       <title>Dashboard</title>
    <script type="importmap">
{
  "imports": {
    "@floating-ui/dom": "https://cdn.jsdelivr.net/npm/@floating-ui/dom@1.7.6/dist/floating-ui.dom.esm.min.js",
    "vanilla-calendar-pro": "https://cdn.jsdelivr.net/npm/vanilla-calendar-pro@3.4.0/index.mjs"
  }
}
</script>
<script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.min.js" integrity="sha384-BJf/nQgxZJU68GxBse97Vdlc8Rh+z9PzzXiS3/BjV+1nQPR7IKn+iJnD3DJvCMaU" crossorigin="anonymous"></script>

    <h1>Login Aplikasi Pelanggaran Siswa</h1>

    <?php

    if (isset($_SESSION['pesan_error'])) {

        echo "<p>" . htmlspecialchars($_SESSION['pesan_error']) . "</p>";

        unset($_SESSION['pesan_error']);
    }

    ?>
<!-- 
    <form action="proses_login.php" method="POST" autocomplete="off">

        <table>

            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                    <input
                        type="email"
                        name="email"
                        value=""
                        autocomplete="off"
                        required>
                </td>
            </tr>

            <tr>
                <td>Password</td>
                <td>:</td>
                <td>
                    <input
                        type="password"
                        name="password"
                        value=""
                        autocomplete="new-password"
                        required>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <input type="submit" value="Login">
                </td>
            </tr>

        </table>

    </form> -->

<form action="proses_login.php" method="POST" autocomplete="off">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-primary">Login</button>
</form>

</body>

</html>