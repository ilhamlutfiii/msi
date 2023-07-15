@extends('main')

@section('title', 'Tambah Fungsi')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Fungsi</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="{{  url('/fungsi') }}">Fungsi</a></li>
						<li><a href="{{  url('/fungsi/tambah_fungsi') }}">Tambah fungsi</a></li>					
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
		<form action="{{  url('/fungsi/store') }}" method="post" class="">
			{{ csrf_field() }}
			
			<div class="form-group"><label class="form-control-label">Nama Fungsi</label><input type="text" name="fungsi_nama" class="form-control"></div>
			
			<div class="form-group"><label class="form-control-label">Unit</label> <br/>
				<select name="unit_id" id="select" class="form-control-sm">
					<option value="0">Please select</option>
					@foreach($unit as $u)
						<option value="{{ $u->unit_id }}"> {{ $u->unit_name }} </option>
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
