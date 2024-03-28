<?php
include('db.php');  //database connection

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <title>SHOP</title>
</head>
<style>
    body{
        font-family: "Poppins", sans-serif;
        background-image: url("./photos/téléchargement.jpg");

    }
    .main{
        display: flex;
        justify-content: center;
    }
    .container{
        margin-top: 100px;
    }
    .container .btnindex{
        padding: 5px 20px;
        background-color: #2f002c;
        color: #f8f9fa;
        font-weight: 400;
        border-radius: 15px;
        text-decoration: none;
        border: 1px solid #f8f9fa;
    }
    
.table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ddd; /* Ajoute une bordure à la table */
    border-radius: 8px;
    margin-top: 20px;
}

.table th, .table td {
    padding: 12px;
    text-align: left;
}

.table th {
    background-color: #f2f2f2;
    font-weight: bold;
    color: #333; /* Couleur du texte pour les en-têtes */
}

.table tbody tr:hover {
    background-color: #f5f5f5;
}

.table tbody tr:nth-child(even) {
    background-color: #fafafa;
}

.table img {
    max-width: 100px;
    height: auto;
    display: block; /* Pour centrer les images horizontalement */
    margin: 0 auto; /* Pour centrer les images horizontalement */
}

.table th:last-child,
.table td:last-child {
    text-align: center;
}

</style>

<body>
    <div class="main">
        <div class="container">
            <a href="index.php" type="button" class="btnindex">Log out</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Réference</th>
                        <th scope="col">Libellé</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Description</th>
                        <th scope="col">Type</th>
                        <th scope="col">Photo Produit</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `produit`";
                    $res = mysqli_query($conn,  $sql);
                    while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                        <tr>
                            <th scope="col"><?php echo $row['RefPdt']; ?></th>
                            <th scope="col"><?php echo $row['libPdt']; ?></th>
                            <th scope="col"><?php echo $row['Prix']; ?></th>
                            <th scope="col"><?php echo $row['Qte']; ?></th>
                            <th scope="col"><?php echo $row['description']; ?></th>
                            <th scope="col"><?php echo $row['type']; ?></th>
                            <th scope="col"><img src="./photos/<?php echo $row['image']; ?>" width="100px" /></th>
                            <th scope="col"><a href="./detailleuser.php?RefPdt=<?php echo $row['RefPdt']; ?>"><i class="fa-solid fa-eye fa-xl" style="color: #000000; margin: 0px 10px;"></i></a></th>
                        </tr>;
                    <?php
                    }


                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");
  </style>
</body>

</html>