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
						<li><a href="../">Komputer</a></li>
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
			<table border="80" class="table table-striped table-bordered">
            @foreach($komputer as $k)
                        <tr>
                            <td><strong>ID Perangkat</strong><td>{{ $k->id_perangkat }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Hostname</strong><td>{{ $k->hostname }} </td></td>
                        </tr>
                        <tr>
                            <td><strong>Port</strong><td> {{ $k->port }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Kategori</strong><td> {{ $k->kategori }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Pengguna</strong><td> {{ $k->pengguna }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>IP Address</strong><td> {{ $k->ip_address }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Lokasi</strong><td> {{ $k->lokasi }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Referensi</strong><td> {{ $k->referensi }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>OS</strong><td> {{ $k->os_name }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Ram/HDD</strong><td> {{ $k->ram_hdd }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Inventaris</strong><td> {{ $k->inventaris }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Status</strong><td> {{ $k->status }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Penggunaan</strong><td> {{ $k->penggunaan }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Mac</strong><td> {{ $k->mac }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Macc</strong><td> {{ $k->macc }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Tahun</strong><td> {{ $k->tahun }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Keterangan</strong><td> {{ $k->keterangan }}</td></td>
                        </tr>
                        
                        <tr>
                            <td>
                                <a href="../edit/{{ $k->komp_id }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                <a href="../hapus/{{ $k->komp_id }}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    @endforeach
			</table>
		</div><!-- .content -->
    </div>
@endsection