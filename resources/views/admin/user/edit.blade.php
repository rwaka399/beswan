@extends('admin.layout')
@section('title', 'User Page | Edit')

@section('content')

    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">General Form</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">General Form</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col">
                    <!--begin::Quick Example-->
                    <div class="card card-primary card-outline mb-4">
                        <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title">Quick Example</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form action="{{ route('user-update', ['id' => $user->user_id ]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input 
                                        name="name" 
                                        type="text" 
                                        class="form-control" 
                                        value="{{ old('name', $user->name) }}"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input 
                                    name="email" 
                                    type="email" 
                                    class="form-control" 
                                    value="{{ old('email', $user->email) }}"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input 
                                        name="password" 
                                        type="password" 
                                        class="form-control"
                                    >
                                    <small>Kosong password jika tidak ingin diubah</small>
                                </div>
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">Nomor Telepon</label>
                                    <input 
                                        name="phone_number" 
                                        type="text" 
                                        class="form-control" 
                                        value="{{ old('phone_number', $user->phone_number ?? '') }}"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <input 
                                        name="address" 
                                        type="text" 
                                        class="form-control" 
                                        value="{{ old('address', $user->address ?? '') }}"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="role_id" class="form-label">Role</label>
                                    <select name="role_id" class="form-control" id="role_id">
                                        <option value="">-- Pilih Role --</option>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->role_id }}"
                                            {{ $user->userRole->first()?->role_id == $role->role_id ? 'selected' : '' }}>
                                            {{ $role->role_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('user-index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Quick Example-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->


@endsection
