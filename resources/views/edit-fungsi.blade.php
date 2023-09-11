@extends('main')

@section('title', 'Edit fungsi')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Edit fungsi</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="/fungsi">fungsi</a></li>
						<li><a href="/fungsi/edit_fungsi">Edit fungsi</a></li>
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

	@foreach($fungsi as $f)
	<form action="/fungsi/update" method="post" class="">
		{{ csrf_field() }}
		
		<div class="form-group"><label class="form-control-label">Nama fungsi :</label><input type="text" name="fungsi_name" class="form-control" value="{{ $f->fungsi_name }}"></div>
		
		<div class="form-group"><label class="form-control-label">Unit :</label>
			<select name="unit_id" id="select" class="form-control">
				<option value="{{ $f->unit_id }}">{{ $f->unit_name }}</option>
				@foreach($unit as $u)
				<option value="{{ $u->unit_id }} ">-- {{ $u->unit_name }} --</option>
				@endforeach
			</select>
		</div>
		
		<button type="submit" class="btn btn-primary btn-sm">
			<i class="fa fa-dot-circle-o"></i> Submit
		</button>
		<button type="reset" class="btn btn-danger btn-sm">
			<i class="fa fa-ban"></i> Reset
		</button>
		<input type="hidden" name="fungsi_id" class="form-control" value="{{ $f->fungsi_id }}" readonly>
		
	</form>
	@endforeach
</div>
	
@endsection