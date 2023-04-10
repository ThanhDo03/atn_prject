<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kid Store - Sign up / Login Form</title>
    <link rel="stylesheet" href="./css/style_Welcome.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <!DOCTYPE html>
    <html>

    <head>
        <title>Slide Navbar</title>
        <link rel="stylesheet" type="text/css" href="slide navbar style.css">
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">

            <div class="signup">
                <form method="POST">
                    <label for="chk" aria-hidden="true">Sign up</label>
                    <input type="text" name="name" placeholder="User name" required="">
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="pswd" placeholder="Password" required="">
                    <button type="submit" name="submit">Sign up</button>
                </form>
            </div>

            <div class="login">
                <form method="POST">
                    <label for="chk" aria-hidden="true">Login</label>
                    <input type="email" name="email_login" placeholder="Email" required="">
                    <input type="password" name="pswd_login" placeholder="Password" required="">
                    <button type="submit" name="submit1">Login</button>
                </form>
            </div>
        </div>

        <?php
        $connect = mysqli_connect('localhost', 'root', '', 'toyskid_project');
        if (!$connect) {
            echo "Not Connect";
        }
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pswd'];
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name','$email','$pass')";
            $result = mysqli_query($connect, $sql);
            if ($result) {
                echo "<script>alert('Sign Up Success!!')</script>";
            } else {
                echo "<script>alert('Registration failed!!!!')</script>";
            }
        }
        ?>

        <?php
        session_start();
        $connect = mysqli_connect('localhost', 'root', '', 'toyskid_project');
        if (!$connect) {
            # code...
            echo "Not Connect!!";
        }
        if (isset($_POST['submit1'])) {
            # code...
            $useremail = $_POST['email_login'];
            $userpassw = $_POST['pswd_login'];
            $sql = " SELECT * FROM users WHERE email = '$useremail' AND password = '$userpassw'";
            $result = mysqli_query($connect, $sql);
            $count_rows = mysqli_num_rows($result);
            if ($count_rows == 0) {
                echo "<script> alert('Wrong username or password!!!')</script>";
            } else if ($useremail == 'admin@gmail.com' and $userpassw == 'admin123admin') {
                echo "<script>window.open('Admin/Management.php','_self')</script>";
                $_SESSION['Welcome']['useremail'] = $useremail;
            } else {
                echo "<script> alert($username'Logged in successfully!!')</script>";
                echo "<script>window.open('index.php','_self')</script>";
                $_SESSION['Welcome']['useremail'] = $useremail;
            }
        }
        ?>
    </body>

    </html>
    <!-- partial -->
</body>

</html>