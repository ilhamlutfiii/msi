@extends('main')

@section('title', 'Tambah ip')

@section('breadcrumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>IP</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li><a href="{{  url('/ip') }}">IP</a></li>
					<li><a href="{{  url('/ip/tambah_ip') }}">Tambah IP</a></li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="card-body card-block">
	<br />
	<form action="{{  url('/ip/store') }}" method="post" class="">
		{{ csrf_field() }}

		<div class="form-group"><label class="form-control-label">Ip Address</label><input type="text" name="ip_address" class="form-control" value="{{ Session::get('ip_address') }}">
		</div>

		<div class="form-group"><label class="form-control-label">Bagian</label><input type="text" name="bagian" class="form-control" value="{{ Session::get('bagian') }}">
		</div>

		<div class="form-group"><label class="form-control-label">Keterangan</label><input type="text" name="keterangan" class="form-control" value="{{ Session::get('keterangan') }}">
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