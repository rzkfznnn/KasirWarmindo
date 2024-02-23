<?php
@ob_start();
session_start();

// Cek apakah sudah login dan memiliki akses admin
if (isset($_SESSION['admin']) && $_SESSION['admin']['status'] == 1) {
    // Hanya admin yang dapat mengakses halaman ini
    if (isset($_POST['register'])) {
        require 'config.php';

        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);
        $level = strip_tags($_POST['id_member']);
        $nama = strip_tags($_POST['nm_member']);
        $alamat = strip_tags($_POST['alamat_member']);
        $telepon = strip_tags($_POST['telepon']);
        $email = strip_tags($_POST['email']);
        $gambar = ''; // Anda perlu menyesuaikan proses upload gambar jika diperlukan
        $nik = strip_tags($_POST['NIK']);
        $status = strip_tags($_POST['id_member']);

        // Insert user data into the login table
        $insertLoginSql = 'INSERT INTO member (id_member, nm_member, alamat_member, telepon, email, gambar, NIK, status, user, pass) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, md5(?))';
        $insertLoginStmt = $config->prepare($insertLoginSql);
        $insertLoginStmt->execute([$nama, $alamat, $telepon, $email, $gambar, $nik, $status, $user, $pass]);

        echo '<script>alert("Registration successful. Please welcome our new employee!.");window.location="login.php"</script>';
    }
} else {
    // Jika bukan admin, beri pesan alert dan kembalikan ke halaman sebelumnya
    echo '<script>alert("Hanya Admin Yang Dapat Mengakses Ini!");history.go(-1);</script>';
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register - BeGood.Inc & Co</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body style="background-color: #white;">
    <div class="container">
        <!-- ... (Your existing HTML structure) ... -->

        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="h4 text-gray-900 mb-4"><b>Register</b></h4>
                            </div>
                            <form class="form-register" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="user" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="pass" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nm_member" placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="alamat_member" placeholder="Alamat" required>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control form-control-user" name="telepon" placeholder="No_telp" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="NIK" placeholder="NIK" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_member">Level:</label>
                                    <select class="form-control" name="id_member" required>
                                        <option value="1">Admin</option>
                                        <option value="2">Petugas</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary btn-block" name="register" type="submit"><i class="fa fa-user-plus"></i>
                                    REGISTER</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>