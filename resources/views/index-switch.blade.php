@extends('main')

@section('title', 'Insfrastruktur')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Insfrastruktur</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="switch">Insfrastruktur</a></li>
						<li class="active">Data Switch</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div class="content mt-3">
		<div class="animated fadeIn">	
			<a href="switch/tambah_switch" class="btn btn-info"> + Tambah Switch Baru</a>
			<br/>
			<br/>
			<table border="1" class="table table-striped table-bordered">
				<tr>
					<th>Switch Id</th>
					<th>Port</th>
					<th>Nama</th>
					<th>Tipe</th>
                    <th>SN</th>
                    <th>Letak</th>
                    <th>Mac</th>
                    <th>Macc</th>
                    <th>IP Address</th>
                    <th>Referensi</th>
                    <th>Opsi</th>
				</tr>
				@foreach($switch as $s)
				<tr>
					<td>{{ $s->switch_id }}</td>
					<td>{{ $s->port }}</td>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->tipe }}</td>
                    <td>{{ $s->sn }}</td>
                    <td>{{ $s->letak }}</td>
                    <td>{{ $s->mac }}</td>
                    <td>{{ $s->macc }}</td>
					<td>{{ $s->ip_address }}</td>
                    <td>{{ $s->referensi }}</td>
					<td>
						<a href="switch/detail/{{ $s->switch_id }}" class="btn btn-info"><i class="fa fa-eye"> Detail</i></a>
						<a href="switch/edit/{{ $s->switch_id }}" class="btn btn-success"><i class="fa fa-edit"> Edit</i></a>
						<a href="switch/hapus/{{ $s->switch_id }}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
					</td>
				</tr>
				@endforeach
			</table>
		</div><!-- .content -->
    </div>
@endsection

