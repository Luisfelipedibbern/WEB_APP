<?php
    if(isset($_POST['submit'])){

        include_once('config.php');

        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $number = $_POST['number'];

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sign_up WHERE email='$email'")) > 0) {
            echo "<script>alert('Email already registered. Please use a different email.');</script>";
        } else {
            $result = mysqli_query($conn, "INSERT INTO sign_up(email, senha, nome, numero) VALUES('$email', '$password', '$name', '$number')");
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <style>
        body {
            background-color: #1e0f67ff;
        }

        a{
            text-decoration: none;
            color: gray;
        }
        a:hover{
            color: #52606D;
        }
        #login-button {
            border-radius: 15px;
            width: 50px;
            height: 50px;
            margin-top: 10px;
            background-color: white;
            border: 2px solid gray;
        }
        #arrow-icon {
            color: gray;
            font-size: 20px;
            border: gray;
        }
        #login-button:hover{
            border: 2px solid #52606D;
            color: #52606D;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <center>
                <form action="sign_up.php" method="POST">
                    <div class="col-4" style="background-color: white; margin-top: 30px; padding-bottom: 40px;">
                        <h3 class="poppins-light" style="padding-top: 50px;">
                            <strong>
                                Sign up
                            </strong>
                        </h3>
                            
                        <p>
                        
                            <div class="form-floating mb-3" style="width: 300px;">
                              <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
                              <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating" style="width: 300px;">
                              <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" minlength="4" required>
                              <label for="floatingPassword">Password</label>
                            </div>
                        </p>
                            
                        <p>
                            <div class="form-floating mb-3" style="width: 300px;">
                              <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                              <label for="floatingInput">Name</label>
                            </div>

                            <div class="form-floating mb-3" style="width: 300px;">
                              <input type="number" class="form-control" name="number" id="number" placeholder="Number" required>
                              <label for="floatingInput">Number</label>
                            </div>
                        </p>

                        <button type="submit" name ='submit' id="login-button">
                            <i class="bi bi-arrow-right" id="arrow-icon"></i>
                        </button>

                        <p style="margin-top: 30px;">
                            <div class="new">
                                <a href="index.php">Já possui uma conta?</a>
                            </div>
                        </p>
                    </div>
                </form>
            </center>
        </div>
    </div>
</body>
</html>