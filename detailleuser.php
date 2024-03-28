<?php
include('db.php');
if (isset($_GET['RefPdt'])) {
    $ref = mysqli_real_escape_string($conn, $_GET['RefPdt']);

    // Fetch product details based on the reference
    $sql = "SELECT * FROM `produit` WHERE RefPdt = '$ref'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="./css/detail.css">
            <title>Product Detail</title>
        </head>
        <style>
            *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-family: "Poppins", sans-serif;
        background-image: url("./photos/téléchargement.jpg");
}

.container{
    width: 80%;
    height: 80%;
    display: flex;
    
}
.container .image{
    width: 100%;
    height: 100%;
    border-radius: 20px;
}
.image img{
    width: 100%;
    height: 100%;
    object-fit: fill;
}
.container .details{
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}.details .info{
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 0%, rgba(255,255,255,0.4290966386554622) 100%);
}
.info h4{
    font-size: 1.4em;
    border: 1px solid black;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.retour{
    width: 20%;
    height: 6vh;
    margin-top: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1.1em;
    color: #f8f9fa;
    border: 1px solid #f8f9fa;
    text-decoration: none;
    list-style: none;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    text-transform: uppercase;
    background-color: #2f002c;
    border-radius: 20px;
}
        </style>
        <body>
            <div class="container">
                <div class="image">
                    <img src="./photos/<?php echo $row['image']; ?>" width="200px" alt="">
                </div>
                <div class="details">
                    <div class="info">
                        <h4>Réference Produit</h4>
                        <h4><?php echo $row['RefPdt']; ?></h4>
                    </div>
                    <div class="info">
                        <h4>Libélle produit</h4>
                        <h4><?php echo $row['libPdt']; ?></h4>
                    </div>
                    <div class="info">
                        <h4>Prix Prod</h4>
                        <h4><?php echo $row['Prix']; ?></h4>
                    </div>
                    <div class="info">
                        <h4>Quantité produit</h4>
                        <h4><?php echo $row['Qte']; ?></h4>
                    </div>
                    <div class="info">
                        <h4>Description produit</h4>
                        <h4><?php echo $row['description']; ?></h4>
                    </div>
                    <div class="info">
                        <h4>Type Produit</h4>
                        <h4><?php echo $row['type']; ?></h4>
                    </div>
                </div>
            </div>
            <a class='retour' href="./userinter.php">Retour</a>
        </body>
        <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");
  </style>
        </html>
<?php
    } else {
        // Product not found
        echo "Product not found.";
    }
} else {
    // No product reference provided in the URL
    echo "No product reference provided.";
}
?>