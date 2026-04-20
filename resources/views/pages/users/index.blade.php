@extends('layouts.app')

@section('title', 'Users')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-button">
                <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></div>
                <div class="breadcrumb-item">Data Users</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <h2 class="section-title">Users</h2>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Users</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-left">
                                <select class="form-control selectric">
                                    <option>Action For Selected</option>
                                    <option>Move to Draft</option>
                                    <option>Move to Pending</option>
                                    <option>Delete Pemanently</option>
                                </select>
                            </div>
                            <div class="float-right">
                                <form method="GET" action="{{ route('user.index') }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="name" value="{{ request()->input('name') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor HP</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}
                                        </td>
                                        <td>{{ $user->email }}
                                        </td>
                                        <td>{{ $user->phone }}
                                        </td>
                                        <td>{{ $user->created_at }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-info btn-icon">
                                                    <i class="fas fa-edit"></i>Edit</a>


                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="ml-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger btn-icon" onclick="return confirm('Are you sure you want to delete this user?')">
                                                        <i class="fas fa-trash"></i>Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="float-right">
                                {{ $users->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
