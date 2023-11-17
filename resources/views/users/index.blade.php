@include('navbar', ['appName' => 'Florentin Toupet'])
@extends('layout')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <h1>Tous les utilisateurs</h1>
    <table class="user-table">
        <thead>
            <tr class="blackTitles">
                {{-- Ajouter colonne IDs --}}
                <th>Nom</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->isAdmin ? 'Oui' : 'Non' }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">
                            <button class="action-btn edit-btn">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete-btn">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <style>
        .blackTitles{
            color:black;
        }
        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .user-table th,
        .user-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .user-table th {
            background-color: #f2f2f2;
        }

        /* Style pour les boutons */
        .action-btn {
            border: none;
            background: none;
            cursor: pointer;
            font-size: 1em;
        }

        .edit-btn {
            color: #007bff;
        }

        .delete-btn {
            color: #dc3545;
        }
    </style>
@endsection
