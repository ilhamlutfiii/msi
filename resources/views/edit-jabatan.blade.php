@extends('main')

@section('title', 'Edit Jabatan')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Edit jabatan</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="{{  url('/jabatan') }}">jabatan</a></li>
						<li><a href="{{  url('/jabatan/edit_jabatan/') }}">Edit jabatan</a></li>
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
		@foreach($jabatan as $j)
		<form action="{{  url('/jabatan/update') }}" method="post" class="form-inline">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{ $j->jabatan_id }}">
			Nama Jabatan : &nbsp; &nbsp; <input type="text" required="required" name="nama" value="{{ $j->jabatan_name }}"> <br/> &nbsp; &nbsp; &nbsp;
			<input type="submit" value="Simpan Data" class="btn btn-primary btn-sm">
		</form>
		@endforeach
	</div>
@endsection