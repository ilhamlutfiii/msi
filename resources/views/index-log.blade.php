@extends('main')

@section('title', 'Pinjam log')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Log History Pinjam Inventaris</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="log">Log History Pinjam Inventaris</a></li>
						<li class="active">Data Log History Pinjam Inventaris</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div class="content mt-3">
		<div class="animated fadeIn">
					<form action="{{ route('search_log') }}" method="GET" class="form-inline">
						<div class="input-group">
							<input type="text" name="keyword" class="form-control" placeholder="Cari Log...">
							<div class="input-group-append">
								<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
							</div>
						</div>
					</form>
			<h4>Log History ID Perangkat: {{ $id_perangkat }}</h4>
			<br/>
			<br/>
			<table border="1" class="table table-striped table-bordered">
				<tr>
                    <th>Nama User</th>
					<th>NID User</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Keterangan</th>
				</tr>
				@foreach($logs as $l)
				<tr>
					<td>{{ $l->user_nama }}</td>
					<td>{{ $l->user_nid }}</td>
                    <td>{{ $l->tgl_pinjam }}</td>
					<td>{{ $l->tgl_kembali }}</td>
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
