@extends('index')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Admin</h1>
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
            <div style="border:1px solid gray;background-color:white;padding:10px;border-radius:10px;">
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
              Tambah Admin
            </button>
            <table  id="example1" class="table table-sm table-striped table-borderless table-hover text-center">
                <thead style="background-color:#03808a;color:white;" >
                    <tr>
                    <th scope="col">Nama Admin</th>
                    <th scope="col">Username Admin</th>
                    <th scope="col">Password Admin</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($data as $d)
                    <tr id="id{{$d->id_admin}}">
                    <td>{{$d->nama_admin}}</td>
                    <td>{{$d->username_admin}}</td>
                    <td>{{$d->password_admin}}</td>
                    <td><a href="javascript:void(0)" onclick="editAdmin(<?= $d->id_admin ?>)" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> <a href="javascript:void(0)" onclick="deleteAdmin(<?= $d->id_admin ?>)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
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

    <!-- Add data Modal Ajax -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" id="add_admin">
            {{csrf_field()}}
              <div class="form-group">
                <label for="nama_admin">Nama Admin</label>
                <input type="text" name="nama_admin" id="nama_admin" class="form form-control" required autocomplete="off">
              </div>
              <div class="form-group">
                <label for="username_admin">Username Admin</label>
                <input type="text" name="username_admin" id="username_admin" class="form form-control" required autocomplete="off">
              </div>
              <div class="form-group">
                <label for="password_admin">Password Admin</label>
                <input type="password" name="password_admin" id="password_admin" class="form form-control" required autocomplete="off">
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

    <!-- Edit Data Modal Ajax -->
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" id="edit_admin">
            {{csrf_field()}}
            <input type="hidden" id="id_admin" name="id_admin">
              <div class="form-group">
                <label for="nama_admin">Nama Admin</label>
                <input type="text" name="nama_admin" id="nama_admin2" class="form form-control" required autocomplete="off">
              </div>
              <div class="form-group">
                <label for="username_admin">Username Admin</label>
                <input type="text" name="username_admin" id="username_admin2" class="form form-control" required autocomplete="off">
              </div>
              <div class="form-group">
                <label for="password_admin">Password Admin</label>
                <input type="password" name="password_admin" id="password_admin2" class="form form-control" required autocomplete="off">
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