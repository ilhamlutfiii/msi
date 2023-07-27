@extends('main')

@section('title', 'Komputer')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Komputer</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="komputer">Komputer</a></li>
						<li class="active">Data Komputer</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<div class="content mt-3">
		<div class="animated fadeIn">	
			<a href="komputer/tambah_komputer" class="btn btn-info"> + Tambah Komputer Baru</a>
			<br/>
			<br/>
			<table border="1" class="table table-striped table-bordered">
				<tr>
					<th>ID Perangkat</th>
					<th>Hostname</th>
                    <th>Port</th>
					<th>Kategori</th>
					<th>Pengguna</th>
                    <th>IP Address</th>
                    <th>Lokasi</th>
                    <th>Referensi</th>
                    <th>OS</th>
                    <th>Ram/HDD</th>
                    <th>Inventaris</th>
                    <th>Status</th>
                    <th>Penggunaan</th>
                    <th>Keterangan</th>
                    <th>Mac</th>
                    <th>Macc</th>
                    <th>Tahun</th>
                    <th>Opsi</th>
				</tr>
				@foreach($komputer as $k)
				<tr>
					<td>{{ $k->id_perangkat }}</td>
					<td>{{ $k->hostname}}</td>
                    <td>{{ $k->port }}</td>
                    <td>{{ $k->kategori }}</td>
                    <td>{{ $k->pengguna }}</td>
                    <td>{{ $k->ip_address }}</td>
                    <td>{{ $k->lokasi }}</td>
                    <td>{{ $k->referensi }}</td>
					<td>{{ $k->os_name }}</td>
                    <td>{{ $k->ram_hdd }}</td>
                    <td>{{ $k->inventaris }}</td>
                    <td>{{ $k->status }}</td>
                    <td>{{ $k->penggunaan }}</td>
                    <td>{{ $k->keterangan }}</td>
                    <td>{{ $k->mac }}</td>
                    <td>{{ $k->macc }}</td>
                    <td>{{ $k->tahun }}</td>
					<td>
						<a href="komputer/detail/{{ $k->id_perangkat }}" class="btn btn-info"><i class="fa fa-magic">Detail</i></a>
						<a href="komputer/edit/{{ $k->id_perangkat }}" class="btn btn-success"><i class="fa fa-magic">Edit</i></a>
						<a href="komputer/hapus/{{ $k->id_perangkat }}" class="btn btn-danger"><i class="fa fa-magic">Hapus</i></a>
					</td>
				</tr>
				@endforeach
			</table>
		</div><!-- .content -->
    </div>
@endsection