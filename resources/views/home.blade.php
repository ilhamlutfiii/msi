@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Dashboard</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="#">Dashboard</a></li>
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
				</tr>
				@foreach($home as $h)
				<tr>
					<td>{{ $h->user_id }}</td>
					<td>{{ $h->user_nid }}</td>
					<td>{{ $h->user_nama }}</td>
					<td>{{ $h->user_password }}</td>
					<td>{{ $h->jabatan_name }}</td>
					<td>{{ $h->bidang_name }}</td>
					<td>{{ $h->fungsi_name }}</td>
					<td>{{ $h->unit_name }}</td>
				</tr>
				@endforeach
			</table>
		</div><!-- .content -->
    </div>
@endsection