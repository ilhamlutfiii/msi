@extends('main')

@section('title', 'Tambah OS')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>OS</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="{{  url('/os') }}">OS</a></li>
						<li><a href="{{  url('/os/tambah_os') }}">Tambah OS</a></li>					
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
		<form action="{{  url('/os/store') }}" method="post" class="">
			{{ csrf_field() }}
			
			<div class="form-group"><label class="form-control-label">Nama OS</label><input type="text" name="os_name" class="form-control"></div>
			
			<div class="form-group"><label class="form-control-label">Ram/HDD</label><input type="text" name="ram_hdd" class="form-control"></div>
			
			<button type="submit" class="btn btn-primary btn-sm">
				<i class="fa fa-dot-circle-o"></i> Submit
			</button>
			<button type="reset" class="btn btn-danger btn-sm">
				<i class="fa fa-ban"></i> Reset
			</button>
		</form>
	</div>
@endsection
