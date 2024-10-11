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

        .reject-motif {
            background-color: #fc8b13;
            font-weight: bold;
            margin-block: 1rem;
            padding: 1.3rem 1rem;
            border-radius: .3rem;
        }
    </style>
</head>
<body>
    <div class="message_container">
        <p>Bonjour  {{ $data["name"] }}</p>
        <p>La publication de votre article titrée <strong>"{{ $data['title'] }}"</strong> a été rejetée par notre équipe.</p>
        <p>Voici le motif ci-dessous</p>

        <div class="reject-motif">
            {!! $data["motif_reject"] !!}
        </div>

        <p>Equipe Echos Des Communes</p>
    </div>
</body>
</html>
