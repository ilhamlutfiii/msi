@extends('main')

@section('title', 'Hapus Insfrastruktur')

@section('content')
<div class="content mt-3">
	<div class="animated fadeIn">
		<br/>
		<br/>
		<h2>Konfirmasi Hapus Data</h2>
		<p>Apakah Anda yakin ingin menghapus data switch dengan nama: {{ $nama }}?</p>
		<a href="{{ route('switch.hapus.confirm', ['id' => $id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
		<a href="/switch" class="btn btn-success"><i class="fa fa-reply"></i> Batal</a>
	</div><!-- .content -->
</div>
@endsection
