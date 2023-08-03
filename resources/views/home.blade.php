@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Data User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <br>
            <br>
            <div class="row ">
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
        </div><!-- .content -->
    </div>
@endsection