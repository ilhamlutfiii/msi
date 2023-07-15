@extends('main')

@section('title', 'Tambah bidang')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Tambah bidang</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="{{  url('/bidang') }}">bidang</a></li>
						<li><a href="{{  url('/bidang/tambah') }}">Tambah bidang</a></li>
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

		<form action="{{  url('/bidang/store') }}" method="post" class="form-inline">
			{{ csrf_field() }}
			Nama bidang : &nbsp; &nbsp; <input type="text" name="bidang_nama"> <br/> &nbsp; &nbsp; &nbsp;
			<input type="submit" value="Simpan Data" class="btn btn-primary btn-sm">
		</form>
	</div>
@endsection
