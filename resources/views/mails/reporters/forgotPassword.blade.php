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
        <h1>Réinitialisation de votre compte</h1>
        <p>Bonjour {{ $data["name"] }}</p>
        <p>Nous avons reçu une demande pour réinitialiser le mot de passe de votre compte</p>
        <p>Votre code de vérification est</p>
        <p class="code">{{ $data["verification_code"] }}</p>
        <br>
        <p>Ce code sera expiré dans 10min. Veuillez entrer ce code dans l'application pour procéder à la réinitialisation de votre mot de passe.</p>
        <p>Si vous n'avez pas demandé cette réinitialisation, veuillez ignorer ce mail. Merci</p>
        <br>
        <p>Equipe Echos Des Communes</p>
    </div>
</body>
</html>
