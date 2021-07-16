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

                <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lingkungan</h3>
              <div class="pull-right">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add" id="add"><i class="fa fa-plus"></i> Tambahkan Materi</button>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <div id="table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                <div class="col-sm-12">
                <table id="table" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="table_info">
                <thead>
                <tr>
                <th>Judul Tema</th>
                <th>Link Video</th>
                <th>Materi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
                </tr>
                </thead>
              </table></div></div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
                
            
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


    <div class="modal fade" id="modal-add">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Input Materi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
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
                    <label for="link">Judul Tema</label>
                    <input type="text" class="form-control" id="judul_tema" name="judul_tema" placeholder="Masukkan Judul Tema" value="" required>
                  </div>
                  <div class="form-group">
                    <label for="link">Link Youtube Video</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="Masukkan Link Video" value="" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Materi</label>
                    <textarea class="form-control" rows="6" Placeholder="Masukkan Materi" name="teks_materi" id="teks_materi" required></textarea>
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Kata Kunci</label>
                    <table class="table table-bordered" id="dynamic_field">
                      <tr>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Tambah Lagi</button></td>  

                      </tr>
                      <tr>  
                            <td><input type="text" name="kata_kunci[]" value="" required placeholder="Masukkan kata Kunci" class="form-control name_list" /></td>
                      </tr>

                    </table>
                      
                  </div> -->
                  <input type="hidden" value="3" id="tema" name="tema">
                  <input type="hidden" id="id" name="id">

                </div>
                <!-- /.card-body -->
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

@endsection

@push('scripts')
<script type="text/javascript">
$(document).ready( function () {
    $('#add').click(function(){
        $('#link').val('');
        $('#teks_materi').val('');
    });
    // var i=1;  
    //   $('#add').click(function(){  
    //        i++;  
    //        $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="kata_kunci[]" placeholder="Masukkan kata Kunci" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
    //   });  
    //   $(document).on('click', '.btn_remove', function(){  
    //        var button_id = $(this).attr("id");   
    //        $('#row'+button_id+'').remove();  
    //   });
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('index.kesehatan') }}",
        columns: [
            // { data: 'id', name: 'id' },
            { data: 'judul_tema', name: 'judul_tema' },
            { data: 'link', name: 'link' },
            { data: 'teks_materi', name: 'teks_materi' },
            { data: 'tgl', name: 'tgl' },
            {data: 'action', name: 'action', orderable: false},
            ],
            });
        });
  
function edit(id){
    $.ajax({
        type:"GET",
        url: '{!! route('detail.lingkungan', [':id']) !!}'.replace(':id',id),
        success: function(res){
            $('#modal-add').modal('show');
            $('#id').val(res.id);
            $('#link').val(res.link);
            $('#judul_tema').val(res.judul_tema);
            $('#teks_materi').val(res.teks_materi);
            
    }
    });
}  
function deleteFunc(id){
    if (confirm("Delete Record?") == true) {
    var id = id;
    // ajax
    $.ajax({
    type:"POST",
    url: '{!! route('delete.lingkungan') !!}',
    data: { 
        "_token": "{{ csrf_token() }}",
        "id": id 
        },
    dataType: 'json',
    success: function(res){
    var oTable = $('#table').dataTable();
    oTable.fnDraw(false);
    }
    });
    }
}

</script> 
@endpush