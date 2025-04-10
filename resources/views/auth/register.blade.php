@extends('admin.layout')
@section('title', 'User Page | Create')

@section('content')

<!--begin::App Content Header-->
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Registrasi Pengguna</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--end::App Content Header-->

<!--begin::App Content-->
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <div class="card-title">Form Registrasi</div>
                    </div>

                    <!-- Notifikasi Error -->
                    @if($errors->any())
                        <div class="alert alert-danger m-3">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('register-post') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input 
                                    name="name" 
                                    id="name" 
                                    type="text" 
                                    class="form-control" 
                                    value="{{ old('name') }}"
                                    required
                                >
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input 
                                    name="email" 
                                    id="email"
                                    type="email" 
                                    class="form-control"
                                    value="{{ old('email') }}"
                                    required
                                >
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input 
                                    name="password" 
                                    id="password"
                                    type="password" 
                                    class="form-control"
                                    required
                                >
                            </div>
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Nomor Telepon</label>
                                <input 
                                    name="phone_number" 
                                    id="phone_number"
                                    type="text" 
                                    class="form-control" 
                                    value="{{ old('phone_number') }}"
                                    required
                                >
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <input 
                                    name="address" 
                                    id="address"
                                    type="text" 
                                    class="form-control"
                                    value="{{ old('address') }}"
                                    required
                                >
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Registrasi</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::App Content-->

@endsection
