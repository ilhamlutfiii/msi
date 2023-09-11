@extends('main')

@section('title', 'Tambah user')

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
					<li><a href="{{  url('/user') }}">user</a></li>
					<li><a href="{{  url('/user/tambah_user') }}">Tambah user</a></li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="card-body card-block">
	<br />
	<form action="{{  url('/user/store') }}" method="post" class="">
		{{ csrf_field() }}

		<div class="form-group"><label class="form-control-label">User NID</label><input type="text" name="user_nid" class="form-control" value="{{ Session::get('user_nid') }}">
		</div>

		<div class="form-group"><label class="form-control-label">Nama User</label><input type="text" name="user_nama" class="form-control" value="{{ Session::get('user_nama') }}">
		</div>

		<div class="form-group"><label class="form-control-label">Password</label><input type="text" name="password" class="form-control" value="{{ Session::get('password') }}"></div>

		<div class="form-group"><label class="form-control-label">Konfirmasi Password</label><input type="text" name="cpass" class="form-control" value="{{ Session::get('cpass') }}">
		</div>

		<div class="form-group"><label class="form-control-label">Bidang</label>
			<select name="bidang_id" id="select" class="form-control">
				<option value="">Please select Bidang</option>
				@foreach($bidang as $b)
				<option value="{{ $b->bidang_id }}" @if(old('bidang_id')==$b->bidang_id) selected @endif>
					{{ $b->bidang_name }}
				</option>
				@endforeach
			</select>
		</div>

		<div class="form-group"><label class="form-control-label">Fungsi</label> </br>
			<select name="fungsi_id" id="select" class="form-control selectfungsi">
				<option value="">Please select Fungsi</option>
				@foreach($fungsi as $f)
				<option value="{{ $f->fungsi_id }}" @if(old('fungsi_id')==$f->fungsi_id) selected @endif>
					{{ $f->fungsi_name }}
				</option>
				@endforeach
			</select>
		</div>

		<div class="form-group"><label class="form-control-label">Jabatan</label> </br>
			<select name="jabatan_id" id="select" class="form-control">
				<option value="">Please select Jabatan</option>
				@foreach($jabatan as $j)
				<option value="{{ $j->jabatan_id }}" @if(old('jabatan_id')==$j->jabatan_id) selected @endif>
					{{ $j->jabatan_name }}
				</option>
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
</div>
@endsection