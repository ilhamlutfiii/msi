@extends('main')

@section('title', 'Hapus OS')

@section('content')
<div class="content mt-3">
		<div class="animated fadeIn">
			<br/>
			<br/>
			<h2>Konfirmasi Hapus Data</h2>
			<p>Apakah Anda yakin ingin menghapus data dengan Operating Sistem {{ $os_name }}, Ram/HDD: {{ $ram_hdd }}?</p>
        <a href="{{ route('os.hapus.confirm', ['id' => $id]) }}" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
        <a href="/os" class="btn btn-success"><i class="fa fa-reply"> Batal</i></a>
		</div><!-- .content -->
    </div>
    
@endsection
