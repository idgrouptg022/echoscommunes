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

        .message_container h1 {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 1.5rem;
        }

        .code {
            font-size: 1.3rem;
            color: #8b1111;
            letter-spacing: .3rem;
        }
    </style>
</head>
<body>
    <div class="message_container">
        <h1>Mot de passe réinitialisé</h1>
        <p>Bonjour {{ $data["name"] }}</p>
        <p>Votre mot de passe a bien été réinitialisé suite à votre demande</p>
        <p>L'équipe reste à votre disposition si vous avez besoin d'aide ou autres. Merci</p>
        <br>
        <p>Cordialement,</p>
        <br>
        <p>Equipe Echos Des Communes</p>
    </div>
</body>
</html>
