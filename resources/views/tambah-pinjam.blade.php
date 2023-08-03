@extends('main')

@section('title', 'Tambah Peminjaman')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Peminjaman</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="{{  url('/pinjam') }}">Peminjaman</a></li>
						<li><a href="{{  url('/pinjam/tambah_pinjam') }}">Tambah Peminjaman</a></li>					
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
		<form action="{{  url('/pinjam/store') }}" method="post" class="">
			{{ csrf_field() }}
			<div class="form-group">
            <label class="form-control-label">Nama User :</label>
        		<select name="user_id" id="user" class="form-control">
            		<option value="0">Pilih User...</option>
            		@foreach($user as $u)
                	<option value="{{ $u->user_id }} ">{{ $u->user_nama }}</option>
            		@endforeach
        		</select>
    		</div>
			<div class="form-group">
        	<label class="form-control-label">Nama Komputer :</label>
        		<select name="id_perangkat" id="komputer" class="form-control">
            		<option value="0">Pilih Komputer...</option>
            		@foreach($komputer as $k)
                	<option value="{{ $k->id_perangkat }} ">{{ $k->id_perangkat }}</option>
            		@endforeach
        		</select>
    		</div>

			<div class="form-group"><label class="form-control-label">Tanggal Pinjam :</label><input type="date" name="tgl_pinjam" class="form-control" ></div>

			<div class="form-group"><label class="form-control-label">Tanggal Kembali :</label><input type="date" name="tgl_kembali" class="form-control" ></div>

			<div class="form-group"><label class="form-control-label">No Tiket :</label><input type="text" name="no_tiket" class="form-control" value="R-"></div>

			<button type="submit" class="btn btn-primary btn-sm">
				<i class="fa fa-dot-circle-o"></i> Submit
			</button>
			<button type="reset" class="btn btn-danger btn-sm">
				<i class="fa fa-ban"></i> Reset
			</button>
		</form>
	</div>
@endsection