@include('navbar', ['appName' => 'Florentin Toupet'])
@extends('layout')
@section('content')
    <h1>Modifier l'utilisateur : {{ $user->name }}</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="user-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label for="isAdmin">Admin :</label>
            <input type="checkbox" id="isAdmin" name="isAdmin" value="1" {{ $user->isAdmin ? 'checked' : '' }}>
        </div>

        <button type="submit" class="btn">Enregistrer</button>
    </form>
    <style>
        .user-form {
            max-width: 400px;
            margin: 20px auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="checkbox"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="checkbox"] {
            width: auto;
        }

        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
@endsection
