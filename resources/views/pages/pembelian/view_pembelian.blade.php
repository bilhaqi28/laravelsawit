@extends('index')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Pembelian</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-6">
            <!-- small box -->
            <div style="border:1px solid gray;background-color:white;padding:10px;border-radius:10px;width:auto;">
            @if ($message = Session::get('sukses'))
            <div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>{{$message}}</div>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>{{$message}}</div>
            @endif
              <h4>Cek Bukti Pembayaran</h4>
              <table id="example-cek" class="table table-sm table-striped table-borderless table-hover text-center" >     
                  <thead style="background-color:#03808a;color:white;" >
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama user</th>
                      <th scope="col">Berat Terjual</th>
                      <th scope="col">Tgl Pembelian</th>
                      <th scope="col">Jumlah Pembelian</th>
                      <th scope="col">Status Pembelian</th>
                      <th scope="col">Bukti Pembayara</th>
                      <th scope="col">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; ?>
                      @foreach($cek_bukti as $d)
                      <tr>
                      <th scope="row">{{$no++}}</th>
                      <td>{{$d->nama_user}}</td>
                      <td>{{$d->berat_terjual}}</td>
                      <td>{{$d->tgl_pembelian}}</td>
                      <td>{{$d->jumlah_pembelian}}</td>
                      <td>{{$d->kategori_status}}</td>
                      <td>
                        <div class="gallery-item">
                          <a href="{{url('img/'.$d->bukti_bayar.'')}}" data-gall="gallery-item" target="_blank">
                            <img src="{{url('img/'.$d->bukti_bayar.'')}}" alt="" class="img-fluid" width="50" height="50" style="border: 1px solid gray;border-radius:10px;">
                          </a>
                        </div>
                      </td>
                      <td><div class="btn btn-group"><a href="/pembelian/accept/{{$d->id_pembelian}}" class="btn btn-info btn-sm" >Terima </a>  <a href="/pembelian/discard/{{$d->id_pembelian}}" class="btn btn-danger btn-sm">Tolak</a></div></td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
            <br>
            <div style="border:1px solid gray;background-color:white;padding:10px;border-radius:10px;width:auto;">
              <h4>Belum Bayar</h4>
              <table id="example-belum" class="table table-sm table-striped table-borderless table-hover text-center" >  
                  <thead style="background-color:#03808a;color:white;" >
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama user</th>
                      <th scope="col">Alamat Jual</th>
                      <th scope="col">Berat Terjual</th>
                      <th scope="col">Tgl Pembelian</th>
                      <th scope="col">Jumlah Pembelian</th>
                      <th scope="col">Status Pembelian</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; ?>
                      @foreach($belum_bayar as $d)
                      <tr>
                      <th scope="row">{{$no++}}</th>
                      <td>{{$d->nama_user}}</td>
                      <td>{{$d->alamat_jual}}</td>
                      <td>{{$d->berat_terjual}}</td>
                      <td>{{$d->tgl_pembelian}}</td>
                      <td>{{$d->jumlah_pembelian}}</td>
                      <td>{{$d->kategori_status}}</td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
            <br>
            <div style="border:1px solid gray;background-color:white;padding:10px;border-radius:10px;width:auto;">
              <h4>Sedang Diproses</h4>
              <table id="example-proses" class="table table-sm table-striped table-borderless table-hover text-center" >
                  <thead style="background-color:#03808a;color:white;" >
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama user</th>
                      <th scope="col">Alamat Jual</th>
                      <th scope="col">Berat Terjual</th>
                      <th scope="col">Tgl Pembelian</th>
                      <th scope="col">Jumlah Pembelian</th>
                      <th scope="col">Status Pembelian</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; ?>
                      @foreach($sedang_proses as $d)
                      <tr>
                      <th scope="row">{{$no++}}</th>
                      <td>{{$d->nama_user}}</td>
                      <td>{{$d->alamat_jual}}</td>
                      <td>{{$d->berat_terjual}}</td>
                      <td>{{$d->tgl_pembelian}}</td>
                      <td>{{$d->jumlah_pembelian}}</td>
                      <td>{{$d->kategori_status}}</td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
            <br>
            <div style="border:1px solid gray;background-color:white;padding:10px;border-radius:10px;width:auto;">
              <h4>Proses Selesai</h4>
              <table id="example-selesai" class="table table-sm table-striped table-borderless table-hover text-center" >
                  <thead style="background-color:#03808a;color:white;" >
                      <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama user</th>
                      <th scope="col">Alamat Jual</th>
                      <th scope="col">Berat Terjual</th>
                      <th scope="col">Tgl Pembelian</th>
                      <th scope="col">Jumlah Pembelian</th>
                      <th scope="col">Status Pembelian</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; ?>
                      @foreach($proses_selesai as $d)
                      <tr>
                      <th scope="row">{{$no++}}</th>
                      <td>{{$d->nama_user}}</td>
                      <td>{{$d->alamat_jual}}</td>
                      <td>{{$d->berat_terjual}}</td>
                      <td>{{$d->tgl_pembelian}}</td>
                      <td>{{$d->jumlah_pembelian}}</td>
                      <td>{{$d->kategori_status}}</td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
@endsection