<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOOD WASTE</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "good_waste";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$success_message = $error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $business_name = $conn->real_escape_string($_POST['business_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $social_media = $conn->real_escape_string($_POST['social_media']);
    $business_category = $conn->real_escape_string($_POST['business_category']);

    $sql = "INSERT INTO businesses (business_name, email, phone_number, social_media, business_category) VALUES ('$business_name', '$email', '$phone_number', '$social_media', '$business_category')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.html");
        exit();
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mt-5">Registrasi Bisnis</h2>

                <?php if ($error_message): ?>
                    <div class="alert alert-danger"><?php echo $error_message; ?></div>
                <?php endif; ?>

                <?php if ($success_message): ?>
                    <div class="alert alert-success"><?php echo $success_message; ?></div>
                <?php endif; ?>

                <form action="" method="post">
                    <div class="form-group">
                        <label for="business_name">Nama Bisnis</label>
                        <input type="text" name="business_name" class="form-control" id="business_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Nomor Telepon</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+62</span>
                            </div>
                            <input type="text" name="phone_number" class="form-control" id="phone_number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="social_media">Akun Media Sosial Bisnis</label>
                        <input type="text" name="social_media" class="form-control" id="social_media">
                    </div>
                    <div class="form-group">
                        <label for="business_category">Kategori Bisnis</label>
                        <select name="business_category" class="form-control" id="business_category" required>
                            <option value="Restoran">Restoran</option>
                            <option value="Hotel">Hotel</option>
                            <option value="Supermarket">Supermarket</option>
                            <option value="Produksi Rumahan">Produksi Rumahan</option>
                            <option value="Cake and Bakery">Cake and Bakery</option>
                            <option value="Warung Makan">Warung Makan</option>
                            <option value="Cafe and Coffee Shop">Cafe and Coffee Shop</option>
                        </select>
                    </div>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>