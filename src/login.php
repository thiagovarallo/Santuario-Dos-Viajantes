<?php 

    if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
        include_once "../connection.php";

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');


        $sql = "SELECT * FROM users WHERE email = :email;";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(":email", $email);
        $statement->execute();

        $userData = $statement->fetch(PDO::FETCH_ASSOC);

        $correctPassword = password_verify($password, $userData['password'] ?? '');
        
        if ($correctPassword) {
            session_start();
            $_SESSION["Logged"] = true;
            $_SESSION["Name"] = $userData["name"];
            $_SESSION["Role"] = $userData["role"];
            $_SESSION["First_login"] = $userData["first_login"];
            $_SESSION["Email"] = $userData["email"];
            $_SESSION["Id_user"] = $userData["id"];

            if ($userData["role"] == "admin") {
                header( 'Location: ./adminReserva.php' );
            } else {
                header( 'Location: /' );
            }

        } else {
            header('location: ./login.php?success=0');
        }

    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="./js/login.js" defer></script>
</head>
<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">bem vindo!</h2>
                <p class="description description-primary">Para manter-se conectado conosco</p>
                <p class="description description-primary">faça o login com suas informações pessoais</p>
                <button id="signin" class="btn btn-primary">Entrar</button>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Criar uma conta</h2>
                <p class="description description-second">Insere seus dados para realizar o cadastro:</p>
                <form class="form" method="get" action="./operation/createUser.php">
                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" placeholder="Name" name="name" required minlength="3">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="Email" name="email" required>
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" name="password" minlength="5" required>
                    </label>
                    
                    
                    <button class="btn btn-second">inscrever-se</button>        
                </form>
            </div>
        </div>
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">Seja bem vindo!</h2>
                <p class="description description-primary">Insira seus dados pessoais</p>
                <p class="description description-primary">e comece a jornada conosco</p>
                <button id="signup" class="btn btn-primary">inscrever-se</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Login</h2>
                
                <p class="description description-second">Insera seus dados para realizar o login:</p>
                <form class="form" method="post" action="./login.php">
                
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="Email" name="email">
                    </label>
                
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" name="password">
                    </label>
                
                    <button class="btn btn-second">entrar</button>
                </form>
            </div>
        </div>>
    </div>
</body>
</html>