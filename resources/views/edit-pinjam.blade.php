@extends('main')

@section('title', 'Edit pinjam')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Edit Pinjam</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="/pinjam">Pinjam</a></li>
						<li><a href="/pinjam/edit_pinjam">Edit Pinjam</a></li>
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

	@foreach($pinjam as $p)
	<form action="/pinjam/update" method="post" class="">
		{{ csrf_field() }}
		<div class="form-group"><label class="form-control-label">ID Pinjam :</label><input type="text" name="pinjam_id" class="form-control" value="{{ $p->pinjam_id }}"readonly></div>

		<div class="form-group">
            <label class="form-control-label">Nama User :</label>
        		<select name="user_id" id="user" class="form-control">
					<option value="{{ $p->user_id }}">{{ $p->user_nama }}</option>
            		@foreach($user as $u)
                	<option value="{{ $u->user_id }} ">{{ $u->user_nama }}</option>
            		@endforeach
        		</select>
    	</div>

		<div class="form-group">
        	<label class="form-control-label">Nama Komputer :</label>
        		<select name="id_perangkat" id="komputer" class="form-control">
					<option value="{{ $p->id_perangkat }}">{{ $p->id_perangkat }}</option>
            		@foreach($komputer as $k)
                	<option value="{{ $k->id_perangkat }} ">{{ $k->id_perangkat }}</option>
            		@endforeach
        		</select>
    	</div>
		
		<div class="form-group"><label class="form-control-label">Tanggal Pinjam :</label><input type="date" name="tgl_pinjam" class="form-control" value="{{ $p->tgl_pinjam }}"></div>

		<div class="form-group"><label class="form-control-label">Tanggal Kembali :</label><input type="date" name="tgl_kembali" class="form-control" value="{{ $p->tgl_kembali }}"></div>

		<div class="form-group"><label class="form-control-label">No Tiket :</label><input type="text" name="no_tiket" class="form-control" value="R-{{ $p->no_tiket }}"></div>

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