@extends('layouts.main_layout')

@section('content')
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-11">
                <form method="post"
                    action="{{ route('vis.update',$vi->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="card card-primary">
                        <div class="card-header d-flex justify-content-between">
                        <h4>{{ $vi->nom }}</h4>
                        </div>
                        <div class="card-body p-4 ">
                            
                            <div class="row">
                                
                                

                                <div class="form-group col-6">
                                    <label for="active">Active</label>
                                    <select class="form-control select-vi" name="active" >
                                        <option value="oui" @if($vi->active=='oui') selected @endif>Oui</option>
                                        <option value="non" @if($vi->active=='non') selected @endif>Non</option>
                                    </select>
                                </div>

                                <div class="form-group col-6">
                                    <label for="plafond">Plafond</label>
                                    <input id="plafond" type="plafond"  class="form-control" name="plafond" value="{{$vi->plafond}}" >
                                        @error('plafond')
                                            <div class="text-danger" >
                                                Erreur sur le plafond
                                            </div>
                                        @enderror
                                </div>
                                
                            </div>


                            
                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit">Modifier</button>
                            <a href="{{route('vis.index')}}" class="btn btn-secondary">Annuler</a>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
        
    <div>
@endsection

