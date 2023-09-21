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
			<a href="{{ route('tambah_user') }}" class="btn btn-info"> 
				<span class="d-none d-sm-inline"><i class="fa fa-plus"> Tambah User Baru </i></span>
        		<span class="d-inline d-sm-none"><i class="fa fa-plus"></i></span>
			</a>
			<form action="{{ route('search_user') }}" method="GET" class="form-inline">
				<div class="input-group">
					<input type="text" name="keyword" class="form-control" placeholder="Cari User...">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
		<div class="table-container">
		<table border="1" class="table table-bordered table-responsive fixed-header-table">
			<thead><tr>
				<th>User_NID</th>
				<th>Nama User</th>
				<th>Password</th>
				<th>Opsi</th>
			</tr></thead>
			@foreach($users as $u)
			<tr>
				<!-- <td>{{ $u->user_id }}</td> -->
				<td>{{ $u->user_nid }}</td>
				<td>{{ $u->user_nama }}</td>
				<td>{{ $u->cpass }}</td>
				<td>
					<a href="../user/detail/{{ $u->user_id }}" class="btn btn-info"><i class="fa fa-eye"> Detail</i></a>
					|
					<a href="../user/edit/{{ $u->user_id }}" class="btn btn-success"><i class="fa fa-edit"> Edit</i></a>
					@if(Auth::check() && Auth::user()->user_nama != $u->user_nama)
					|
					<a href="../user/hapus/{{ $u->user_id }}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
					@endif
				</td>
			</tr>
			@endforeach
		</table>
		</div>
	</div><!-- .content -->
</div>
@endsection