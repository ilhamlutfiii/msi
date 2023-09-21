@extends('main')

@section('title', 'Dashboard')


@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-3">
                <div class="card card-green">
                    <a href="pinjam" class="card-body text-center">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <i class="fa fa-laptop fa-5x mr-2"></i>
                            <div>
                                <div class="h1">{{ $countPinjaman }}</div>
                                <div class="h5">Total Laptop Dipinjam Sementara</div>
                            </div>
                        </div>
                    </a>
                    <a href="pinjam" class="card-footer">
                        <span class="float-left">View Details</span>
                        <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-green">
                    <a href="inventaris" class="card-body text-center">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <i class="fa fa-laptop fa-5x mr-2"></i>
                            <div>
                                <div class="h1">{{ $countInventaris }}</div>
                                <div class="h5">Total Laptop Dipinjam Inventaris</div>
                            </div>
                        </div>
                    </a>
                    <a href="inventaris" class="card-footer">
                        <span class="float-left">View Details</span>
                        <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<br>
<div>Data User yang harus mengembalikan laptop pinjaman sementara sekarang:</div>
<p></p>
<div class="table-container">
    <table border="1" class="table table-bordered table-responsive fixed-header-table">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>ID Perangkat</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>No Tiket</th>
            </tr>
        </thead>
        @foreach($home as $h)
        @php
        $tglKembali = strtotime($h->tgl_kembali);
        $tglSekarang = strtotime(date('Y-m-d'));
        @endphp
        @if ($tglKembali === $tglSekarang)
        <tr>
            <td>{{ $h->user_nama }}</td>
            <td>{{ $h->id_perangkat }}</td>
            <td>{{ $h->tgl_pinjam }}</td>
            <td>{{ $h->tgl_kembali }}</td>
            <td><a href="https://helpdesk.plnnusantarapower.co.id/pages/UI.php?operation=details&class=UserRequest&id={{ $h->no_tiket - 43 }}&c[menu]=UserRequest%3ARequestsDispatchedToMyTeams" class="link-no-tiket">R-{{ $h->no_tiket }}</td>
        </tr>
        @endif
        @endforeach
    </table>
</div>
</div><!-- .content -->
</div>
@endsection

<style>
    .link-no-tiket {
        color: #007bff;
    }

    .link-no-tiket:hover {
        color: #0056b3;
        text-decoration: underline;
    }

    .card {
        background: rgba(255, 255, 255, 0.5);
        /* Adjust the opacity as needed */
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.05);
    }
</style>