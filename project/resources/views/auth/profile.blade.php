<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile de {{ $user->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4F46E5;
            --secondary-color: #6366F1;
            --danger-color: #DC2626;
            --text-primary: #1F2937;
            --text-secondary: #4B5563;
            --bg-primary: #F9FAFB;
            --bg-secondary: #ffffff;
            --border-color: #E5E7EB;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-primary);
            line-height: 1.5;
            min-height: 100vh;
            padding: 2rem;
        }

        .drag-and-drop-container {
            margin-top: 2rem;
            padding: 2rem;
            border: 1px dashed var(--primary-color);
            border-radius: 1rem;
            background-color: var(--bg-secondary);
            text-align: center;
        }

        .drop-area {
            border: 2px dashed var(--primary-color);
            padding: 2rem;
            border-radius: 1rem;
            cursor: pointer;
            background-color: #f0f0f0;
            color: var(--primary-color);
            transition: background-color 0.3s ease;
        }

        .drop-area p {
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .file-input {
            display: none;
        }

        .drop-area:hover {
            background-color: #e8e8e8;
        }

        .drop-area.dragging {
            background-color: #d1d5db;
        }

        /* Blinking effect */
        @keyframes blink {
            0% { background-color: #f0f0f0; }
            50% { background-color: #e0e0e0; }
            100% { background-color: #f0f0f0; }
        }

        .blinking {
            animation: blink 0.5s ease-in-out infinite;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: var(--bg-secondary);
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .profile-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 3rem 2rem;
            text-align: center;
            position: relative;
        }

        .profile-header h1 {
            font-size: 1.875rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .profile-header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            object-fit: cover;
            margin: 1.5rem 0;
        }

        .profile-info {
            padding: 2rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .info-item {
            background-color: var(--bg-primary);
            padding: 1.25rem;
            border-radius: 0.75rem;
            transition: transform 0.2s ease;
        }

        .info-item:hover {
            transform: translateY(-2px);
        }

        .info-title {
            font-weight: 600;
            color: var(--primary-color);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
            margin-bottom: 0.5rem;
            display: block;
        }

        .info-content {
            color: var(--text-primary);
            font-size: 1rem;
            word-break: break-word;
        }

        .profile-actions {
            padding: 1.5rem 2rem;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .action-button {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 140px;
        }

        .primary-button {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }

        .primary-button:hover {
            background-color: #4338CA;
        }

        .secondary-button {
            background-color: transparent;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
        }

        .secondary-button:hover {
            background-color: rgba(79, 70, 229, 0.1);
        }

        .danger-button {
            background-color: transparent;
            color: var(--danger-color);
            border: 1px solid var(--danger-color);
        }

        .danger-button:hover {
            background-color: var(--danger-color);
            color: white;
        }

        @media (max-width: 640px) {
            body {
                padding: 1rem;
            }

            .profile-header {
                padding: 2rem 1rem;
            }

            .profile-info {
                padding: 1.5rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .profile-actions {
                flex-direction: column;
            }

            .action-button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
             @if(Auth::check() && Auth::user()->role === 'admin')
                <div>
                  <a href="{{ route('admin.users') }}">Panel Admin</a>
                </div>
            @endif

        <div class="profile-header">
            <h1>{{ $user->firstname }} {{ $user->name }}</h1>
            @if($user->picture)
                <img src="{{ asset('storage/' . $user->picture) }}" alt="Photo de profil">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->firstname . ' ' . $user->name) }}&background=4F46E5&color=fff" alt="Photo de profil">
            @endif

            @if(Auth::check() && Auth::user()->role === 'admin')
                <div class="drag-and-drop-container">
                    <h2>Changer la photo de profil</h2>
                <form action="{{ route('admin.users.dragAndDrop', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="drop-area" class="drop-area">
                        <p>Glissez une image ici ou cliquez pour sélectionner un fichier.</p>
                        <input type="file" name="picture" id="file-input" class="file-input" accept="image/*" hidden>
                    </div>
                    <button type="submit" class="action-button primary-button">Mettre à jour la photo</button>
                </form>
                </div>
            @endif

        </div>

        <div class="profile-info">
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-title">Nom complet</span>
                    <p class="info-content">{{ $user->firstname }} {{ $user->name }}</p>
                </div>

                <div class="info-item">
                    <span class="info-title">Email</span>
                    <p class="info-content">{{ $user->email }}</p>
                </div>

                <div class="info-item">
                    <span class="info-title">Date de naissance</span>
                    <p class="info-content">{{ \Carbon\Carbon::parse($user->birthday)->format('d/m/Y') }}</p>
                </div>

                <div class="info-item">
                    <span class="info-title">Numéro de téléphone</span>
                    <p class="info-content">{{ $user->number }}</p>
                </div>

                <div class="info-item">
                    <span class="info-title">Adresse postale</span>
                    <p class="info-content">{{ $user->mailing_address }}</p>
                </div>
            </div>
        </div>

        <div class="profile-actions">
           <form action="{{ route('auth.logout') }}" method="POST" style="margin: 0;">
               @csrf
               <button type="submit" class="action-button danger-button">Se déconnecter</button>
           </form>
        </div>
    </div>

<script>
    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('file-input');

    dropArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropArea.classList.add('blinking');
    });

    dropArea.addEventListener('dragleave', () => {
        dropArea.classList.remove('blinking');
    });

    dropArea.addEventListener('drop', (e) => {
        e.preventDefault();
        dropArea.classList.remove('blinking');

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            const fileName = files[0].name;
            dropArea.innerHTML = `<p>${fileName}</p>`;
            console.log('Fichier déposé :', files[0]);
        }
    });

    fileInput.addEventListener('change', () => {
        const files = fileInput.files;
        if (files.length > 0) {
            const fileName = files[0].name;
            dropArea.innerHTML = `<p>${fileName}</p>`;
            console.log('Fichier sélectionné :', files[0]);
        }
    });

    dropArea.addEventListener('click', () => {
        fileInput.click();
    });

    const form = document.querySelector('form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        const formData = new FormData(form);

        try {
            console.log('FormData avant envoi :', formData);

            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
            });

            if (!response.ok) {
                console.error('Erreur lors de l\'envoi de la photo');
                throw new Error('Une erreur est survenue lors de l\'upload de l\'image.');
            }

            const data = await response.json();
            console.log('Réponse serveur :', data);

            if (data.picture) {
                const imgElement = document.querySelector('img');
                imgElement.src = `/storage/${data.picture}`;
            }

        } catch (error) {
            console.error('Erreur lors de l\'upload de l\'image :', error);
        }
    });
</script>


</body>
</html>
