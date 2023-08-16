
@extends('main')

@section('title', 'Tambah Komputer')

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="col-sm-4">
			<div class="page-header float-left">
				<div class="page-title">
					<h1>Komputer</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="{{  url('/komputer') }}">Komputer</a></li>
						<li><a href="{{  url('/komputer/tambah_komputer') }}">Tambah Komputer</a></li>					
					</ol>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<br/>
	<br/>
	@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
	<div class="card-body card-block">
		<br/>
		<form action="{{  url('/komputer/store') }}" method="post" class="">
			{{ csrf_field() }}
			<div class="form-group"><label class="form-control-label" >ID Perangkat :</label><input type="text" name="id_perangkat" class="form-control" autofocus required></div>

            <div class="form-group"><label class="form-control-label">Hostname :</label><input type="text" name="hostname" class="form-control" ></div>

            <div class="form-group"><label class="form-control-label">Port :</label><input type="text" name="port" class="form-control" ></div>

            <div class="form-group"><label class="form-control-label">Kategori :</label>
                <select name="kategori" id="select" class="form-control">
                    <option value="0">Pilih Kategori</option>
				    <option value="Laptop">-- Laptop --</option>
                    <option value="Desktop">-- Destop --</option>
                    <option value="Serve">-- Server --</option>
                    <option value="Internet Of Things">-- Internet of Things --</option>
                    <option value="Virtual Machine">-- Virtual Machine --</option>
			    </select>
            </div>

            <div class="form-group">
                <label class="form-control-label">User :</label>
                <select name="user_id" id="user_nama" class="form-control selectuser">
                    <option value="0">Pilih User</option>
                    @foreach($user as $u)
                        <option value="{{ $u->user_id }}">{{ $u->user_nama }}</option>
                    @endforeach
                    
                </select>
				
				
            </div>

			<div class="form-group">
                <label class="form-control-label">Alamat IP :</label>
                <select name="ip_id" id="ip_address" class="form-control selectip">
                    <option value="0">Pilih Alamat IP</option>
                    @foreach($ip as $i)
                        <option value="{{ $i->ip_id }}">{{ $i->ip_address }}</option>
                    @endforeach
                    
                </select>
				
				
            </div>

			<p>

            <div class="form-group"><label class="form-control-label">Lokasi :</label><input type="text" name="lokasi" class="form-control" ></div>

            <div class="form-group"><label class="form-control-label">Referensi :</label><input type="text" name="referensi" class="form-control" ></div>

            <div class="form-group"><label class="form-control-label">OS -- Ram/HDD :</label>
                <select name="os_id" id="select" class="form-control">
                    <option value="0">Pilih OS</option>
				    @foreach($os as $o)
				    <option value="{{ $o->os_id }} ">-- {{ $o->os_name }} --  {{ $o->ram_hdd }} --</option>
				    @endforeach
			    </select>
            </div>

            <div class="form-group"><label class="form-control-label">Inventaris :</label><input type="text" name="inventeris" class="form-control" ></div>

            <div class="form-group"><label class="form-control-label">Status :</label><input type="text" name="status" class="form-control" ></div>

            <div class="form-group"><label class="form-control-label">Penggunaan :</label><input type="text" name="penggunaan" class="form-control" ></div>
		
            <div class="form-group"><label class="form-control-label">Mac :</label><input type="text" name="mac" class="form-control" ></div>

            <div class="form-group"><label class="form-control-label">Macc :</label><input type="text" name="macc" class="form-control" ></div>

            <div class="form-group"><label class="form-control-label">Tahun :</label><input type="number" name="tahun" class="form-control"></div>

			<div class="form-group"><label class="form-control-label">Keterangan :</label><textarea type="text" name="keterangan" class="form-control" ></textarea></div>

			<button type="submit" class="btn btn-primary btn-sm">
				<i class="fa fa-dot-circle-o"></i> Submit
			</button>
			<button type="reset" class="btn btn-danger btn-sm">
				<i class="fa fa-ban"></i> Reset
			</button>
		</form>
	</div>
@endsection

