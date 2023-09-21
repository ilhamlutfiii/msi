@extends('main')

@section('title', 'Pinjam Sementara')

@section('breadcrumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Pinjam Sementara</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li><a href="pinjam">Pinjam Sementara</a></li>
					<li class="active">Data Pinjam Sementara</li>
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
			<a href="{{ route('tambah_pinjam') }}" class="btn btn-info">
				<span class="d-none d-sm-inline"><i class="fa fa-plus"> Tambah Pinjam Sementara Baru</i></span>
        		<span class="d-inline d-sm-none"><i class="fa fa-plus"></i></span>
			</a>
			<form action="{{ route('search_pinjam') }}" method="GET" class="form-inline">
				<div class="input-group">
					<input type="text" name="keyword" class="form-control" placeholder="Cari Pinjam Sementara...">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<div class="table-container">
		<table border="1" class="table table-bordered table-responsive fixed-header-table">
			<thead><tr>
				<th>Nama User</th>
				<th>NID User</th>
				<th>ID Perangkat</th>
				<th>Opsi</th>
			</tr></thead>
			@foreach($pinjam as $p)
			<tr>
				<td>{{ $p->user_nama }}</td>
				<td>{{ $p->user_nid }}</td>
				<td>{{ $p->id_perangkat }}</td>
				<td>
					<a href="../pinjam/detail/{{ $p->pinjam_id }}" class="btn btn-info"><i class="fa fa-eye"> Detail</i></a>
					|
					<a href="../pinjam/edit/{{ $p->pinjam_id }}" class="btn btn-success"><i class="fa fa-edit"> Edit</i></a>
					|
					<a href="../pinjam/hapus/{{ $p->pinjam_id }}" class="btn btn-danger"><i class="fa fa-recycle"> Kembalikan</i></a>
				</td>
			</tr>
			@endforeach
		</table>
		</div>
	</div><!-- .content -->
</div>
@endsection
