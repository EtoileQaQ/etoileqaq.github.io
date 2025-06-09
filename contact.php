<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = htmlspecialchars(trim($_POST["nom"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    if ($nom && $email && $message) {
        $to = "kenlitosu@gmail.com";
        $subject = "Nouveau message de $nom via le formulaire";
        $body = "Nom : $nom\nEmail : $email\n\nMessage :\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            header("Location: merci.html");
            exit;
        } else {
            echo "Une erreur est survenue. Le message n'a pas pu être envoyé.";
        }

        if (!empty($_POST["honey"])) {
            exit("Spam détecté.");
          }          
    } else {
        echo "Veuillez remplir tous les champs.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
