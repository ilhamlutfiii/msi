@extends('main')

@section('title', 'inventaris Inventaris')

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
			<table border="80" class="table table-striped table-bordered">
            @foreach($inventaris as $i)
                        <tr>
                            <td><strong>Nama User</strong><td> {{ $i->user_nama }}</td></td>
                        </tr>
						<tr>
                            <td><strong>NID User</strong><td> {{ $i->user_nid }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>ID Perangkat</strong><td> {{ $i->id_perangkat }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Pinjam</strong><td> {{ $i->tgl_pinjam }}</td></td>
                        </tr>                     
                        <tr>
                            <td>
                                <a href="../edit/{{ $i->inventaris_id }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                <a href="../hapus/{{ $i->inventaris_id }}" class="btn btn-danger"><i class="fa fa-recycle"></i> Kembalikan</a>
                            </td>
                        </tr>
                    @endforeach
			</table>
		</div><!-- .content -->
    </div>
@endsection