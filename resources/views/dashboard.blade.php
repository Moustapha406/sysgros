@extends("layouts.main_layout")

{{-- @section("content")
    @extends('layouts.main_layout') --}}

@section('content')
        <div class="row">
            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header d-flex justify-content-between">
                  <h4 >Liste des promoteurs & vis</h4>
                  <div class="card-header-form">
                    <form method="GET" action="{{route('vis.index')}}">
                      <div class="input-group">
                        <input type="text" class="form-control" name="search" value="{{request('search')}}" placeholder="Search">
                        <div class="input-group-btn">
                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="button text-right ml-4">
                    
                  </div>    
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table id="mainTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Nom</th>
                                <th>Zone</th>
                                <th>Departement</th>
                                <th>Active</th>
                                <th>Plafond</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vis as $vi)
                                <tr>
                                    <td>{{$vi->code}}</td>
                                    <td class="text-truncate">{{$vi->nom}}</td>
                                    <td class="align-middle">{{$vi->zone}}</td>
                                    <td class="align-middle">{{$vi->secteur}}</td>
                                    <td class="align-middle"> {{$vi->active}} </td>
                                    <td class="align-middle"> {{$vi->plafond}} </td>
                                    <td class="text-center">
                                        <a href="{{route('vis.edit',$vi->id)}}" class="test-info">
                                        <span class="material-symbols-outlined">edit</span>
                                        </a>
                                    </td>

                                    @includeIf('vis.show')

                                </tr>
                            @endforeach 
                        <tbody>
                    </table>
                  </div>
                </div>

                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      {{$vis->links()}}
                    </nav>
                </div>

              </div>
            </div>
          </div>

@endsection
@push('script')
        <script src="{{asset('assets/bundles/select2/dist/js/select2.full.min.js')}}"></script>
        <script src="{{asset('assets/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
        <script src="{{asset('assets/js/page/forms-advanced-forms.js')}}"></script>
        <script src="{{asset('assets/js/page/advance-table.js')}}"></script>
        <script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
        <script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{asset('assets/js/page/datatables.js')}}"></script>

        

@endpush
{{-- @endsection --}}
