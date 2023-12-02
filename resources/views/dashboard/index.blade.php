@extends('template_back.layout')
@section('title', 'Dashboard')
@section('content')
    @include('sweetalert::alert')

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h2 class="content-title mb-2">HALO, SELAMAT DATANG!</h2>
            <h2 class="content-title mb-2">SISTEM INFORMASI MONITORING</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /breadcrumb -->


    <!-- main-content-body -->
    <!-- row opened -->
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h2>{{ $totalTask }}</h2>
                            <h4>Total Task Harian</h4>
                        </div>
                        <div class="col-6">
                            <h2 class="text-right text-muted fs-20"><i class="fe fe-user"></i></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h2>{{ $totalPegawai }}</h2>
                            <h4>Total Pegawai</h4>
                        </div>
                        <div class="col-6">
                            <h2 class="text-right text-muted fs-20"><i class="fe fe-user"></i></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0 mt-2">Task Harian</h4>
                    </div>

                    <div class="row align-items-center mt-2">
                        {{-- <div class="col-auto">
                            <form action="{{ route('search') }}" method="GET">
                                <input type="search" class="form-control" name="search" placeholder="Cari">
                            </form>
                        </div> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="example1">
                            <thead>
                                <tr>
                                    <th class="">No</th>
                                    <th class="">Tanggal</th>
                                    <th class="">Task Harian</th>
                                    <th class="">Nama Pegawai</th>
                                    <th class="">Status</th>
                                    <th class="">Tanggal Selesai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($monitoring as $m)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d-m-Y', strtotime($m->tanggal)) }}</td>
                                        <td>{{ $m->task_harian }}</td>
                                        <td>{{ $m->user->pegawai->nama }}</td>
                                        @if (strtolower(auth()->user()->role->role) == strtolower('Pegawai'))
                                            @if ($m->status == 0)
                                                <td><button type="button" class="btn btn-sm btn-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#uploadTask{{ $m->id }}">Upload
                                                        Task</button></td>
                                            @else
                                                <td><span class="badge bg-success">Selesai</span></td>
                                            @endif
                                        @else
                                            @if ($m->status == 0)
                                                <td><span class="badge bg-info">Progress</span></td>
                                            @else
                                                <td><span class="badge bg-success text-white">Selesai</span></td>
                                            @endif
                                        @endif
                                        @if ($m->tanggal_selesai != null)
                                            <td>{{ date('d-m-Y', strtotime($m->tanggal_selesai)) }}</td>
                                        @else
                                            <td><span class="text-muted text-center">Task Belum Selesai</span></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

@endsection
