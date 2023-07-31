@extends('main')

@section('title', 'Hapus User')

@section('content')
<div class="content mt-3">
		<div class="animated fadeIn">
			<br/>
			<br/>
			<h2>Konfirmasi Hapus Data</h2>
			<p>Apakah Anda yakin ingin menghapus data dengan Nama User: {{ $user_nama }}?</p>
        <a href="{{ route('user.hapus.confirm', ['id' => $id]) }}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
        <a href="/user" class="btn btn-success"><i class="fa fa-reply"> Batal</i></a>
		</div><!-- .content -->
    </div>
    
@endsection
