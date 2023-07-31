@extends('main')

@section('title', 'Hapus bidang')

@section('content')
<div class="content mt-3">
		<div class="animated fadeIn">
			<br/>
			<br/>
			<h2>Konfirmasi Hapus Data</h2>
			<p>Apakah Anda yakin ingin menghapus bidang {{ $bidang_name }}?</p>
        <a href="{{ route('bidang.hapus.confirm', ['id' => $id]) }}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
        <a href="/bidang" class="btn btn-success"><i class="fa fa-reply"> Batal</i></a>
		</div><!-- .content -->
    </div>
    
@endsection
