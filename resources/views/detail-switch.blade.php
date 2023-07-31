@extends('main')

@section('title', 'Insfrastruktur')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Insfrastruktur</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="switch">Insfrastruktur</a></li>
						<li class="active">Data Switch</li>
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
            @foreach($switch as $s)
                        <tr>
                            <td><strong>Switch ID</strong><td>{{ $s->switch_id }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Port</strong><td>{{ $s->port }} </td></td>
                        </tr>
                        <tr>
                            <td><strong>Nama</strong><td> {{ $s->nama }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Tipe</strong><td> {{ $s->tipe }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>SN</strong><td> {{ $s->sn }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Letak</strong><td> {{ $s->letak }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Mac</strong><td> {{ $s->mac }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Macc</strong><td> {{ $s->macc }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>IP Address</strong><td> {{ $s->ip_address }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Referensi</strong><td> {{ $s->referensi }}</td></td>
                        </tr>                        
                        <tr>
                            <td>
                                <a href="../edit/{{ $s->switch_id }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                <a href="../hapus/{{ $s->switch_id }}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    @endforeach
			</table>
		</div><!-- .content -->
    </div>
@endsection