@extends('main')

@section('title', 'Peminjaman')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Peminjaman</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="pinjam">Peminjaman</a></li>
						<li class="active">Data Peminjaman</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div class="content mt-3">
		<div class="animated fadeIn">	
			<a href="pinjam/tambah_pinjam" class="btn btn-info"> + Tambah Peminjaman Baru</a>
			<br/>
			<br/>
			<table border="1" class="table table-striped table-bordered">
				<tr>
					<th>ID Pinjam</th>
                    <th>Nama User</th>
                    <th>Nama Komputer</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>No Tiket</th>
                    <th>Opsi</th>
				</tr>
				@foreach($pinjam as $p)
				<tr>
					<td>{{ $p->pinjam_id }}</td>
					<td>{{ $p->user_nama }}</td>
                    <td>{{ $p->hostname }}</td>
                    <td>{{ $p->tgl_pinjam }}</td>
                    <td>{{ $p->tgl_kembali }}</td>
                    <td><a href="https://helpdesk.plnnusantarapower.co.id/pages/UI.php?operation=details&class=UserRequest&id={{ $p->no_tiket - 43 }}&c[menu]=UserRequest%3ARequestsDispatchedToMyTeams"class="link-no-tiket">R-{{ $p->no_tiket }}</td>
					<td>
						<a href="pinjam/detail/{{ $p->pinjam_id }}" class="btn btn-info"><i class="fa fa-eye"> Detail</i></a>
						<a href="pinjam/edit/{{ $p->pinjam_id }}" class="btn btn-success"><i class="fa fa-edit"> Edit</i></a>
						<a href="pinjam/hapus/{{ $p->pinjam_id }}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
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
