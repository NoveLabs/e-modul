@extends('layouts.guru')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

 <!-- general form elements -->
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" id="edit_form" method="POST" action="{{ route('profile.edit.guru') }}">
              @csrf
              <input type="hidden" value="{{ $data[0]->id }}" name="id">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama" value="{{ $data[0]->name }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Sekolah" value="{{ $data[0]->nama_sekolah }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Masukan Email" value="{{ $data[0]->email }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Tidak Perlu Di Isi Apabila Tidak Ingin Mengganti Password" value="">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection