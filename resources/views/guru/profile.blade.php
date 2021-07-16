@extends('layouts.guru')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                </div>

                <h3 class="profile-username text-center">{{ $name }}</h3>

                <p class="text-muted text-center">{{ $nama_sekolah }}</p>

                <p class="text-muted text-center">{{ $email }}</p>
                

                <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection