<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $to = "dasrestaurantdebrecen@gmail.com";
        $subject = "Kapcsolatfelvétel";
        $txt = $_POST["message"];
        $headers = "From: " . $_POST["email"] . "\r\n";

        mail($to,$subject,$txt,$headers);

    }

?>