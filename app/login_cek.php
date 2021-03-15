<?php
    
    include 'login_function.php';

    if (isset($_POST['login'])) {
        $username = anti_injection($_POST['username']);
        $pass = anti_injection(md5($_POST['password']));

            if ($username != "" && $pass != "") {
                $sql_query = "SELECT * FROM adspd WHERE username='$username' AND password='$pass'";
                $result = mysqli_query($konek, $sql_query);
                $row = mysqli_num_rows($result);

                if ($row > 0) {
                    $q = mysqli_fetch_assoc($result);
                    $token = getToken(10);
                    $_SESSION['username'] = $username;
                    $_SESSION['namadmin'] = $q['namadmin'];
                    $_SESSION['token'] = $token;

                    $result_token = mysqli_query($konek, "SELECT * FROM tbl_token");
                    $row_token = mysqli_num_rows($result_token);

                    if ($row_token > 0) {
                        mysqli_query($konek, "UPDATE tbl_token SET token='$token' WHERE username='$username'");
                    } else {
                        mysqli_query($konek, "INSERT INTO tbl_token (username,token) VALUES ('$username','$token')");
                    }
                    
                    header('Location: index.php');
                } else {
                ?>
                    <script>
                        alert('Email dan Password anda tidak valid!');
                    </script>
                <?php
                }
            } else {
                ?>
                    <script>
                        alert('Masukkan Email dan Password anda!');
                    </script>
                <?php
            }
    }