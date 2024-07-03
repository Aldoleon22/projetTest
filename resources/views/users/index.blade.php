@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Liste des utilisateurs</h2>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Créer un utilisateur</a>
            @if ($users->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>Aucun utilisateur trouvé.</p>
            @endif
        </div>
    </div>
</div>
@endsection
