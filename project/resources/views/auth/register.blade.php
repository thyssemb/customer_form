<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        :root {
             --primary-color: #4F46E5;
            --primary-hover: #4338CA;
            --text-primary: #1F2937;
            --text-secondary: #6B7280;
            --bg-primary: #F9FAFB;
            --bg-secondary: #ffffff;
            --border-color: #E5E7EB;
            --error-color: #EF4444;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
             font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #EEF2FF, #E0E7FF);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            line-height: 1.5;
        }

        .container {
            width: 100%;
            max-width: 800px;
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2.5rem;
        }

        .header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        h1 {
            font-size: 2rem;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 0.75rem;
        }

        .required-text {
            color: var(--error-color);
            font-size: 0.875rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .required-mark {
            color: var(--error-color);
            margin-left: 0.25rem;
        }

        .input-wrapper {
            position: relative;
        }

        input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: all 0.2s;
            background-color: white;
        }

        input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        input[type="file"] {
            padding: 0.5rem;
            font-size: 0.875rem;
        }

        input[type="date"] {
            color: var(--text-color);
        }

        button {
            width: 100%;
            padding: 0.875rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button:hover {
            background-color: var(--primary-hover);
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .login-link a:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }

        /* Toast notification styles */
        .toast {
            position: fixed;
            top: 1rem;
            right: 1rem;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            background-color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 50;
        }

        .toast.success {
            border-left: 4px solid #10B981;
        }

        .toast.error {
            border-left: 4px solid var(--error-color);
        }

        @media (max-width: 640px) {
            .container {
                padding: 1.5rem;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Inscription</h1>
            <p class="required-text">Les champs suivis d'un ~ sont obligatoires</p>
        </div>

        <form id="registerForm" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Nom de famille<span class="required-mark">~</span></label>
                <div class="input-wrapper">
                    <input type="text" name="name" id="name" required>
                </div>
            </div>

            <div class="form-group">
                <label for="firstname">Prénom<span class="required-mark">~</span></label>
                <div class="input-wrapper">
                    <input type="text" name="firstname" id="firstname" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe<span class="required-mark">~</span></label>
                <div class="input-wrapper">
                    <input type="password" name="password" id="password" required>
                </div>
            </div>

            <div class="form-group">
                <label for="birthday">Date de naissance<span class="required-mark">~</span></label>
                <div class="input-wrapper">
                    <input type="date" name="birthday" id="birthday" required>
                </div>
            </div>

            <div class="form-group">
                <label for="picture">Photo de profil<span class="required-mark">~</span></label>
                <div class="input-wrapper">
                    <input type="file" name="picture" id="picture" required accept="image/*">
                </div>
            </div>

            <div class="form-group">
                <label for="number">Numéro de téléphone<span class="required-mark">~</span></label>
                <div class="input-wrapper">
                    <input type="tel" name="number" id="number" required pattern="^\d{10}$" title="Le numéro doit contenir 10 chiffres">
                </div>
            </div>

            <div class="form-group">
                <label for="email">Adresse email<span class="required-mark">~</span></label>
                <div class="input-wrapper">
                    <input type="email" name="email" id="email" required>
                </div>
            </div>

            <div class="form-group">
                <label for="mailing_address">Adresse postale<span class="required-mark">~</span></label>
                <div class="input-wrapper">
                    <input type="text" name="mailing_address" id="mailing_address" required>
                </div>
            </div>

            <button type="submit">S'inscrire</button>

            <div class="login-link">
                <a href="/login">Déjà inscrit ? Connectez-vous</a>
            </div>
        </form>
    </div>

    <div id="toast" class="toast"></div>

    <script>
        function showToast(message, type) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.className = `toast ${type}`;
            toast.style.display = 'block';

            setTimeout(() => {
                toast.style.display = 'none';
            }, 3000);
        }

        $("#registerForm").on("submit", function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            $.ajax({
                url: "{{ route('auth.register.submit') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        showToast(response.message, 'success');
                        setTimeout(() => {
                            window.location.href = '/profile';
                        }, 1000);
                    } else {
                        showToast("Une erreur s'est produite. Veuillez réessayer.", 'error');
                    }
                },
                error: function(xhr, status, error) {
                    showToast("Erreur lors de l'envoi des données.", 'error');
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
</body>
</html>
