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
						<li class="active">Data pinjam</li>
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
            @foreach($pinjam as $p)
                        <tr>
                            <td><strong>ID Pinjam</strong><td>{{ $p->pinjam_id }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Nama User</strong><td> {{ $p->user_nama }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Nama Komputer</strong><td> {{ $p->id_perangkat }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Pinjam</strong><td> {{ $p->tgl_pinjam }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Kembali</strong><td> {{ $p->tgl_kembali }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>No Tiket</strong><td> R-{{ $p->no_tiket }}</td></td>
                        </tr>                        
                        <tr>
                            <td>
                                <a href="../edit/{{ $p->pinjam_id }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                <a href="../hapus/{{ $p->pinjam_id }}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    @endforeach
			</table>
		</div><!-- .content -->
    </div>
@endsection