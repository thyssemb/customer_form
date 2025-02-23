<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        .form-header {
            text-align: center;
            color: black;
        }

        .form-header h1 {
            font-size: 1.875rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
        }

        .form-content {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            font-size: 1rem;
            color: var(--text-primary);
            background-color: var(--bg-primary);
            transition: all 0.2s ease;
        }

        .input-wrapper input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--text-secondary);
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
            transition: background-color 0.2s ease;
        }

        button:hover {
            background-color: var(--primary-hover);
        }

        .redirect-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-color);
        }

        .redirect-link p {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .redirect-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            margin-left: 0.25rem;
        }

        .redirect-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: var(--error-color);
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: none;
        }

        @media (max-width: 640px) {
            body {
                padding: 1rem;
                background: var(--bg-secondary);
            }

            .container {
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h1>Connexion</h1>
            <p>Connectez-vous à votre compte</p>
        </div>

        <div class="form-content">
            <form id="loginForm" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <div class="input-wrapper">
                        <input
                            type="email"
                            name="email"
                            id="email"
                            required
                            placeholder="exemple@email.com"
                            autocomplete="email"
                        >
                    </div>
                    <div class="error-message" id="email-error"></div>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="input-wrapper">
                        <input
                            type="password"
                            name="password"
                            id="password"
                            required
                            placeholder="Votre mot de passe"
                            autocomplete="current-password"
                        >
                    </div>
                    <div class="error-message" id="password-error"></div>
                </div>

                <button type="submit">Se connecter</button>

                <div class="redirect-link">
                    <p>Vous n'avez pas de compte ?<a href="/register">Inscrivez-vous</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>

    </script>
</body>
</html>
