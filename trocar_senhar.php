<?php
if (isset($_POST['submit'])) {
    include_once('config.php');

    $email = $_POST['email'];
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];

    $checkUser = mysqli_query($conn, "SELECT * FROM sign_up WHERE email='$email' AND senha='$currentPassword'");

    if (mysqli_num_rows($checkUser) > 0) {
        $update = mysqli_query($conn, "UPDATE sign_up SET senha='$newPassword' WHERE email='$email'");

        if ($update) {
            echo "<script>alert('Senha alterada com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao atualizar a senha.');</script>";
        }
    } else {
        echo "<script>alert('Email ou senha atual incorretos.');</script>";
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mudar Senha</title>
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
                <form action="trocar_senhar.php" method="POST">
                    <div class="col-4" style="background-color: white; margin-top: 30px; padding-bottom: 40px;">
                        <h3 class="poppins-light" style="padding-top: 50px;">
                            <strong>
                                Trocar Senha
                            </strong>
                        </h3>
                            
                        <p>
                            <div class="form-floating mb-3" style="width: 300px;">
                              <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
                              <label for="floatingInput">Email</label>
                            </div>

                            <div class="form-floating mb-3" style="width: 300px;">
                              <input type="password" class="form-control" name="current_password" id="currentPassword" placeholder="Senha atual" required>
                              <label for="currentPassword">Senha atual</label>
                            </div>

                            <div class="form-floating" style="width: 300px;">
                              <input type="password" class="form-control" name="new_password" id="newPassword" placeholder="Nova senha" minlength="4" required>
                              <label for="newPassword">Nova senha</label>
                            </div>
                        </p>

                        <button type="submit" name ='submit' id="login-button">
                            <i class="bi bi-arrow-right" id="arrow-icon"></i>
                        </button>

                        <p style="margin-top: 30px;">
                            <div class="new">
                                <a href="index.php">Voltar ao login</a>
                            </div>
                        </p>
                    </div>
                </form>
            </center>
        </div>
    </div>
</body>
</html>
