@extends('main')

@section('title', 'Pinjam log')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Pinjam log</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="log">Pinjam log</a></li>
						<li class="active">Data Pinjam log</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div class="content mt-3">
		<div class="animated fadeIn">
			<h4>Log History Komputer: {{ $id_perangkat }}</h4>
			<br/>
			<br/>
			<table border="1" class="table table-striped table-bordered">
				<tr>
                    <th>Nama User</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>No Tiket</th>
                    <th>Keterangan</th>
				</tr>
				@foreach($logs as $l)
				<tr>
					<td>{{ $l->user_nama }}</td>
                    <td>{{ $l->tgl_pinjam }}</td>
					<td>{{ $l->tgl_kembali }}</td>
                    <td><a href="https://helpdesk.plnnusantarapower.co.id/pages/UI.php?operation=details&class=UserRequest&id={{ $l->no_tiket - 43 }}&c[menu]=UserRequest%3ARequestsDispatchedToMyTeams"class="link-no-tiket">R-{{ $l->no_tiket }}</td>
					<td>{{ $l->keterangan }}</td>
				</tr>
				@endforeach
			</table>
		</div><!-- .content -->
    </div>
@endsection
<style>
	.link-no-tiket {
		color: #007bff;
	}
	
	.link-no-tiket:hover {
		color: #0056b3;
		text-decoration: underline;
	}
</style>
