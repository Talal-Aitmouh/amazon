
<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['password'];

    // Utilisation de requêtes préparées pour éviter les injections SQL
    $sql = 'SELECT * FROM utilisateur WHERE login = ? AND password = ?';

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
    mysqli_stmt_execute($stmt);

    // Récupération du résultat
    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($res);

    // Vérification des informations de connexion
    if ($row) {
        // Redirection en fonction du type d'utilisateur
        if ($row['type'] == 'user') {
            header('location:userinter.php');
            exit();
        } else if ($row['type'] == 'administrateur') {
            header('location:admininter.php');
            exit();
        } else {
            echo 'Invalid user type';
        }
    } else {
        echo 'Password or username incorrect';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: "Poppins", sans-serif;
        background-image: url("./photos/téléchargement.jpg");
        background-size: cover;
        }

        .login-box {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 400px;
        padding: 40px;
        margin: 20px auto;
        transform: translate(-50%, -55%);
        background: linear-gradient(174deg, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 31%, rgba(255,255,255,0.4290966386554622) 100%);
        backdrop-filter: blur(3px);
        box-sizing: border-box;
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
        border-radius: 10px;
      }

      .login-box .user-box {
        position: relative;
      }
      .login-box .img img{
        width: 200px;
        margin: 0 auto;
        display: flex;
        justify-content: center;
      }
      .login-box .user-box input {
        width: 100%;
        padding: 10px 0;
        font-size: 16px;
        color: #2f002c;
        margin-bottom: 30px;
        border: none;
        border-bottom: 1px solid #2f002c;
        outline: none;
        background: transparent;
      }

      .login-box .user-box label {
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px 0;
        font-size: 16px;
        color: #2f002c;
        pointer-events: none;
        transition: 0.5s;
      }

      .login-box .user-box input:focus ~ label,
      .login-box .user-box input:valid ~ label {
        top: -20px;
        left: 0;
        color: #2f002c;
        font-size: 12px;
      }
      .login-box  form button[type="submit"]{
        padding: 5px 10px;
        background-color: #2f002c;
        color: #f8f9fa;
        border-radius: 15px;
        font-size: 15px;
        cursor:pointer;
      }
    </style>
</head>

<body>
    <div class="login-box">
        <div class="img">
        <img src="./photos/amazon-logo.png" alt="">
        </div>
        <form action="#" method="POST">
            <div class="user-box">
                <input type="text" name="user" class="form-control" required />
                <label class="form-label" for="user">Login</label>
            </div>

            <div class="user-box">
                <input type="password" name="password" class="form-control" required />
                <label class="form-label" for="password">Password</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
        </form>
    </div>
</body>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");
  </style>
</html>
