<?php
if (isset($_POST['logInSubmit'])) {
    if ($_POST['username'] == "admin" && $_POST['password'] == "admin") {
        header('Location: admin.php');

    } else {
        echo "
        <script>
        alert('The username or Password are wrong')
        </script>";
        header('refresh:0.1;url=login.php');
    }
}
