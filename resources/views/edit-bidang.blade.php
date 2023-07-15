@extends('main')

@section('title', 'Edit Bidang')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Edit bidang</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
<!--						<li><a href="{{  url('/bidang') }}">Bidang</a></li> -->
						<li><a href="/bidang">Bidang</a></li>
						<li><a href="/bidang/edit_bidang">Edit bidang</a></li>
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
		@foreach($bidang as $b)
		<form action="/bidang/update" method="post" class="form-inline">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{ $b->bidang_id }}">
			Nama bidang : &nbsp; &nbsp; <input type="text" required="required" name="bidang_nama" value="{{ $b->bidang_name }}"> <br/> &nbsp; &nbsp; &nbsp;
			<input type="submit" value="Simpan Data" class="btn btn-primary btn-sm">
		</form>
		@endforeach
	</div>
@endsection