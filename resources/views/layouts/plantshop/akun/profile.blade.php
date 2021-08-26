@extends('layouts.plantshop.template_view')
@section('konten')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Profile</h3>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<section class="main_content_area">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#account-details" data-toggle="tab" class="nav-link active">Detail Akun</a>
                            <li><a href="#orders" data-toggle="tab" class="nav-link">Transaksi Saya</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade" id="dashboard">
                            <h3>Dashboard </h3>
                            <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent
                                    orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a
                                    href="#">Edit your password and account details.</a></p>
                        </div>
                        <div class="tab-pane fade" id="orders">
                            <h3>Orders</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach($dataBeli as $d)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $d->no_invoice }}</td>
                                            <td>{{ date('d F Y', strtotime($d->tgl_penjualan)) }}</td>
                                            <td><?= ($d->id_status_penjualan == '5' ? 'Selesai' : 'Proses') ?></td>
                                            <td>Rp. {{ number_format($d->total_uang,2) }} for {{ $d->total_pembelian }} item </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="address">
                            <p>The following addresses will be used on the checkout page by default.</p>
                            <h4 class="billing-address">Billing address</h4>
                            <a href="#" class="view">Edit</a>
                            <p><strong>Bobby Jackson</strong></p>
                            <address>
                                House #15<br>
                                Road #1<br>
                                Block #C <br>
                                Banasree <br>
                                Dhaka <br>
                                1212
                            </address>
                            <p>Bangladesh</p>
                        </div>
                        <div class="tab-pane fade active show" id="account-details">
                            <h3>Account details </h3>
                            <div class="login">
                                <form action="{{ url('update/profile') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nama Lengkap</label>
                                                        <input name="name" type="text" value="{{ Auth::user()->name }}"
                                                            class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="Enter email">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email address</label>
                                                        <input name="email" value="{{ Auth::user()->email }}"
                                                            type="email" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="Enter email">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                                                        <input name="tanggal_lahir"
                                                            value="{{ Auth::user()->tanggal_lahir }}" type="date"
                                                            class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="Enter email">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nomor HP</label>
                                                        <input name="no_hp" value="{{ Auth::user()->no_wa }}"
                                                            type="text" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="Nomor HP">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Alamat</label>
                                                       <textarea name="alamat" class="form-control" rows="3">{{ Auth::user()->alamat }}</textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Password Baru</label>
                                                        <input name="pass" type="password" class="form-control"
                                                            id="exampleInputPassword1" placeholder="Password">
                                                    </div>

                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="row">
                                                        <label for="exampleInputPassword1">Foto Profile</label>
                                                        <div class="col-sm-12">
                                                            <br>
                                                            @if(Auth::user()->foto_profile == null)
                                                            <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"
                                                            class="rounded float-left" alt="...">
                                                            @else
                                                            <img style="width:360px; height:360;"
                                                            src="{{ asset('upload/foto_profile/'.Auth::user()->foto_profile) }}"
                                                            class="rounded float-left" alt="...">
                                                            @endif
                                                            <br>
                                                            <br>
                                                        </div>
                                                        <div class="col-sm-12" >
                                                            <br>
                                                            <input name="foto_profile" type="file" />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <br>
                                            <button class="btn btn-sm btn-success">Perbarui</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
