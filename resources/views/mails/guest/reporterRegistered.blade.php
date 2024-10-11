<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <style>
        .message_container, p, ul li {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="message_container">
        <p>Cher(e)  {{ $data["firstname"] . " " . $data["lastname"] }}</p>
        <p>Merci de vous être inscrit sur notre plateforme. Nous sommes ravis de vous accueillir parmi nos utilisateurs et rédacteurs!</p>
        <p>Votre rôle sera essentiel pour la création de contenu de qualité.</p>
        <p>Vous pouvez dès à présent accéder à votre compte Echos Des Communes</p>
        <br>
        <p>Si vous avez des quetions ou avez besoin d'aide, notre équipe est là pour vous accompagner</p>
        <p>Bonne rédaction et à très bientôt!</p>

        <p>Equipe Echos Des Communes</p>
    </div>
</body>
</html>
<?php
