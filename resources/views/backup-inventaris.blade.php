@extends('main')

@section('title', 'Kembalikan Pinjam Inventaris')

@section('content')
<div class="content mt-3">
	<div class="animated fadeIn">
		<form method="POST" action="{{ route('store-log', ['id' => $inventarisData->inventaris_id]) }}">
			@csrf <!-- Add this line for CSRF protection -->
			<h2>Konfirmasi Pengembalian Inventaris</h2>
			<p>Apakah Anda yakin ingin mengembalikan peminjaman ini?</p>

			<div class="form-group">
            <label class="form-control-label">Nama User :</label>
        		<select name="user_id" id="user" class="form-control" readonly>
					<option value="{{ $inventarisData->user_id }}">{{ $inventarisData->user_nama }}</option>
        		</select>
    		</div>

			<div class="form-group">
            <label class="form-control-label">ID Perangkat :</label>
        		<select name="komp_id" id="komp" class="form-control" readonly>
					<option value="{{ $inventarisData->komp_id }}">{{ $inventarisData->id_perangkat }}</option>
        		</select>
    		</div>

			<div class="form-group">
				<label class="form-control-label">Tanggal Pinjam :</label>
				<input type="date" name="tgl_pinjam" class="form-control" value="{{ $inventarisData->tgl_pinjam }}" readonly>
			</div>

			<div class="form-group">
				<label class="form-control-label">Tanggal Kembali :</label>
				<input type="date" name="tgl_kembali" class="form-control" required>
			</div>

			<div class="form-group">
				<label class="form-control-label">Keterangan :</label>
				<input type="text" name="keterangan" class="form-control" required>
			</div>
			<button type="submit" class="btn btn-danger"><i class="fa fa-recycle"></i> Kembalikan</button>
			<a href="/inventaris" class="btn btn-success"><i class="fa fa-reply"></i> Batal</a>
		</form>
	</div><!-- .content -->
</div>
@endsection
