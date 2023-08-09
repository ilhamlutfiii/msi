@extends('main')

@section('title', 'Pinjam Sementara')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Pinjam Sementara</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="pinjam">Pinjam Sementara</a></li>
						<li class="active">Data Pinjam Sementara</li>
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
					<a href="{{ route('tambah_pinjam') }}" class="btn btn-info"> + Tambah Pinjam Baru</a>
					<form action="{{ route('search_pinjam') }}" method="GET" class="form-inline">
						<div class="input-group">
							<input type="text" name="keyword" class="form-control" placeholder="Cari Pinjam Sementara...">
							<div class="input-group-append">
								<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
							</div>
						</div>
					</form>
				</div>
			<table border="1" class="table table-striped table-bordered">
				<tr>
					<th>ID Pinjam</th>
                    <th>Nama User</th>
					<th>NID User</th>
                    <th>ID Perangkat</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>No Tiket</th>
                    <th>Opsi</th>
				</tr>
				@foreach($pinjam as $p)
				<tr>
					<td>{{ $p->pinjam_id }}</td>
					<td>{{ $p->user_nama }}</td>
					<td>{{ $p->user_nid }}</td>
                    <td>{{ $p->id_perangkat }}</td>
                    <td>{{ $p->tgl_pinjam }}</td>
                    <td>{{ $p->tgl_kembali }}</td>
                    <td><a href="https://helpdesk.plnnusantarapower.co.id/pages/UI.php?operation=details&class=UserRequest&id={{ $p->no_tiket - 43 }}&c[menu]=UserRequest%3ARequestsDispatchedToMyTeams"class="link-no-tiket">R-{{ $p->no_tiket }}</td>
					<td>
						<a href="pinjam/detail/{{ $p->pinjam_id }}" class="btn btn-info"><i class="fa fa-eye"> Detail</i></a>
						<a href="pinjam/edit/{{ $p->pinjam_id }}" class="btn btn-success"><i class="fa fa-edit"> Edit</i></a>
						<a href="pinjam/hapus/{{ $p->pinjam_id }}" class="btn btn-danger"><i class="fa fa-recycle"> Kembalikan</i></a>
					</td>
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
