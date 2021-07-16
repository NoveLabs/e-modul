@extends('layouts.materi_siswa')

@section('content')
    <!-- Main content -->
    <section class="content">
    <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{ $data->judul_tema }}</h3>
              <div class="col-12">
              <iframe width="1000" height="315" src="{{ $data->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          </div>
          <div class="card-footer">
                  <div class="text-right">
                    <a href="{{ url('/soal/lingkungan/') }}/{{ $data->id }}" class="btn btn-sm btn-primary">
                      <i class="fa fa-edit"></i> Selanjutnya
                    </a>
                  </div>
                </div>
        </div>
        <!-- /.card-body -->
      </div>
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
                    <label for="link">Link Youtube Video</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="Masukkan Link Video" value="" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Materi</label>
                    <textarea class="form-control" rows="6" Placeholder="Masukkan Materi" name="teks_materi" id="teks_materi" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kata Kunci</label>
                    <table class="table table-bordered" id="dynamic_field">
                      <tr>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Tambah Lagi</button></td>  

                      </tr>
                      <tr>  
                            <td><input type="text" name="kata_kunci[]" value="" required placeholder="Masukkan kata Kunci" class="form-control name_list" /></td>
                      </tr>

                    </table>
                      
                  </div>
                  <input type="hidden" value="1" id="tema" name="tema">
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
    var i=1;
    var o=1;  
      $('#add_jawaban').click(function(){  
           i++;  
           $('#dynamic_field_jawaban').append('<tr id="row_jawaban'+i+'"><td><input type="text" name="kata_kunci[]" placeholder="Masukkan kata Kunci" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });
      $('#add_pertanyaan').click(function(){  
           o++;  
           $('#dynamic_field_pertanyaan').append('<tr id="row_pertanyaan'+o+'"><td><input type="text" name="pertanyaan[]" placeholder="Masukkan kata Kunci" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+o+'" class="btn btn-danger btn_remove_pertanyaan">X</button></td></tr>');  
      });    
      $(document).on('click', '.btn_remove_pertanyaan', function(){  
           var button_id_pertanyaan = $(this).attr("id");   
           $('#row_pertanyaan'+button_id_pertanyaan+'').remove();  
      });
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row_jawaban'+button_id+'').remove();  
      });
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('index.lingkungan') }}",
        columns: [
            // { data: 'id', name: 'id' },
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