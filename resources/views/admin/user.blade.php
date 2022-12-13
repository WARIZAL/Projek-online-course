@extends('layout.template')
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Akun user</h3>
                    <p class="text-subtitle text-muted">A sortable, searchable, paginated table without dependencies thanks to simple-datatables</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <div class="mb-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">
                            Tambah Data
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Level</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($users as $val)
                                <tr class="text-center">
                                    <td><?= $i++ ?></td>
                                    <td>{{$val->username}}</td>
                                    <td>{{$val->role}}</td>
                                    <td class="d-flex justify-content-center">
                                        <!-- <div class="d-flex justify-content-center"> -->
                                        <!-- <div class="d-flex"> -->
                                        <div class="col-2">
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$val->id_user}}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                        <div class="col-2">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$val->id_user}}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                        <!-- </div> -->
                                        <!-- </div> -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
    </div>

</div>
@endsection