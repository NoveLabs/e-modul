@extends('layouts.materi')

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
            <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Materi Lingkungan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="add_materi" id="add_materi"  role="form" enctype="multipart/form-data" method="POST" action="{{ route('materi.add') }}">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="link">Link Youtube Video</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="Masukkan Link Video" value="{{ $find_data->link }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Materi</label>
                    <textarea class="form-control" rows="6" Placeholder="Masukkan Materi" name="teks_materi" id="teks_materi">{{ $find_data->teks_materi }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kata Kunci</label>
                    <table class="table table-bordered" id="dynamic_field">
                      <tr>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Tambah Lagi</button></td>  

                      </tr>
                    @for ($i =0; $i < $count; $i++)
                      <tr id="row{{$i}}">  
                            <td><input type="text" name="kata_kunci[]" value="{{ $arr[$i] }}" placeholder="Masukkan kata Kunci" class="form-control name_list" /></td><td><button type="button" name="remove" id="{{ $i }}" class="btn btn-danger btn_remove">X</button></td>  
                      </tr>
                    @endfor

                    </table>
                      
                  </div>
                  <input type="hidden" value="3" id="id" name="id">

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@push('scripts')
<script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="kata_kunci[]" placeholder="Masukkan kata Kunci" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });
      

 });  
 </script>
 @endpush