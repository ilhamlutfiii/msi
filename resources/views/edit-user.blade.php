@extends('main')

@section('title', 'Edit user')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Edit user</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="/user">user</a></li>
						<li><a href="/user/edit_user">Edit user</a></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<br/>
	<br/>

<div class="card-body card-block">

	@foreach($user as $u)
	<form action="/user/update" method="post" class="">
		{{ csrf_field() }}
			<div class="form-group"><label class="form-control-label">User ID</label><input type="text" name="user_id" class="form-control" value="{{ $u->user_id }}" readonly></div>
			
			<div class="form-group"><label class="form-control-label">NID User</label><input type="text" name="user_nid" class="form-control" value="{{ $u->user_nid }}"></div>
			
			<div class="form-group"><label class="form-control-label">Nama User :</label><input type="text" name="user_nama" class="form-control" value="{{ $u->user_nama }}"></div>
			
			<div class="form-group"><label class="form-control-label">Password :</label><input type="text" name="user_password" class="form-control" value="{{ $u->user_password }}"></div>		
			
			<div class="form-group"><label class="form-control-label">Bidang :</label> </br>
				<select name="bidang_id" id="select" class="form-control">
						<option value="{{ $u->bidang_id }}">{{ $u->bidang_name }}</option>
						@foreach($bidang as $b)
						<option value="{{ $b->bidang_id }}">-- {{ $b->bidang_name }} --</option>
						@endforeach
				</select>
			</div>			
			
			<div class="form-group"><label class="form-control-label">Fungsi :</label> </br>
				<select name="fungsi_id" id="select" class="form-control">
						<option value="{{ $u->fungsi_id }}">{{ $u->fungsi_name }}</option>
						@foreach($fungsi as $f)
						<option value="{{ $f->fungsi_id }}">-- {{ $f->fungsi_name }} --</option>
						@endforeach
				</select>
			</div>			
			
			<div class="form-group"><label class="form-control-label">Jabatan :</label> </br>
				<select name="jabatan_id" id="select" class="form-control">
						<option value="{{ $u->jabatan_id }}">{{ $u->jabatan_name }}</option>
						@foreach($jabatan as $j)
						<option value="{{ $j->jabatan_id }}">-- {{ $j->jabatan_name }} --</option>
						@endforeach
				</select>
			</div>
			
			<button type="submit" class="btn btn-primary btn-sm">
				<i class="fa fa-dot-circle-o"></i> Submit
			</button>
			<button type="reset" class="btn btn-danger btn-sm">
				<i class="fa fa-ban"></i> Reset
			</button>
	</form>
	@endforeach
</div>
	
@endsection