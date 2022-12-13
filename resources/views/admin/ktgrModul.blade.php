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
                    <h3>Kategori modul</h3>
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
                                    <th class="text-center">Nama Bidang</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($ktgrModul as $val)
                                <tr class="text-center">
                                    <td><?= $i++ ?></td>
                                    <td>{{$val->jenis_modul}}</td>
                                    <td class="d-flex justify-content-center">
                                        <!-- <div class="d-flex justify-content-center"> -->
                                        <!-- <div class="d-flex"> -->
                                        <div class="col-2">
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$val->id_kategori_modul}}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                        <div class="col-2">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$val->id_kategori_modul}}">
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

    <!-- Modal add-->
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/ktgrModul/AddKtgrModul" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <input class="form-control" type="text" name="jenis_modul" placeholder="Default input" aria-label="default input example">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal update-->
    @foreach($ktgrModul as $valId)
    <div class="modal fade" id="modalUpdate{{$valId->id_kategori_modul}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/ktgrModul/updateByIdKtgrModul" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <input type="hidden" class="form-control" name="id_kategori_modul" value="{{$valId->id_kategori_modul}}">
                                <input class="form-control" type="text" name="jenis_modul" value="{{$valId->jenis_modul}}" aria-label="default input example">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Modal update-->
    @foreach($ktgrModul as $valDel)
    <div class="modal fade" id="modalDelete{{$valDel->id_kategori_modul}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" value="{{$valDel->id_kategori_modul}}" name="id_kategori_modul">
                    <p>Yakin ingin menghapus data ini...?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <a href="/ktgrModul/deleteByIdKtgrModul/{{$valDel->id_kategori_modul}}" class="btn btn-warning">Delete</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection