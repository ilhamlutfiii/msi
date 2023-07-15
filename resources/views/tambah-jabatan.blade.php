@extends('main')

@section('title', 'Tambah Jabatan')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Tambah Jabatan</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="{{  url('/jabatan') }}">Jabatan</a></li>
						<li><a href="{{  url('/jabatan/tambah') }}">Tambah Jabatan</a></li>
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
		<br/>
		<br/>

		<form action="{{  url('/jabatan/store') }}" method="post" class="form-inline">
			{{ csrf_field() }}
			Nama Jabatan : &nbsp; &nbsp; <input type="text" name="jabatan_nama"> <br/> &nbsp; &nbsp; &nbsp;
			<input type="submit" value="Simpan Data" class="btn btn-primary btn-sm">
		</form>
	</div>
@endsection
