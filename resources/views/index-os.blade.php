@extends('main')

@section('title', 'OS')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>OS</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="os">OS</a></li>
						<li class="active">Data OS</li>
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
					<a href="{{ route('tambah_os') }}" class="btn btn-info"> + Tambah OS Baru</a>
					<form action="{{ route('search_os') }}" method="GET" class="form-inline">
						<div class="input-group">
							<input type="text" name="keyword" class="form-control" placeholder="Cari OS...">
							<div class="input-group-append">
								<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
							</div>
						</div>
					</form>
				</div>
			<table border="1" class="table table-striped table-bordered">
				<tr>
					<th>OS ID</th>
					<th>Nama OS</th>
					<th>Ram/HDD</th>
					<th>Opsi</th>
				</tr>
				@foreach($os as $o)
				<tr>
					<td>{{ $o->os_id }}</td>
					<td>{{ $o->os_name }}</td>
					<td>{{ $o->ram_hdd }}</td>
					<td>
						<a href="os/edit/{{ $o->os_id }}" class="btn btn-success"><i class="fa fa-edit"> Edit</i></a>
						|
						<a href="os/hapus/{{ $o->os_id }}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
					</td>
				</tr>
				@endforeach
			</table>
		</div><!-- .content -->
    </div>
@endsection