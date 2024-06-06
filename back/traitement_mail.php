<?php
// Inclusion des classes PHPMailer
require 'PHPMailer\PHPMailer-master\src\Exception.php';
require 'PHPMailer\PHPMailer-master\src\PHPMailer.php';
require 'PHPMailer\PHPMailer-master\src\SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Vérification que le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupération des données du formulaire
    $nom = $_POST['name'];
    $email = $_POST['email'];
    $messageContent = $_POST['message'];
    $message = "Nom : ".$nom."\n"."Email : ".$email."\n"."Message : ".$messageContent."\n";

    // Création d'une nouvelle instance de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'contact.magiksystems@gmail.com';
        $mail->Password = 'pqrwcqwiliypqsza';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Paramètres de l'email
        $mail->setFrom('from@example.com', 'Projet-APP');
        $mail->addAddress('timlefort33@gmail.com');
        
        // Contenu de l'email
        $mail->isHTML(false);
        $mail->Subject = 'Voici le sujet';
        $mail->Body    = $message;

        // Envoi de l'email
        $mail->send();
        
        // Ouvrir une popup
        echo "<script>alert('Le message a été envoyé.');</script>";
        
        echo "<script>setTimeout(function(){window.location.href = '../page/contact.php';}, 2000);</script>";
        exit();
    } catch (Exception $e) {
        // Gestion des erreurs
        echo "Le message n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
    }
}
?>
