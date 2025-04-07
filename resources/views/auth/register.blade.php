@extends('auth.layout')
@section('title', 'Register')

@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="" method="post">
                <div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Name" />
                        <div class="input-group-text"><span class="bi bi-file-person-fill"></span></div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" />
                    <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" />
                    <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                </div>
                <!--begin::Row-->
                <div class="row">
                    <!-- /.col -->
                    <div class="col">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Sign In</button>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!--end::Row-->
            </form>
            <!-- /.social-auth-links -->
            <p class="d-flex justify-content-center mt-2 mb-1">Dont have account?<a href=""> Register here</a></p>
        </div>
        <!-- /.login-card-body -->
    </div>

@endsection
