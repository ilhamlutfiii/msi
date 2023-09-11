@extends('main')

@section('title', 'Tambah Unit')

@section('breadcrumbs')
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Tambah Unit</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li><a href="{{  url('/unit') }}">Unit</a></li>
					<li><a href="{{  url('/unit/tambah_unit') }}">Tambah Unit</a></li>
					<!--						<li class="active">Data table</li> -->
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="card-body card-block">

	<form action="{{  url('/unit/store_unit') }}" method="post" class="form-inline">
		{{ csrf_field() }}
		Nama Unit : &nbsp; &nbsp; <input type="text" name="unit_name"> <br /> &nbsp; &nbsp; &nbsp;
		<input type="submit" value="Simpan Data" class="btn btn-primary btn-sm">
	</form>
</div>
@endsection