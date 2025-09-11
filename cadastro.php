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
    <title>Edit</title>
    <style>
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
<body style="background-color: lightgray;">
    <ul class="nav justify-content-end" style="background-color: white;">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#" style="color: black;">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#" style="color: black;">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="configuracao_user.php">
        <i class="bi bi-gear-fill" style="color: black;"></i>
    </a>
  </li>
  <li class="nav-item">
    <a href="home.php" class="nav-link">
        <i class="bi bi-house-door-fill" style="color: black;"></i>
    </a>
  </li>
</ul>
<div class="container">
        <div class="row">
            <center>
                <form action="sign_up.php" method="POST">
                    <div class="col-4" style="background-color: white; margin-top: 30px; padding-bottom: 40px;">
                        <h3 class="poppins-light" style="padding-top: 50px;">
                            <strong>
                                Edit
                            </strong>
                        </h3>
                            
                        <p>
                        
                            <div class="form-floating mb-3" style="width: 300px;">
                              <input type="password" class="form-control" name="password" id="floatingpassword" placeholder="name@example.com" required>
                              <label for="floatingpassword">Actual Password</label>
                            </div>
                            <div class="form-floating" style="width: 300px;">
                              <input type="password" class="form-control" name="confirm_password1" id="floatingPassword" placeholder="Password" minlength="4" required>
                              <label for="floatingPassword">Confirm Password</label>
                            </div>
                        </p>
                            
                        <p>
                            <div class="form-floating mb-3" style="width: 300px;">
                              <input type="password" class="form-control" name="new_password" id="password_confirm" placeholder="Name" required>
                              <label for="floatingPassword">New Password</label>
                            </div>
                        </p>
                        <br>

                        <button type="submit" name ='submit' id="login-button">
                            <i class="bi bi-arrow-right" id="arrow-icon"></i>
                        </button>
                        </p>
                    </div>
                </form>
            </center>
        </div>
    </div>
</body>
</html>