@extends('view_admin.layouts.index')

@section('content')
<div class="pagetitle mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <i class="bi bi-shield-lock-fill me-2 text-primary" style="font-size: 1.5rem;"></i>
            <h1 class="h3 mb-0">Gestion des rôles</h1>
        </div>
        <a href="{{ route('roles.store') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Ajouter un rôle
        </a>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

<section class="section">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 5%">#</th>
                            <th style="width: 20%">Rôle</th>
                            <th style="width: 45%">Permissions</th>
                            <th class="text-center" style="width: 30%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>
                                    <span class="fw-semibold">{{ $role->name }}</span>
                                    @if(in_array($role->name, ['Admin', 'Entrepreneur']))
                                        <span class="badge bg-primary ms-2">Système</span>
                                    @endif
                                </td>
                                <td>
                                    @forelse($role->permissions as $permission)
                                        <span class="badge bg-light text-dark border mb-1">{{ $permission->name }}</span>
                                    @empty
                                        <span class="text-muted fst-italic">Aucune permission</span>
                                    @endforelse
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <form method="POST" action="{{ route('roles.update', $role->id) }}" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" 
                                                        id="dropdownMenuButton{{ $role->id }}" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                    <i class="bi bi-key me-1"></i> Permissions
                                                </button>
                                                <div class="dropdown-menu p-3" style="min-width: 250px;" 
                                                     aria-labelledby="dropdownMenuButton{{ $role->id }}">
                                                    <h6 class="dropdown-header mb-2">Gestion des permissions</h6>
                                                    @foreach($permissions as $permission)
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" 
                                                                   name="permissions[]" value="{{ $permission->id }}"
                                                                   id="perm_{{ $permission->id }}_{{ $role->id }}"
                                                                   {{ $role->hasPermissionTo($permission) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="perm_{{ $permission->id }}_{{ $role->id }}">
                                                                {{ $permission->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                    <div class="d-grid mt-2">
                                                        <button type="submit" class="btn btn-sm btn-primary">
                                                            <i class="bi bi-save me-1"></i> Enregistrer
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                        @if(!in_array($role->name, ['Admin', 'Entrepreneur']))
                                            <form method="POST" action="{{ route('roles.delete', $role->id) }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rôle ? Cette action est irréversible.')">
                                                    <i class="bi bi-trash me-1"></i> Supprimer
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    <i class="bi bi-exclamation-circle me-2"></i>Aucun rôle trouvé
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection