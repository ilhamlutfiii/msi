@extends('main')

@section('title', 'Edit Komputer')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Edit Komputer</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="/komputer">Komputer</a></li>
						<li><a href="/komputer/edit_komputer">Edit Komputer</a></li>
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

	@foreach($komputer as $k)
	<form action="/komputer/update" method="post" class="">
			{{ csrf_field() }}
			<div class="form-group"><label class="form-control-label">ID Komputer :</label><input type="text" name="komp_id" class="form-control" value="{{ $k->komp_id }}"readonly></div>

			<div class="form-group"><label class="form-control-label">ID Perangkat :</label><input type="text" name="id_perangkat" class="form-control" value="{{ $k->id_perangkat }}"></div>

            <div class="form-group"><label class="form-control-label">Hostname :</label><input type="text" name="hostname" class="form-control" value="{{ $k->hostname }}"></div>

            <div class="form-group"><label class="form-control-label">Port :</label><input type="text" name="port" class="form-control" value="{{ $k->port }}"></div>

            <div class="form-group"><label class="form-control-label">Kategori :</label>
                <select name="kategori" id="select" class="form-control" >
                    <option value="{{ $k->kategori }}">{{ $k->kategori }}</option>
				    <option value="Laptop">-- Laptop --</option>
                    <option value="Desktop">-- Destop --</option>
                    <option value="Serve">-- Server --</option>
                    <option value="Internet Of Things">-- Internet of Things --</option>
                    <option value="Virtual Machine">-- Virtual Machine --</option>
			    </select>
            </div>

            <div class="form-group"><label class="form-control-label">User :</label>
				<select name="user_id" id="user_nama" class="form-control selectuser">
                    <option value="{{ $k->user_id }}">{{ $k->user_nama }}</option>
				    @foreach($user as $u)
				    <option value="{{ $u->user_id }} ">-- {{ $u->user_nama }} --</option>
				    @endforeach
			    </select>
            </div>
            <div class="form-group"><label class="form-control-label">IP Address :</label>
                <select name="ip_id" id="select" class="form-control selectip" >
                    <option value="{{ $k->ip_id }}">{{ $k->ip_address }}</option>
				    @foreach($ip as $i)
				    <option value="{{ $i->ip_id }} ">-- {{ $i->ip_address }} --</option>
				    @endforeach
			    </select>
            </div>

            <div class="form-group"><label class="form-control-label">Lokasi :</label><input type="text" name="lokasi" class="form-control" value="{{ $k->lokasi }}"></div>

            <div class="form-group"><label class="form-control-label">Referensi :</label><input type="text" name="referensi" class="form-control" value="{{ $k->referensi }}"></div>

            <div class="form-group"><label class="form-control-label">OS -- Ram/HDD :</label>
                <select name="os_id" id="select" class="form-control">
                    <option value="{{ $k->os_id }}">{{ $k->os_name }}{{ $k->ram_hdd }}</option>
                    @foreach ($os as $o)
				    <option value="{{ $o->os_id }} ">-- {{ $o->os_name }} --  {{ $o->ram_hdd }} --</option>
				    @endforeach
			    </select>
            </div>

            <div class="form-group"><label class="form-control-label">Inventaris :</label><input type="text" name="inventeris" class="form-control" value="{{ $k->inventaris }}"></div>

            <div class="form-group"><label class="form-control-label">Status :</label><input type="text" name="status" class="form-control"value="{{ $k->status }}" ></div>

            <div class="form-group"><label class="form-control-label">Penggunaan :</label><input type="text" name="penggunaan" class="form-control"value="{{ $k->penggunaan }}" ></div>
		
            <div class="form-group"><label class="form-control-label">Mac :</label><input type="text" name="mac" class="form-control"value="{{ $k->mac }}" ></div>

            <div class="form-group"><label class="form-control-label">Macc :</label><input type="text" name="macc" class="form-control"value="{{ $k->macc }}" ></div>

            <div class="form-group"><label class="form-control-label">Tahun :</label><input type="text" name="tahun" class="form-control"value="{{ $k->tahun }}" ></div>

			<div class="form-group"><label class="form-control-label">Keterangan :</label><input type="text" name="keterangan" class="form-control"value="{{ $k->keterangan }}" ></div>

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