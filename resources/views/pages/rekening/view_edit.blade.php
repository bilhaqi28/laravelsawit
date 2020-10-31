@extends('index')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Data Rekening</h1>
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
          @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>{{$message}}</div>
            @endif
            @foreach($data as $d)
            <!-- small box -->
            <div style="border:1px solid gray;background-color:white;padding:10px;border-radius:10px;width:auto;">
              <form action="/rekening/edit_rekening" method="POST">
            {{csrf_field()}}

            <div class="form-group">
              <label for="id_rek">Id Rekening</label>
              <input type="text" name="id_rek" id="id_rek" class="form form-control" readonly required value="{{$d->id_rek}}">
            </div>

            <div class="form-group">
              <label for="norek">No Rekening</label>
              <input type="number" name="no_rek" id="norek" class="form form-control" required value="{{$d->no_rek}}">
            </div>

            <div class="form-group">
              <label for="bank_rek">Bank Rekening</label>
              <input type="text" name="bank_rek" id="bank_rek" class="form form-control" required value="{{$d->bank_rek}}">
            </div>

            <div class="form-group">
              <label for="atasnama_rek">Atas Nama Rekening</label>
              <input type="text" name="atasnama_rek" id="atasnama_rek" class="form form-control" required value="{{$d->atasnama_rek}}">
            </div>

            <div class="form-group">
              <input type="submit" name="edit" value="Edit" class="btn btn-info btn-block">
            </div>

            </form>
            @endforeach
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

@endsection