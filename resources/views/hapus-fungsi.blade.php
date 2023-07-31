@extends('main')

@section('title', 'Hapus Fungsi')

@section('content')
<div class="content mt-3">
		<div class="animated fadeIn">
			<br/>
			<br/>
			<h2>Konfirmasi Hapus Data</h2>
    		<p>Apakah Anda yakin ingin menghapus fungsi {{ $fungsi_name }}?</p>
        <a href="{{ route('fungsi.hapus.confirm', ['id' => $id]) }}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
        <a href="/fungsi" class="btn btn-success"><i class="fa fa-reply"> Batal</i></a>
		</div><!-- .content -->
    </div>
    
@endsection
