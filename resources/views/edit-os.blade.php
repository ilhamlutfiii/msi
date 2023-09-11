@extends('main')

@section('title', 'Edit OS')

@section('breadcrumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Edit OS</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li><a href="/os">OS</a></li>
					<li><a href="/os/edit_os">Edit OS</a></li>
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<br />
<br />

<div class="card-body card-block">

	@foreach($os as $o)
	<form action="/os/update" method="post" class="">
		{{ csrf_field() }}

		<div class="form-group"><label class="form-control-label">Nama OS :</label><input type="text" name="os_name" class="form-control" value="{{ $o->os_name }}"></div>

		<div class="form-group"><label class="form-control-label">Ram/HDD :</label><input type="text" name="ram_hdd" class="form-control" value="{{ $o->ram_hdd }}"></div>

		<button type="submit" class="btn btn-primary btn-sm">
			<i class="fa fa-dot-circle-o"></i> Submit
		</button>
		<button type="reset" class="btn btn-danger btn-sm">
			<i class="fa fa-ban"></i> Reset
		</button>
		<input type="hidden" name="os_id" class="form-control" value="{{ $o->os_id }}" readonly>
	</form>
	@endforeach
</div>

@endsection