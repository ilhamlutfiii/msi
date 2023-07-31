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
			<a href="user/tambah_user" class="btn btn-info"> + Tambah User Baru</a>
			<br/>
			<br/>
			<table border="1" class="table table-striped table-bordered">
				<tr>
					<th>User ID</th>
					<th>NID</th>
					<th>Nama User</th>
					<th>Password</th>
					<th>Jabatan</th>
					<th>Bidang</th>
					<th>Fungsi</th>
					<th>Unit</th>
					<th>Opsi</th>
				</tr>
				@foreach($user as $u)
				<tr>
					<td>{{ $u->user_id }}</td>
					<td>{{ $u->user_nid }}</td>
					<td>{{ $u->user_nama }}</td>
					<td>{{ $u->user_password }}</td>
					<td>{{ $u->jabatan_name }}</td>
					<td>{{ $u->bidang_name }}</td>
					<td>{{ $u->fungsi_name }}</td>
					<td>{{ $u->unit_name }}</td>
					<td>
						<a href="user/edit/{{ $u->user_id }}" class="btn btn-success"><i class="fa fa-edit"> Edit</i></a>
						|
						<a href="user/hapus/{{ $u->user_id }}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
					</td>
				</tr>
				@endforeach
			</table>
		</div><!-- .content -->
    </div>
@endsection