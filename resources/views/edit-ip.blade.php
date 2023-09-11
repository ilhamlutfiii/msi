@extends('main')

@section('title', 'Edit IP')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Edit IP</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="/ip">IP</a></li>
						<li><a href="/ip/edit_ip">Edit IP</a></li>
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

	@foreach($ip as $i)
	<form action="/ip/update" method="post" class="">
		{{ csrf_field() }}
			
			<div class="form-group"><label class="form-control-label">IP Address :</label><input type="text" name="ip_address" class="form-control" value="{{ $i->ip_address }}"></div>
			
			<div class="form-group"><label class="form-control-label">Bagian :</label><input type="text" name="bagian" class="form-control" value="{{ $i->bagian }}"></div>
			
			<div class="form-group"><label class="form-control-label">Keterangan :</label><input type="text" name="keterangan" class="form-control" value="{{ $i->keterangan }}"></div>		

			<button type="submit" class="btn btn-primary btn-sm">
				<i class="fa fa-dot-circle-o"></i> Submit
			</button>
			<button type="reset" class="btn btn-danger btn-sm">
				<i class="fa fa-ban"></i> Reset
			</button>
			<input type="hidden" name="ip_id" class="form-control" value="{{ $i->ip_id }}" readonly>
			
	</form>
	@endforeach
</div>
	
@endsection