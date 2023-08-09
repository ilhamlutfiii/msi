@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <!-- ... Your breadcrumbs code here ... -->
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <br>
            <br>
            <div class="row">
                <div class="col-lg-3">
                    <div class="card card-green">
                        <a href="pinjam" class="card-body text-center">
                            <div>
                                <i class="fa fa-address-book fa-5x"></i>
                            </div>
                            <p>
                                <div class="h1">{{ $countPinjaman }}</div>
                                <div class="h5">Total Laptop Dipinjam</div>
                            </p>
                        </a>
                        <a href="pinjam" class="card-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                </div>
            </div>

            <br>
            <div>Data User yang harus mengembalikan laptop sekarang:</div>
            <p></p>
            <table border="1" class="table table-striped table-bordered">
                <tr>
                    <th>ID Pinjam</th>
                    <th>Nama User</th>
                    <th>ID Perangkat</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>No Tiket</th>
                </tr>
                @foreach($home as $h)
                    @php
                        $tglKembali = strtotime($h->tgl_kembali);
                        $tglSekarang = strtotime(date('Y-m-d'));
                    @endphp
                    @if ($tglKembali === $tglSekarang)
                        <tr>
                            <td>{{ $h->pinjam_id }}</td>
                            <td>{{ $h->user_nama }}</td>
                            <td>{{ $h->id_perangkat }}</td>
                            <td>{{ $h->tgl_pinjam }}</td>
                            <td>{{ $h->tgl_kembali }}</td>
                            <td><a href="https://helpdesk.plnnusantarapower.co.id/pages/UI.php?operation=details&class=UserRequest&id={{ $h->no_tiket - 43 }}&c[menu]=UserRequest%3ARequestsDispatchedToMyTeams"class="link-no-tiket">R-{{ $h->no_tiket }}</td>
                        </tr>
                    @endif
                @endforeach
            </table>
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
</style>
