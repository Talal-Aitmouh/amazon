<?php
// Inclusion du fichier de configuration de la base de données
include "db.php";

// Récupération de l'identifiant du produit à partir de l'URL
$id = mysqli_real_escape_string($conn, $_GET["RefPdt"]);

// Requête SQL pour supprimer le produit
$sql = "DELETE FROM `produit` WHERE RefPdt = '$id'";

// Exécution de la requête SQL
$result = mysqli_query($conn, $sql);

// Vérification si la suppression a réussi
if ($result) {
    // Redirection vers une autre page avec un message de confirmation
    header("Location: admininter.php?msg=Data deleted successfully");
    exit; // Toujours sortir après une redirection d'en-tête
} else {
    // Affichage d'une erreur en cas d'échec de la suppression
    echo "Failed: " . mysqli_error($conn);
}
?>
