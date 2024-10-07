@extends('frontend.layout.front-main')
@section('container')
 <!-- Background image -->
 <div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="card" style="width: 500px;">
        <div class="card-body">
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
                </div>
            @endif
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>

              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
              </div>

              <button type="submit" class="btn btn-primary">Login</button>

        </form>
    </div>
    </div>
</div>
@endsection
