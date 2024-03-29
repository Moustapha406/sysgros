@extends("layouts.app_layout")

@section("login_layout")
      <section class="section">
        <div class="container mt-5">
          <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 ">
              <div class="card card-primary">
                  <div class="card-header">
                      <h4>Login</h4>
                  </div>
                  <div class="card-body">
                      <form method="POST" action="{{route('login')}}" class="needs-validation" novalidate="">
                      @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                            @error('email')
                                <div class="text-danger" >
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="d-block">
                            <label for="password" class="control-label">Password</label>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                            @error('password')
                                <div class="text-danger" >
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Connecté
                            </button>
                        </div>
                      </form>
                      
                  </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  
@endsection