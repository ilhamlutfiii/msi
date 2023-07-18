@extends('main')

@section('title', 'Edit Switch')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Edit Switch</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="/switch">Switch</a></li>
						<li><a href="/switch/edit_switch">Edit Switch</a></li>
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

	@foreach($switch as $s)
	<form action="/switch/update" method="post" class="">
		{{ csrf_field() }}
		<div class="form-group"><label class="form-control-label">Switch ID :</label><input type="text" name="switch_id" class="form-control"></div>
		
		<div class="form-group"><label class="form-control-label">Port :</label><input type="number" name="port" class="form-control" value="{{ $s->port }}"></div>

        <div class="form-group"><label class="form-control-label">Nama :</label><input type="number" name="nama" class="form-control" value="{{ $s->nama }}"></div>

        <div class="form-group"><label class="form-control-label">Tipe :</label><input type="number" name="tipe" class="form-control" value="{{ $s->tipe }}"></div>

        <div class="form-group"><label class="form-control-label">SN :</label><input type="number" name="sn" class="form-control" value="{{ $s->sn }}"></div>

        <div class="form-group"><label class="form-control-label">Letak :</label><input type="number" name="letak" class="form-control" value="{{ $s->letak }}"></div>
		
        <div class="form-group"><label class="form-control-label">Mac :</label><input type="number" name="mac" class="form-control" value="{{ $s->mac }}"></div>

        <div class="form-group"><label class="form-control-label">Macc :</label><input type="number" name="macc" class="form-control" value="{{ $s->macc }}"></div>

		<div class="form-group"><label class="form-control-label">IP address :</label>
			<select name="ip_id" id="select" class="form-control">
				<option value="{{ $s->ip_id }}">{{ $s->ip_address }}</option>
				@foreach($ip as $i)
				<option value="{{ $i->ip_id }} ">-- {{ $i->ip_address }} --</option>
				@endforeach
			</select>
		</div>

        <div class="form-group"><label class="form-control-label">Referensi :</label><input type="number" name="referensi" class="form-control" value="{{ $s->referensi }}"></div>
		
		<button type="submit" class="btn btn-primary btn-sm">
			<i class="fa fa-dot-circle-o"></i> Submit
		</button>
		<button type="reset" class="btn btn-danger btn-sm">
			<i class="fa fa-ban"></i> Reset
		</button>
	</form>
	@endforeach
</div>
	
@endsection