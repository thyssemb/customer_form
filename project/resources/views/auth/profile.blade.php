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
            max-width: 900px;
            margin: 0 auto;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 60px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 32px;
            margin-bottom: 20px;
        }

        .profile-header {
            text-align: center;
        }

        .profile-header img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-top: 20px;
            border: 4px solid #ddd;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .profile-info {
            margin-top: 30px;
        }

        .profile-info p {
            font-size: 18px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .profile-info .info-title {
            font-weight: bold;
            color: #333;
        }

        .profile-info .info-item {
            margin-top: 5px;
            color: #444;
        }

        .button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            text-align: center;
            margin-top: 30px;
            text-decoration: none;
        }

        .button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="profile-header">
            <h1>Profil utilisateur</h1>
            <img src="profile picture" alt="Photo de profil">
        </div>

        <div class="profile-info">
            <p><span class="info-title">Nom :</span> <span class="info-item">test</span></p>
            <p><span class="info-title">Prénom :</span> <span class="info-item">test</span></p>
            <p><span class="info-title">Email :</span> <span class="info-item">test@test.com</span></p>
            <p><span class="info-title">Date de naissance :</span> <span class="info-item">01 Janvier 1990</span></p>
            <p><span class="info-title">Numéro de téléphone :</span> <span class="info-item">+33 6 12 34 56 78</span></p>
            <p><span class="info-title">Adresse postale :</span> <span class="info-item">10 Rue de la Liberté, Paris</span></p>
        </div>

        <a href="#" class="button">Modifier le profil</a>
    </div>

</body>
</html>
