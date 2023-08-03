@extends('main')

@section('title', 'Hapus ')

@section('content')
<div class="content mt-3">
	<div class="animated fadeIn">
		<br/>
		<br/>
		<h2>Konfirmasi Hapus Data</h2>
		<p>Apakah Anda yakin ingin menghapus peminjaman dengan Nama: {{ $user_nama }} dan Komputer: {{ $id_perangkat }}?</p>
		<a href="{{ route('pinjam.hapus.confirm', ['id' => $id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
		<a href="/pinjam" class="btn btn-success"><i class="fa fa-reply"></i> Batal</a>
	</div><!-- .content -->
</div>
@endsection
