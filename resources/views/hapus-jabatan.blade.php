@extends('main')

@section('title', 'Hapus Jabatan')

@section('content')
<div class="content mt-3">
		<div class="animated fadeIn">
			<br/>
			<br/>
			<h2>Konfirmasi Hapus Data</h2>
			<p>Apakah Anda yakin ingin menghapus jabatan {{ $jabatan_name }}?</p>
        <a href="{{ route('jabatan.hapus.confirm', ['id' => $id]) }}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
        <a href="/jabatan" class="btn btn-success"><i class="fa fa-reply"> Batal</i></a>
		</div><!-- .content -->
    </div>
    
@endsection
