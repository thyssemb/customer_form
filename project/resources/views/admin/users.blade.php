<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .user-table {
            width: 100%;
            border-collapse: collapse;
        }
        .user-table th, .user-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .user-table th {
            background-color: #f4f4f9;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .action-buttons button {
            padding: 5px 10px;
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .action-buttons button:hover {
            background-color: #d32f2f;
        }
        .search-bar {
            margin-bottom: 20px;
            text-align: right;
        }
        .search-bar input {
            padding: 8px;
            width: 200px;
            margin-right: 10px;
        }
        .pagination {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Gestion des utilisateurs</h1>

        <div class="search-bar">
            <input type="text" placeholder="Rechercher...">
            <button>Rechercher</button>
        </div>

        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date d'inscription</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>john.doe@example.com</td>
                    <td>01/01/2023</td>
                    <td class="action-buttons">
                        <button>Voir</button>
                        <button>Supprimer</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>jane.smith@example.com</td>
                    <td>15/02/2022</td>
                    <td class="action-buttons">
                        <button>Voir</button>
                        <button>Supprimer</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Mark Johnson</td>
                    <td>mark.johnson@example.com</td>
                    <td>30/08/2021</td>
                    <td class="action-buttons">
                        <button>Voir</button>
                        <button>Supprimer</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="pagination">
            <button>Précédent</button>
            <button>Suivant</button>
        </div>
    </div>

</body>
</html>
