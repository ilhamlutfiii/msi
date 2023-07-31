@extends('main')

@section('title', 'Hapus Komputer')

@section('content')
<div class="content mt-3">
	<div class="animated fadeIn">
		<br/>
		<br/>
		<h2>Konfirmasi Hapus Data</h2>
		<p>Apakah Anda yakin ingin menghapus data dengan ID: {{ $id }} dan Hostname: {{ $hostname }}?</p>
		<a href="{{ route('komputer.hapus.confirm', ['id' => $id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
		<a href="/komputer" class="btn btn-success"><i class="fa fa-reply"></i> Batal</a>
	</div><!-- .content -->
</div>
@endsection
