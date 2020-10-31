@extends('index')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Rekening</h1>
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
          <div>
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
              Tambah Data
            </button>
          </div>
          <br>
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
            <table id="example1" class="table table-sm table-striped table-borderless table-hover text-center" >
              
                <thead style="background-color:#03808a;color:white;" >
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">No Rekening</th>
                    <th scope="col">Bank Rekening</th>
                    <th scope="col">Nama Rekening</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($data as $d)
                    <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>{{$d->no_rek}}</td>
                    <td>{{$d->bank_rek}}</td>
                    <td>{{$d->atasnama_rek}}</td>
                    <td><a href="/rekening/edit_rekening/{{$d->id_rek}}" class="btn btn-warning btn-sm">Edit</a> | <a href="/rekening/delete_rekening/{{$d->id_rek}}" class="btn btn-danger btn-sm">Delete</a></td>
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

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Rekening</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/rekening/add_rekening" method="POST">
        {{csrf_field()}}
          <div class="form-group">
            <label for="norek">No Rekening</label>
            <input type="number" name="no_rek" id="norek" class="form form-control" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="bank_rek">Bank Rekening</label>
            <input type="text" name="bank_rek" id="bank_rek" class="form form-control" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="atasnama_rek">Atas Nama Rekening</label>
            <input type="text" name="atasnama_rek" id="atasnama_rek" class="form form-control" required autocomplete="off">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="simpan" class="btn btn-info" value="simpan">
      </div>
      </form>
    </div>
  </div>
</div>
@endsection