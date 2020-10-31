@extends('index')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data User</h1>
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
                    <th scope="col">Nama User</th>
                    <th scope="col">Username User</th>
                    <th scope="col">No Hp User</th>
                    <th scope="col">Alamat User</th>
                    <th scope="col">Jenis User</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($data as $d)
                    <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>{{$d->nama_user}}</td>
                    <td>{{$d->username_user}}</td>
                    <td>{{$d->nohp_user}}</td>
                    <td>{{$d->alamat_user}}</td>
                    <td>{{$d->jenis_user}}</td>
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