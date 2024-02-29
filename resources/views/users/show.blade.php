<div class="modal fade" id="user_{{$user->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Détail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item font-weight-bold">Email</li>
                            <li class="list-group-item font-weight-bold">Nom</li>
                            <li class="list-group-item font-weight-bold">Prénom</li>
                            <li class="list-group-item font-weight-bold">Departement</li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$user->email}}</li>
                            <li class="list-group-item">{{$user->nom}}</li>
                            <li class="list-group-item">{{$user->prenom}}</li>
                            <li class="list-group-item"> {{$user->departement}} </li>
                            
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>