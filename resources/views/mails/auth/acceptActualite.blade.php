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
        strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="message_container">
        <p>Bonjour  {{ $data["name"] }}</p>
        <p>Votre article <strong>"{{ $data['title'] }}"</strong> a été validée par notre équipe.</p>
        <p>Elle est dès à présent disponible sur notre page</p>
        <p><a href="">Cliquer ici pour accéder à votre article</a></p>

        <p>Nous vous remercions pour votre fidélité</p>

        <p>Equipe Echos Des Communes</p>
    </div>
</body>
</html>
