<?php
// Inclusion du fichier de configuration de la base de données
include ('db.php');

// Vérification si le formulaire a été soumis
if (isset($_POST["submit"])) {
    // Récupération des données du formulaire
    $RefPdt = mysqli_real_escape_string($conn, $_POST['RefPdt']);
    $libPdt = mysqli_real_escape_string($conn, $_POST['libPdt']);
    $Prix = mysqli_real_escape_string($conn, $_POST['Prix']);
    $Qte = mysqli_real_escape_string($conn, $_POST['Qte']);
    $Description = mysqli_real_escape_string($conn, $_POST['Description']);
    $Type = mysqli_real_escape_string($conn, $_POST['Type']);

    // Gestion du téléchargement de l'image
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $image_path = 'photos/' . $image;
    move_uploaded_file($image_temp, $image_path);

    // Requête SQL pour insérer les données dans la table "produit"
    $sql = "INSERT INTO produit (RefPdt, libPdt, Prix, Qte, Description, image, Type) 
            VALUES ('$RefPdt', '$libPdt', '$Prix', '$Qte', '$Description', '$image', '$Type')";
    
    // Exécution de la requête SQL
    $result = mysqli_query($conn, $sql);

    // Vérification si l'insertion a réussi
    if ($result) {
        // Redirection vers une autre page avec un message de confirmation
        header("Location: admininter.php?msg=New record created successfully");
        exit();
    } else {
        // Affichage d'une erreur en cas d'échec de l'insertion
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PHP CRUD Application</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
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
        color: #fff;
        }
    .custom-container {
    margin: 20px auto;
    width: 80%;
}

.custom-form {
    width: 50vw;
    min-width: 300px;
}

.custom-form .row {
    margin-bottom: 20px;
}

.custom-form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.custom-form input[type="text"],
.custom-form input[type="file"] {
    width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: transparent;
        color: #fff;
        margin: 10px;
}

.custom-form .buttons {
    margin-top: 20px;
}

.custom-form .buttons button {
    padding: 10px 20px;
        background-color: #2f002c;
        color: #fff;
        border: 1px solid #f8f9fa;
        border-radius: 4px;
        cursor: pointer;
}

.custom-form .buttons a {
    padding: 10px 20px;
        background-color: #f8f9fa;
        color: #2f002c;
        border: 1px solid #2f002c;
        border-radius: 4px;
        text-decoration: none;
        margin-left: 10px;
}

</style>
<body>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New Product</h3>
        </div>

        <div class="custom-container">
            <form action="" method="post" enctype="multipart/form-data" class="custom-form">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">RefPdt</label>
                        <input type="text" class="form-control" name="RefPdt" placeholder="Product Reference">
                    </div>

                    <div class="col">
                        <label class="form-label">libPdt</label>
                        <input type="text" class="form-control" name="libPdt" placeholder="Product Name">
                    </div>

                    <div class="col">
                        <label class="form-label">Prix</label>
                        <input type="text" class="form-control" name="Prix" placeholder="Price">
                    </div>

                    <div class="col">
                        <label class="form-label">Qte</label>
                        <input type="text" class="form-control" name="Qte" placeholder="Quantity">
                    </div>

                    <div class="col">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" name="Description" placeholder="Description">
                    </div>

                    <div class="col">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Product Image">
                    </div>

                    <div class="col">
                        <label class="form-label">Type</label>
                        <input type="text" class="form-control" name="Type" placeholder="Product Type">
                    </div>
                </div>

                <div class="buttons">
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="admininter.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>