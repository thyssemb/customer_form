<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 60px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 30px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 16px;
            color: #333;
            margin-top: 10px;
        }

        input[type="text"], input[type="name"], input[type="date"], input[type="tel"], input[type="file"], input[type="password"], input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-top: 8px;
            font-size: 16px;
            background-color: #f9f9f9;
        }

        input[type="file"] {
            padding: 3px;
        }

        button {
            background-color: #5cb85c;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
            font-size: 18px;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Inscription</h1>
        <form method="POST" action="{{ route('auth.register') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Nom de famille :</label>
                <input type="name" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label for="firstname">Prénom :</label>
                <input type="text" name="firstname" id="firstname" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="birthday">Date de naissance :</label>
                <input type="date" name="birthday" id="birthday" required>
            </div>

            <div class="form-group">
                <label for="Picture">Photo de profil :</label>
                <input type="file" name="Picture" id="Picture" required>
            </div>

            <div class="form-group">
                <label for="Number">Numéro de téléphone :</label>
                <input type="tel" name="Number" id="Number" required>
            </div>

            <div class="form-group">
                <label for="mailing_address">Adresse postale :</label>
                <input type="text" name="mailing_address" id="mailing_address" required>
            </div>

            <button type="submit">S'inscrire</button>
        </form>
    </div>

</body>
</html>
