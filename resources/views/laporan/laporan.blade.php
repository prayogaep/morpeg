@extends('template_back.layout')
@section('title','Laporan')
@section('content')
@include('sweetalert::alert')

<!-- /breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Tabel</li>
                <li class="breadcrumb-item active" aria-current="page">Laporan</li>
            </ol>
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
                    <h4 class="card-title mg-b-0 mt-2">Laporan</h4>
                    <a href="@" class="btn btn-success">Tambah Nilai</a>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>

                <div class="row align-items-center mt-2">
                    <div class="col-auto">
                        <form action="{{ route ('search') }}" method="GET">
                            <input type="search" class="form-control" name="search" placeholder="Cari">
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">No</th>
                                <th class="wd-15p border-bottom-0">Nama Pegawai</th>
                                <th class="wd-15p border-bottom-0">Kedisiplinan</th>
                                <th class="wd-15p border-bottom-0">Kesopanan</th>
                                <th class="wd-15p border-bottom-0">Semangat Bekerja</th>
                                <th class="wd-15p border-bottom-0">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /row -->



<!-- <script type="text/javascript">

			window.deleteConfirm = function (e) {
			e.preventDefault();
			var form = e.target.form;
			swal({
				title: "Are you sure you want to delete?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					form.submit();
				}
			});
		};
		onclick="deleteConfirm(event)"

 	</script> -->

@endsection