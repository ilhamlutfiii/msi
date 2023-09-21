@extends('main')

@section('title', 'ip')

@section('breadcrumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>IP</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li><a href="ip">IP</a></li>
					<li class="active">Data IP</li>
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
			<a href="{{ route('tambah_ip') }}" class="btn btn-info">
				<span class="d-none d-sm-inline"><i class="fa fa-plus"> Tambah IP Address Baru </i></span>
        		<span class="d-inline d-sm-none"><i class="fa fa-plus"></i></span>
			</a>
			<form action="{{ route('search_ip') }}" method="GET" class="form-inline">
				<div class="input-group">
					<input type="text" name="keyword" class="form-control" placeholder="Cari IP...">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<div class="table-container">
		<table border="1" class="table table-bordered table-responsive fixed-header-table">
			<thead><tr>
				<th>IP Address</th>
				<th>Bagian</th>
				<th>Keterangan</th>
				<th>Opsi</th>
			</tr></thead>
			@foreach($ip as $i)
			<tr>
				<td>{{ $i->ip_address }}</td>
				<td>{{ $i->bagian }}</td>
				<td>{{ $i->keterangan }}</td>
				<td>
					<a href="../ip/edit/{{ $i->ip_id }}" class="btn btn-success"><i class="fa fa-edit"> Edit</i></a>
					|
					<a href="../ip/hapus/{{ $i->ip_id }}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
				</td>
			</tr>
			@endforeach
		</table>
		</div>
	</div><!-- .content -->
</div>
@endsection