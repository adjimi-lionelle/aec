@extends('view_admin/layouts/index')
@section('content')
  
    <div class="pagetitle">
      <h1>Role</h1>
    </div>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <h5 class="card-title">Listes de roles</h5>
                </div>
                <div class="col-md-6" style="text-align: right">
                  <a href="/role/add" class="btn btn-primary" style="margin-top: 10px">Ajouter</a>
                </div>
              </div>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Specialité</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mot de Passe</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($getRecord as $value)
                  <tr>
                  <th scope="row">{{ $value->id }}</th>
                    <td>{{ $value->nom }}</td>
                    <td>{{ $value->prenom }}</td>
                    <td>{{ $value->ville }}</td>
                    <td>{{ $value->specialite}}</td>
                    <td>{{ $value->contact }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->mot_de_passe }}</td>
                    <td><a href="/role/edit/, $value-> id" class="btn btn-primary">Modifier</a></td>
                    <td><a href="/role/delete/, $value-> id" class="btn btn-danger">Delete</a></td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    
@endsection