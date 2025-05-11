@extends('view_admin.layouts.index')

@section('content')
<div class="pagetitle mb-4 d-flex justify-content-between align-items-center">
    <h1 class="h3"><i class="bi bi-shield-lock-fill me-2 text-primary"></i>Gestion des rôles</h1>
    <a href="{{ url('/service/add') }}" class="btn btn-success shadow-sm">
        <i class="bi bi-plus-circle me-1"></i> Ajouter un rôle
    </a>
</div>

<section class="section">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h5 class="card-title text-muted">Liste des utilisateurs avec rôle</h5>

            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Ville</th>
                            <th>Spécialité</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getRecord as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->nom }}</td>
                            <td>{{ $value->prenom }}</td>
                            <td><span class="badge bg-info">{{ $value->ville }}</span></td>
                            <td>{{ $value->specialite }}</td>
                            <td>{{ $value->contact }}</td>
                            <td>{{ $value->email }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ url('/role/edit/' . $value->id) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="{{ url('/role/delete/' . $value->id) }}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @if($getRecord->isEmpty())
                        <tr>
                            <td colspan="8" class="text-muted">Aucun rôle trouvé.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
