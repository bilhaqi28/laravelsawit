@extends('index')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Penawaran</h1>
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
            <table id="example1" class="table table-sm table-striped table-borderless table-hover text-center" >
              
                <thead style="background-color:#03808a;color:white;" >
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama user</th>
                    <th scope="col">Alamat Beli</th>
                    <th scope="col">Tgl Beli</th>
                    <th scope="col">Alamat Jual</th>
                    <th scope="col">Tgl Jual</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Berat Terjual</th>
                    <th scope="col">Sertifikat</th>
                    <th scope="col">Tgl Penawaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($data as $d)
                    <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>{{$d->nama_user}}</td>
                    <td>{{$d->alamat}}</td>
                    <td>{{$d->tanggal}}</td>
                    <td>{{$d->alamat_jual}}</td>
                    <td>{{$d->tgl_jual}}</td>
                    <td>{{$d->harga_jual}}</td>
                    <td>{{$d->berat_terjual}}</td>
                    <td>@if($d->sertifikat == 0)
                        {{"Tidak Ada"}}
                      @else
                        {{"Ada"}}
                      @endif</td>
                    <td>{{$d->tgl_penawaran}}</td>
                    
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