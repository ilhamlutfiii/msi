@extends('main')

@section('title', 'Tambah Pinjam Sementara')

@section('breadcrumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Pinjam Sementara</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li><a href="{{  url('/pinjam') }}">Pinjam Sementara</a></li>
					<li><a href="{{  url('/pinjam/tambah_pinjam') }}">Tambah Pinjam Sementara</a></li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="card-body card-block">
	<form action="{{  url('/pinjam/store') }}" method="post" class="">
		{{ csrf_field() }}
		<div class="form-group">
			<label class="form-control-label">Nama User :</label>
			<select name="user_id" id="user" class="form-control selectuser">
				<option value="">Pilih User...</option>
				@foreach($user as $u)
				<option value="{{ $u->user_id }}" @if(old('user_id')==$u->user_id) selected @endif>
					{{ $u->user_nama }}
				</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label class="form-control-label">ID Perangkat :</label>
			<select name="komp_id" id="komputer" class="form-control selectkomp">
				<option value="">Pilih ID Perangkat...</option>
				@foreach($komputer as $k)
				<option value="{{ $k->komp_id }}" @if(old('komp_id')==$k->komp_id) selected @endif>
					{{ $k->id_perangkat }}
				</option>
				@endforeach
			</select>
		</div>

		<div class="form-group"><label class="form-control-label">Tanggal Pinjam :</label><input type="date" name="tgl_pinjam" class="form-inline" value="{{ Session::get('tgl_pinjam') }}"></div>

		<div class="form-group"><label class="form-control-label">Tanggal Kembali :</label><input type="date" name="tgl_kembali" class="form-inline" value="{{ Session::get('tgl_kembali') }}"></div>

		<div class="form-group">
			<label class="form-control-label">No Tiket :</label>
			<div class="form-inline">
				<input type="text" name="no_tiket" class="form-control" value="R-" disabled>
				<input type="text" name="no_tiket" class="form-control" value="{{ Session::get('no_tiket') }}">
			</div>
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