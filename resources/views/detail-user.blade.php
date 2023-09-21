@extends('main')

@section('title', 'User')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>User</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="../">User</a></li>
						<li class="active">Data User</li>
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
            @foreach($user as $u)
                        <tr>
                            <td><strong>User NID</strong><td>{{ $u->user_nid }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Nama User</strong><td>{{ $u->user_nama }} </td></td>
                        </tr>
                        <tr>
                            <td><strong>Password</strong><td> {{ $u->cpass }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Jabatan</strong><td> {{ $u->jabatan_name }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Bidang</strong><td> {{ $u->bidang_name }}</td></td>
                        </tr>
                        <tr>
                            <td><strong>Fungsi</strong><td> {{ $u->fungsi_name }}</td></td>
                        </tr>
                        
                        
                        
                        <tr>
                            <td>
                                <a href="../edit/{{ $u->user_id }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                @if(Auth::check() && Auth::user()->user_nama != $u->user_nama)
                                <a href="../hapus/{{ $u->user_id }}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
			</table>
		</div><!-- .content -->
    </div>
@endsection