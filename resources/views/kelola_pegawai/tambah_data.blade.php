@extends('template_back.layout')
@section('title', 'Tambah Data')
@section('content')

    <!-- /breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <nav aria-label="breadcrumb">
            </nav>
        </div>
    </div>
    <!-- /breadcrumb -->

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0 mt-2">TAMBAH DATA PEGAWAI</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('kelolapegawai.simpan_data') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="nama" class="form-control" placeholder="Nama Pegawai">
                        </div>

                        <div class="form-group">
                            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat Pegawai"></textarea>
                        </div>

                        <div class="form-group">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required="true">
                                <option>--Pilih Jenis Kelamin--</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="date" name="tgl_lahir" class="form-control">
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="role_id" id="role_id" class="form-control" required="true">
                                <option>--Pilih Role--</option>
                                @foreach ($roles as $r)
                                    <option value="{{ $r->id }}">{{ $r->role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                            <button type="submit" class="btn btn-success float-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /row -->
@endsection
