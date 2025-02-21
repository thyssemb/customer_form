<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 50px;
        }
        .profile-header {
            text-align: center;
        }
        .profile-header h1 {
            font-size: 28px;
            color: #333;
        }
        .profile-header img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-top: 20px;
        }
        .profile-info {
            margin-top: 30px;
        }
        .profile-info p {
            font-size: 16px;
            color: #666;
        }
        .profile-info .info-title {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="profile-header">
            <h1>Profil de {{ $user->name }}</h1>
        </div>

        <div class="profile-info">
            <p><span class="info-title">Nom :</span> {{ $user->name }}</p>
            <p><span class="info-title">Prénom :</span> {{ $user->firstname }}</p>
            <p><span class="info-title">Email :</span> {{ $user->email }}</p>
            <p><span class="info-title">Date de naissance :</span> {{ \Carbon\Carbon::parse($user->birthday)->format('d-m-Y') }}</p>
            <p><span class="info-title">Numéro de téléphone :</span> {{ $user->number }}</p>
            <p><span class="info-title">Adresse postale :</span> {{ $user->mailing_address }}</p>
        </div>
    </div>

</body>
</html>
