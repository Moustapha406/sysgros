@extends('layouts.main_layout')

@section('content')
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-11">
                <form method="post"
                    action="{{ isset($user->id) ? route('users.update',$user->id) : route('users.store')}}">
                    @csrf
                    @if (isset($user->id))
                        @method('PUT')
                    @endif
                    <div class="card card-primary">
                        <div class="card-header d-flex justify-content-between">
                        <h4>Liste des utilisateurs</h4>
                        </div>
                        <div class="card-body p-4 ">
                            <div class="row">
                                <div class="form-group col-3">
                                    <label for="nom">Nom</label>
                                    <input id="nom" type="text" class="form-control" name="nom" value="{{isset($user) ? $user->nom : ''}}" autofocus>
                                        @error('nom')
                                            <div class="text-danger" >
                                                le nom est obligatoire
                                            </div>
                                        @enderror
                                </div>
                                <div class="form-group col-5">
                                    <label for="prenom">Prénom</label>
                                    <input id="prenom" type="text" class="form-control" name="prenom" value="{{isset($user) ? $user->prenom : ''}}" >
                                        @error('prenom')
                                            <div class="text-danger" >
                                                le prénom est obligatoire
                                            </div>
                                        @enderror
                                </div>

                                <div class="form-group col-4">
                                    <label for="departement">Département</label>
                                    <input id="departement" type="text" class="form-control" name="departement" value="{{isset($user) ? $user->departement : ''}}" autofocus>
                                        @error('departement')
                                            <div class="text-danger" >
                                                le departement est obligatoire
                                            </div>
                                        @enderror
                                </div>
                            </div>
                            

                            <div class="row">
                                
                                

                                <div class="form-group col-4">
                                    <label for="email">Email</label>
                                    <input id="email" type="mail" class="form-control" value="{{ isset($user) ? $user->email : ''}}" name="email" autofocus>
                                        @error('email')
                                            <div class="text-danger" >
                                                l'email est obligatoire
                                            </div>
                                        @enderror
                                </div>

                                <div class="form-group col-4">
                                    <label for="password">Mot de passe</label>
                                    <input id="password" type="password"  class="form-control" name="password"  >
                                        @error('password')
                                            <div class="text-danger" >
                                                le password est obligatoire
                                            </div>
                                        @enderror
                                </div>

                                <div class="form-group col-4">
                                    <label for="prenom">Rôles</label>
                                    <select class="form-control select2" multiple="" name="roles[]">
                                        <option value="">....</option>
                                        @php
                                            $selectedRoles= collect(old('roles',isset($user) ? $user->roles->pluck('id')->toArray() : []))
                                        @endphp

                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}" {{ $selectedRoles->contains($role->id) ? 'selected' : '' }} >
                                                {{$role->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>


                            
                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit">{{ isset($user->id) ? "Modifier" : "Ajouter"}}</button>
                            <a href="{{route('users.index')}}" class="btn btn-secondary">Annuler</a>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
        
    <div>
@endsection

