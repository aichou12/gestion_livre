<!DOCTYPE html>
<html>
<head>
    <title>Liste des livres</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
           border: 1px solid black;
        }
        th, td {
           padding: 8px;
           text-align: left;
        }
    </style>
</head>
<body>
    <h1>Liste des livres</h1>
    <table>
        <thead> 
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Année</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->titre }}</td>
                    <td>{{ $book->auteur }}</td>
                    <td>{{ $book->annee }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
