@extends('main')

@section('title', 'Bidang')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Bidang</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="bidang">Bidang</a></li>
						<li class="active">Data Bidang</li>
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
					<a href="{{ route('tambah_bidang') }}" class="btn btn-info"> + Tambah Bidang Baru</a>
					<form action="{{ route('search_bidang') }}" method="GET" class="form-inline">
						<div class="input-group">
							<input type="text" name="keyword" class="form-control" placeholder="Cari Bidang...">
							<div class="input-group-append">
								<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
							</div>
						</div>
					</form>
				</div>
			<table border="1" class="table table-striped table-bordered">
				<tr>
					<th>Id</th>
					<th>Nama bidang</th>
					<th>Opsi</th>
				</tr>
				@foreach($bidang as $b)
				<tr>
					<td>{{ $b->bidang_id }}</td>
					<td>{{ $b->bidang_name }}</td>
					<td>
						<a href="../bidang/edit/{{ $b->bidang_id }}" class="btn btn-success"><i class="fa fa-edit"> Edit</i></a>
						|
						<a href="../bidang/hapus/{{ $b->bidang_id }}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
					</td>
				</tr>
				@endforeach
			</table>
		</div><!-- .content -->
    </div>
@endsection