<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        p {
            text-align: center;
        }

        label {
            display: inline-block;
            font-size: 16px;
            color: #333;
            margin-top: 10px;
            width: 200px;
        }

        input[type="text"], input[type="password"], input[type="date"], input[type="tel"], input[type="file"], input[type="email"] {
            width: calc(100% - 220px);
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-top: 8px;
            font-size: 16px;
            background-color: #f9f9f9;
            display: inline-block;
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
            display: flex;
            align-items: center;
        }

        .form-group label p {
            color: red;
            margin-left: 5px;
        }

        .redirect-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .redirect-link a {
            color: #007bff;
            text-decoration: none;
        }

        .redirect-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Connexion</h1>
        <form id="loginForm" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>
            </div>

            <button type="submit">Se connecter</button>

            <div class="redirect-link">
                <p>Sinon, <a href="/register">inscrivez-vous</a></p>
            </div>
        </form>
    </div>

    <script>

    </script>

</body>
</html>
