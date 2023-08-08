@extends('main')

@section('title', 'Hapus')

@section('content')
<div class="content mt-3">
	<div class="animated fadeIn">
		<br/>
		<br/>
		<form method="POST" action="{{ route('store-log', ['id' => $inventarisData->inventaris_id]) }}">
			@csrf <!-- Add this line for CSRF protection -->
			<h2>Konfirmasi Pengembalian Inventaris</h2>
			<p>Apakah Anda yakin ingin mengembalikan peminjaman dengan nama user {{ $inventarisData->user_nama }}?</p>

			<div class="form-group">
				<label class="form-control-label">No User :</label>
				<input type="text" name="user_id" class="form-control" value="{{ $inventarisData->user_id }}" readonly>
			</div>

			<div class="form-group">
				<label class="form-control-label">Nama Komputer :</label>
				<input type="text" name="id_perangkat" class="form-control" value="{{ $inventarisData->id_perangkat }}" readonly>
			</div>

			<div class="form-group">
				<label class="form-control-label">Tanggal Pinjam :</label>
				<input type="date" name="tgl_pinjam" class="form-control" value="{{ $inventarisData->tgl_pinjam }}" readonly>
			</div>

			<div class="form-group">
				<label class="form-control-label">No Tiket :</label>
				<input type="text" name="no_tiket" class="form-control" value="R-{{ $inventarisData->no_tiket }}" readonly>
			</div>

			<div class="form-group">
				<label class="form-control-label">Tanggal Kembali :</label>
				<input type="date" name="tgl_kembali" class="form-control">
			</div>

			<div class="form-group">
				<label class="form-control-label">Keterangan :</label>
				<input type="text" name="keterangan" class="form-control">
			</div>
			<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Kembalikan</button>
			<a href="/inventaris" class="btn btn-success"><i class="fa fa-reply"></i> Batal</a>
		</form>
	</div><!-- .content -->
</div>
@endsection
