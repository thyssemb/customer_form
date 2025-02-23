<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4F46E5;
            --primary-hover: #4338CA;
            --text-primary: #1F2937;
            --text-secondary: #6B7280;
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
            background: linear-gradient(135deg, #EEF2FF, #E0E7FF);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            background-color: var(--bg-secondary);
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2.5rem;
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
            font-size: 2rem;
            font-weight: 600;
        }

        .filters {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-bottom: 1.5rem;
        }

        .filters div {
            display: flex;
            flex-direction: column;
            width: 20%;
        }

        .filters label {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .filters input {
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            font-size: 1rem;
            width: 100%;
            background-color: var(--bg-primary);
            color: var(--text-primary);
            transition: all 0.3s ease;
        }

        .filters input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
        }

        .user-table th, .user-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        .user-table th {
            background-color: var(--bg-primary);
            font-weight: 600;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
        }

        .action-buttons button {
            padding: 0.75rem 1.5rem;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .pagination button {
            padding: 0.75rem 1.5rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: background-color 0.3s ease;
            font-size: 0.875rem;
        }

        .pagination button:hover {
            background-color: var(--primary-hover);
        }

        .pagination .page-link {
            font-size: 1px;
            padding: 0.5px 1px;
        }

        .pagination .page-link svg {
            width: 1px;
            height: 1px;
        }

        .show {
        background: green;
        }

        .delete {
        background: red;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Gestion des utilisateurs</h1>

        <div class="filters">
            <div>
                <label for="idFilter">ID:</label>
                <input type="text" id="idFilter" placeholder="Filtrer par ID">
            </div>
            <div>
                <label for="prenomFilter">Prénom:</label>
                <input type="text" id="prenomFilter" placeholder="Filtrer par prénom">
            </div>
            <div>
                <label for="nomFilter">Nom:</label>
                <input type="text" id="nomFilter" placeholder="Filtrer par nom">
            </div>
            <div>
                <label for="emailFilter">Email:</label>
                <input type="email" id="emailFilter" placeholder="Filtrer par email">
            </div>
            <div>
                <label for="dateFilter">Date d'inscription:</label>
                <input type="date" id="dateFilter">
            </div>
        </div>

        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Date d'inscription</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->firstname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                    <td class="action-buttons">
                        <button class="show">Voir</button>
                        <button class="delete">Supprimer</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            {{ $users->links() }}
        </div>
    </div>

</body>
</html>
