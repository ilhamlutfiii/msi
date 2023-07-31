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
			<a href="unit/tambah_unit" class="btn btn-info"> + Tambah Unit Baru</a>
	
			<br/>
			<br/>
			<table border="1" class="table table-striped table-bordered">
			<tr>
				<th>ID Unit</th>
				<th>Nama Unit</th>
				<th>Opsi</th>
			</tr>
			
			@foreach($unit as $u)
			<tr>
				<td>{{ $u->unit_id }}</td>
				<td>{{ $u->unit_name }}</td>
				<td>
					<a href="unit/edit/{{ $u->unit_id }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
					|
					<a href="unit/hapus/{{ $u->unit_id }}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus  </a>
				</td>
			</tr>
			@endforeach
			</table>
		</div><!-- .content -->
    </div>
@endsection
