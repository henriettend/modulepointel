<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Liste des Rôles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        body {
            background-color: #e9ecef;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card-style {
            background-color: #fff;
            padding: 35px 40px;
            border-radius: 14px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: auto;
        }
        h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #0d6efd;
            text-align: center;
            letter-spacing: 1px;
        }
        table {
            border-collapse: separate;
            border-spacing: 0 10px;
            width: 100%;
        }
        table thead tr th {
            background-color: #f1f3f5;
            color: #495057;
            font-weight: 600;
            padding: 15px 20px;
            border-radius: 8px;
        }
        table tbody tr {
            background-color: #ffffff;
            box-shadow: 0 3px 6px rgb(0 0 0 / 0.05);
            transition: box-shadow 0.3s ease;
        }
        table tbody tr:hover {
            box-shadow: 0 6px 15px rgb(0 0 0 / 0.12);
        }
        table tbody tr td {
            padding: 16px 20px;
            vertical-align: middle;
            color: #343a40;
        }
        .btn {
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-sm {
            padding: 6px 14px;
            font-size: 0.9rem;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
            box-shadow: 0 0 8px #e0a800aa;
            color: #212529;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #b02a37;
            border-color: #a52834;
            box-shadow: 0 0 8px #b02a37aa;
        }
        .btn-success {
            background-color: #198754;
            border-color: #198754;
            font-size: 1rem;
            padding: 10px 28px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border-radius: 12px;
        }
        .btn-success:hover {
            background-color: #146c43;
            border-color: #146c43;
            box-shadow: 0 0 12px #146c4388;
        }
        .btn-success i {
            font-size: 1.2rem;
        }
        .text-center {
            margin-top: 35px;
        }
        .empty-msg {
            font-style: italic;
            color: #6c757d;
            font-size: 1.1rem;
            padding: 25px 0;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card-style">
            <h1>Liste des Rôles</h1>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Libellé</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->libelle }}</td>
                                <td>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning me-2" title="Modifier">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="empty-msg text-center">Aucun rôle enregistré.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="text-center">
                <a href="{{ route('roles.creation') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg"></i> Créer un rôle
                </a>
            </div>
        </div>
    </div>
</body>
</html>
