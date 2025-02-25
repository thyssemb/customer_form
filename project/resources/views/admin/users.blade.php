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

        .pagination a {
            padding: 0.75rem 1.5rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: background-color 0.3s ease;
            font-size: 0.875rem;
            text-decoration: none;
        }

        .pagination a:hover {
            background-color: var(--primary-hover);
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
            @foreach($users as $user)
        <div class="profile">
          <a href="{{ route('auth.profile', ['id' => $user->id]) }}">Profil</a>
        </div>
                    @endforeach
        <h1>Gestion des utilisateurs</h1>

        <form action="{{ route('admin.users.filter') }}" method="GET" class="filters">
            <div>
                <label for="id">ID</label>
                <input type="text" name="id" id="id" placeholder="Filtrer par ID" value="{{ request()->id }}">
            </div>
            <div>
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" placeholder="Filtrer par nom" value="{{ request()->name }}">
            </div>
            <div>
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" id="firstname" placeholder="Filtrer par prénom" value="{{ request()->firstname }}">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Filtrer par email" value="{{ request()->email }}">
            </div>
            <div>
                <label for="role">Rôle</label>
                <input type="text" name="role" id="role" placeholder="Filtrer par rôle" value="{{ request()->role }}">
            </div>
            <div>
                <label for="created_at">Date d'inscription</label>
                <input type="date" name="created_at" id="created_at" value="{{ request()->created_at }}">
            </div>
            <button type="submit">Filtrer</button>
        </form>

        <table class="user-table">
            <thead>
                <tr>
                    <th><a href="{{ route('admin.users.filter', ['sort_by' => 'id']) }}">ID</a></th>
                    <th><a href="{{ route('admin.users.filter', ['sort_by' => 'name']) }}">Nom</a></th>
                    <th><a href="{{ route('admin.users.filter', ['sort_by' => 'firstname']) }}">Prénom</a></th>
                    <th><a href="{{ route('admin.users.filter', ['sort_by' => 'email']) }}">Email</a></th>
                    <th><a href="{{ route('admin.users.filter', ['sort_by' => 'role']) }}">Rôle</a></th>
                    <th><a href="{{ route('admin.users.filter', ['sort_by' => 'created_at']) }}">Date d'inscription</a></th>
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
