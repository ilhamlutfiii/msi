@extends('main')

@section('title', 'Unit')

@section('breadcrumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Unit</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li><a href="unit">Unit</a></li>
					<li class="active">Data Unit</li>
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
			<a href="{{ route('tambah_unit') }}" class="btn btn-info"> + Tambah Unit Baru</a>
			<form action="{{ route('search_unit') }}" method="GET" class="form-inline">
				<div class="input-group">
					<input type="text" name="keyword" class="form-control" placeholder="Cari Unit...">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
					</div>
				</div>
			</form>
		</div>
		<table border="1" class="table-bordered fixed-th">
			<thead><tr>
				<th>Nama Unit</th>
				<th>Opsi</th>
			</tr></thead>

			@foreach($unit as $u)
			<tr>
				<td>{{ $u->unit_name }}</td>
				<td>
					<a href="../unit/edit/{{ $u->unit_id }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
					|
					<a href="../unit/hapus/{{ $u->unit_id }}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus </a>
				</td>
			</tr>
			@endforeach
		</table>
	</div><!-- .content -->
</div>
@endsection