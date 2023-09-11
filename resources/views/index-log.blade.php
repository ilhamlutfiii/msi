@extends('main')

@section('title', 'Pinjam log')

@section('breadcrumbs')
<!-- Breadcrumbs code here -->
@endsection

@section('content')
<div class="content mt-3">
	<div class="animated fadeIn">
		<div class="d-flex justify-content-between mb-3">
			<h4>Log History ID Perangkat: {{ $id_perangkat }}</h4>
			<form action="{{ route('search_log') }}" method="GET" class="form-inline">
				<div class="input-group">
					<input type="text" name="keyword" class="form-control" placeholder="Cari Log...">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
					</div>
				</div>
			</form>
		</div>
		<table border="1" class="table-bordered fixed-th">
			<thead><tr>
				<th>Nama User</th>
				<th>NID User</th>
				<th>Tanggal Pinjam</th>
				<th>Tanggal Kembali</th>
				<th>Keterangan</th>
			</tr></thead>
			@foreach($logs->where('id_perangkat', $id_perangkat) as $l)
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