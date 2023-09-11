@extends('main')

@section('title', 'Edit Pinjam Inventaris')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Edit Pinjam Inventaris</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="/inventaris">Pinjam Inventaris</a></li>
						<li><a href="/inventaris/edit_inventaris">Edit Pinjam Inventaris</a></li>
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

	@foreach($inventaris as $i)
	<form action="/inventaris/update" method="post" class="">
		{{ csrf_field() }}
		
		<div class="form-group">
            <label class="form-control-label">Nama User :</label>
        		<select name="user_id" id="user" class="form-control selectuser">
					<option value="{{ $i->user_id }}">{{ $i->user_nama }}</option>
            		@foreach($users as $u)
                	<option value="{{ $u->user_id }} ">{{ $u->user_nama }}</option>
            		@endforeach
        		</select>
    	</div>

		<div class="form-group">
        	<label class="form-control-label">ID Perangkat :</label>
        		<select name="komp_id" id="komputer" class="form-control selectkomp">
					<option value="{{ $i->komp_id }}">{{ $i->id_perangkat }}</option>
            		@foreach($komputers as $k)
                	<option value="{{ $k->komp_id }} ">{{ $k->id_perangkat }}</option>
            		@endforeach
        		</select>
    	</div>
		
		<div class="form-group"><label class="form-control-label">Tanggal Pinjam :</label><input type="date" name="tgl_pinjam" class="form-inline" value="{{ $i->tgl_pinjam }}"></div>

		<button type="submit" class="btn btn-primary btn-sm">
			<i class="fa fa-dot-circle-o"></i> Submit
		</button>
		<button type="reset" class="btn btn-danger btn-sm">
			<i class="fa fa-ban"></i> Reset
		</button>
		<input type="hidden" name="inventaris_id" class="form-control" value="{{ $i->inventaris_id }}"readonly></div>
	</form>
	@endforeach
</div>
	
@endsection