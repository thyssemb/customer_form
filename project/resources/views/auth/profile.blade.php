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
            <h1>Profile utilisateur</h1>
            <img src="profile picture" alt="Photo de profil">
        </div>

        <div class="profile-info">
            <p><span class="info-title">Nom :</span></p>
            <p><span class="info-title">Prénom :</span></p>
            <p><span class="info-title">Email :</span></p>
            <p><span class="info-title">Date de naissance :</span>
            <p><span class="info-title">Numéro de téléphone :</span></p>
            <p><span class="info-title">Adresse postale :</span></p>
        </div>
    </div>

</body>
</html>
