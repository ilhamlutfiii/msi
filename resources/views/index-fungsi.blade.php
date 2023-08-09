@extends('main')

@section('title', 'Fungsi')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Fungsi</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="fungsi">Fungsi</a></li>
						<li class="active">Data Fungsi</li>
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
					<a href="{{ route('tambah_fungsi') }}" class="btn btn-info"> + Tambah Fungsi Baru</a>
					<form action="{{ route('search_fungsi') }}" method="GET" class="form-inline">
						<div class="input-group">
							<input type="text" name="keyword" class="form-control" placeholder="Cari Fungsi...">
							<div class="input-group-append">
								<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
							</div>
						</div>
					</form>
				</div>
			<table border="1" class="table table-striped table-bordered">
				<tr>
					<th>Id</th>
					<th>Nama Fungsi</th>
					<th>Nama Unit</th>
					<th>Opsi</th>
				</tr>
				@foreach($fungsi as $f)
				<tr>
					<td>{{ $f->fungsi_id }}</td>
					<td>{{ $f->fungsi_name }}</td>
					<td>{{ $f->unit_name }}</td>
					<td>
						<a href="fungsi/edit/{{ $f->fungsi_id }}" class="btn btn-success"><i class="fa fa-edit"> Edit</i></a>
						|
						<a href="fungsi/hapus/{{ $f->fungsi_id }}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
					</td>
				</tr>
				@endforeach
			</table>
		</div><!-- .content -->
    </div>
@endsection