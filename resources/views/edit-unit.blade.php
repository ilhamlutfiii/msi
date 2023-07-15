@extends('main')

@section('title', 'Edit Unit')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Edit Unit</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="{{  url('/unit') }}">Unit</a></li>
						<li><a href="{{  url('/unit/edit_unit') }}">Edit Unit</a></li>
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

		@foreach($unit as $u)
		<form action="{{  url('/unit/update') }}" method="post" class="form-inline">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{ $u->unit_id }}">
			Nama Unit : &nbsp; &nbsp; <input type="text" required="required" name="nama" value="{{ $u->unit_name }}"> <br/> &nbsp; &nbsp; &nbsp;
			<input type="submit" value="Simpan Data" class="btn btn-primary btn-sm">
		</form>
		@endforeach
	</div>

@endsection