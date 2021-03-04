<?php

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailform = $_POST['mail'];
    $message = $_POST['message'];

    $mailTo= "omar.sh_99@abv.bg";
    $headers = "From: ".$mailFrom;
    $txt = "You have received an e-mail from ".$name.".\n\n".$message;

    mail($mailTo, $subject, $txt, $headers);
    header("Location: contactme.php?mailsend");
}