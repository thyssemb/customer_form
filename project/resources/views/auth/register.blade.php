<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
            color: red;
            text-align: center;
        }

        label {
            display: inline-block;
            font-size: 16px;
            color: #333;
            margin-top: 10px;
            width: 200px; /* Align label with input fields */
        }

        input[type="text"], input[type="password"], input[type="date"], input[type="tel"], input[type="file"], input[type="email"] {
            width: calc(100% - 220px); /* Adjust width to align with label */
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

        .form-group a {
            text-align: center;
            display: block;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
        }

        .form-group a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Inscription</h1>
        <p>Les champs suivi d'un ~ sont obligatoires</p>
        <form id="registerForm" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Nom de famille <p>~</p></label>
                <input type="text" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label for="firstname">Prénom <p>~</p></label>
                <input type="text" name="firstname" id="firstname" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe <p>~</p></label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="birthday">Date de naissance <p>~</p></label>
                <input type="date" name="birthday" id="birthday" required>
            </div>

            <div class="form-group">
                <label for="Picture">Photo de profil <p>~</p></label>
                <input type="file" name="picture" id="picture" required accept="image/*">
            </div>

            <div class="form-group">
                <label for="number">Numéro de téléphone <p>~</p></label>
                <input type="tel" name="number" id="number" required pattern="^\d{10}$" title="Le numéro doit contenir 10 chiffres">
            </div>

            <div class="form-group">
                <label for="email">Adresse email <p>~</p></label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="mailing_address">Adresse postale <p>~</p></label>
                <input type="text" name="mailing_address" required id="mailing_address">
            </div>

            <button type="submit">S'inscrire</button>

            <div class="form-group">
                <a href="/login">Sinon, connectez-vous</a>
            </div>
        </form>
    </div>

    <script>
        $("#registerForm").on("submit", function(event) {
            event.preventDefault();

            var formData = new FormData(this);
                    console.log(formData);

                    var birthday = $("#birthday").val();

            $.ajax({
                url: "{{ route('auth.register.submit') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        window.location.href = '/profile';
                    } else {
                        alert("Une erreur s'est produite. Veuillez réessayer.");
                    }
                },
                error: function(xhr, status, error) {
                    alert("Erreur lors de l'envoi des données.");
                    console.log(xhr.responseText);
                }
            });
        });
    </script>

</body>
</html>
