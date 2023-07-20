@extends('main')

@section('title', 'Tambah Switch')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Switch</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="{{  url('/switch') }}">Switch</a></li>
						<li><a href="{{  url('/switch/tambah_switch') }}">Tambah Switch</a></li>					
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
		<form action="{{  url('/switch/store') }}" method="post" class="">
			{{ csrf_field() }}
			<div class="form-group"><label class="form-control-label">Switch ID :</label><input type="text" name="switch_id" class="form-control"></div>

            <div class="form-group"><label class="form-control-label">Port :</label><input type="number" name="port" class="form-control" ></div>

            <div class="form-group"><label class="form-control-label">Nama :</label><input type="text" name="nama" class="form-control" ></div>

            <div class="form-group"><label class="form-control-label">Tipe :</label><input type="text" name="tipe" class="form-control" ></div>

            <div class="form-group"><label class="form-control-label">SN :</label><input type="text" name="sn" class="form-control"></div>

            <div class="form-group"><label class="form-control-label">Letak :</label><input type="text" name="letak" class="form-control" ></div>
		
            <div class="form-group"><label class="form-control-label">Mac :</label><input type="text" name="mac" class="form-control" ></div>

            <div class="form-group"><label class="form-control-label">Macc :</label><input type="text" name="macc" class="form-control" ></div>

		    <div class="form-group"><label class="form-control-label">IP address :</label>
			    <select name="ip_id" id="select" class="form-control">
                    <option value="0">Please select</option>
				    @foreach($ip as $i)
				    <option value="{{ $i->ip_id }} ">-- {{ $i->ip_address }} --</option>
				    @endforeach
			    </select>
		    </div>

            <div class="form-group"><label class="form-control-label">Referensi :</label><input type="text" name="referensi" class="form-control"></div>

			<button type="submit" class="btn btn-primary btn-sm">
				<i class="fa fa-dot-circle-o"></i> Submit
			</button>
			<button type="reset" class="btn btn-danger btn-sm">
				<i class="fa fa-ban"></i> Reset
			</button>
		</form>
	</div>
@endsection
