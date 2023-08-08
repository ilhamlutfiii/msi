@extends('main')

@section('title', 'Pinjam Inventaris')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Pinjam Inventaris</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="inventaris">Pinjam Inventaris</a></li>
						<li class="active">Data Pinjam Inventaris</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div class="content mt-3">
		<div class="animated fadeIn">	
			<a href="inventaris/tambah_inventaris" class="btn btn-info"> + Tambah Pinjam Inventaris Baru</a>
			<br/>
			<br/>
			<table border="1" class="table table-striped table-bordered">
				<tr>
					<th>ID inventaris</th>
                    <th>Nama User</th>
                    <th>Nama Komputer</th>
                    <th>Tanggal Pinjam</th>
                    <th>No Tiket</th>
                    <th>Opsi</th>
				</tr>
				@foreach($inventaris as $i)
				<tr>
					<td>{{ $i->inventaris_id }}</td>
					<td>{{ $i->user_nama }}</td>
                    <td>{{ $i->id_perangkat }}</td>
                    <td>{{ $i->tgl_pinjam }}</td>
                    <td><a href="https://helpdesk.plnnusantarapower.co.id/pages/UI.php?operation=details&class=UserRequest&id={{ $i->no_tiket - 43 }}&c[menu]=UserRequest%3ARequestsDispatchedToMyTeams"class="link-no-tiket">R-{{ $i->no_tiket }}</td>
					<td>
						<a href="inventaris/detail/{{ $i->inventaris_id }}" class="btn btn-info"><i class="fa fa-eye"> Detail</i></a>
						<a href="inventaris/edit/{{ $i->inventaris_id }}" class="btn btn-success"><i class="fa fa-edit"> Edit</i></a>
						<a href="inventaris/hapus/{{ $i->inventaris_id }}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
						<a href="inventaris/log/{{ $i->id_perangkat }}" class="btn btn-info"><i class="fa fa-history"> Log History</i></a>
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
