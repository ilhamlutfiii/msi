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
			<a href="bidang/tambah" class="btn btn-info"> + Tambah bidang Baru</a>
			<br/>
			<br/>
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
						<a href="bidang/edit/{{ $b->bidang_id }}" class="btn btn-success"><i class="fa fa-edit"> Edit</i></a>
						|
						<a href="bidang/hapus/{{ $b->bidang_id }}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
					</td>
				</tr>
				@endforeach
			</table>
		</div><!-- .content -->
    </div>
@endsection