@extends('main')

@section('title', 'Komputer')

@section('breadcrumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Komputer</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li><a href="komputer">Komputer</a></li>
					<li class="active">Data Komputer</li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="content mt-3">
	<div class="animated fadeIn">
		<div class="d-flex justify-content-between mb-3">
			<a href="{{ route('tambah_komputer') }}" class="btn btn-info"> 
				<span class="d-none d-sm-inline"><i class="fa fa-plus"> Tambah Komputer Baru</i></span>
        		<span class="d-inline d-sm-none"><i class="fa fa-plus"></i></span>
			</a>
			<form action="{{ route('search_komputer') }}" method="GET" class="form-inline">
				<div class="input-group">
					<input type="text" name="keyword" class="form-control" placeholder="Cari Komputer...">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<div class="table-container">
		<table border="1" class="table table-bordered table-responsive fixed-header-table">
			<thead>
				<tr>
					<th>ID Perangkat</th>
					<th>Hostname</th>
					<th>Nama User</th>
					<th>Opsi</th>
				</tr>
			</thead>
			@foreach($komputer as $k)
			<tr>
				<td>{{ $k->id_perangkat }}</td>
				<td>{{ $k->hostname}}</td>
				<td>{{ $k->user_nama}}</td>
				<td>
					<a href="../komputer/detail/{{ $k->komp_id }}" class="btn btn-info"><i class="fa fa-eye"> Detail</i></a>
					|
					<a href="../komputer/edit/{{ $k->komp_id }}" class="btn btn-success"><i class="fa fa-edit"> Edit</i></a>
					|
					<a href="../komputer/hapus/{{ $k->komp_id }}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
					|
					<a href="{{ route('komputer_log') }}/{{ $k->komp_id }}" class="btn btn-info"><i class="fa fa-history"> Log History</i></a>
				</td>
			</tr>
			@endforeach
		</table>
		</div>
	</div><!-- .content -->
</div>
@endsection