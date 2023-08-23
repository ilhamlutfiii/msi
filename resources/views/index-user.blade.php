@extends('main')

@section('title', 'user')

@section('breadcrumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>User</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li><a href="user">User</a></li>
					<li class="active">Data User</li>
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
			<a href="{{ route('tambah_user') }}" class="btn btn-info"> + Tambah User Baru</a>
			<form action="{{ route('search_user') }}" method="GET" class="form-inline">
				<div class="input-group">
					<input type="text" name="keyword" class="form-control" placeholder="Cari User...">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
					</div>
				</div>
			</form>
		</div>
		<table border="1" class="table table-striped table-bordered">
			<tr>
				<th>User ID</th>
				<th>User NID</th>
				<th>Nama User</th>
				<th>Password</th>
				<th>Jabatan</th>
				<th>Bidang</th>
				<th>Fungsi</th>
				<th>Unit</th>
				<th>Opsi</th>
			</tr>
			@foreach($users as $u)
			<tr>
				<td>{{ $u->user_id }}</td>
				<td>{{ $u->user_nid }}</td>
				<td>{{ $u->user_nama }}</td>
				<td>{{ $u->password }}</td>
				<td>{{ $u->jabatan_name }}</td>
				<td>{{ $u->bidang_name }}</td>
				<td>{{ $u->fungsi_name }}</td>
				<td>{{ $u->unit_name }}</td>
				<td>
					<a href="../user/edit/{{ $u->user_id }}" class="btn btn-success"><i class="fa fa-edit"> Edit</i></a>
					@if(Auth::check() && Auth::user()->user_nama != $u->user_nama)
					|
					<a href="../user/hapus/{{ $u->user_id }}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
					@endif
				</td>
			</tr>
			@endforeach
		</table>
	</div><!-- .content -->
</div>
@endsection