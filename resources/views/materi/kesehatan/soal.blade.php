@extends('layouts.materi_siswa')

@section('content')
    <!-- Main content -->
    <section class="content">
    <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <h3 class="my-3">{{ $data->judul_tema }}</h3>
              <!-- <p></p> -->

              <hr>
              <form role="form" enctype="multipart/form-data" id="add_form" method="POST" action="{{ route('add.lingkungan') }}">
              @csrf
              <h5>Setelah kamu melihat video itu, apa saja hal yang tidak kamu pahami?</h5>
              <h6>tulis pertanyaanmu pada kolom dibawah ini yaaaa! Lebih dari 3</h6>
              <div class="form-group col-md-12">
                    <table class="table table-bordered" id="dynamic_field_pertanyaan">
                      <tr>  
                            <td><input type="text" name="pertanyaan[]" value="" required placeholder="Tuliskan pertanyaan" class="form-control name_list" /></td>
                            <td><button type="button" name="add_pertanyaan" id="add_pertanyaan" class="btn btn-success">Tambah Lagi</button></td>  
                      </tr>

                    </table>
              </div>

              <h5 class="mt-3">Buatlah prediksi atas jawaban yang kamu buat! jawaban tersebut bisa terdiri atas 1 atau 2 kata!</h5>
              <div class="form-group col-md-12">
                    <table class="table table-bordered" id="dynamic_field_jawaban">
                      <tr>  
                            <td><input type="text" name="kata_kunci[]" value="" required placeholder="Tuliskan jawaban 1 atau 2 kata" class="form-control name_list" /></td>
                            <!-- <td><button type="button" name="add_jawaban" id="add_jawaban" class="btn btn-success">Tambah Lagi</button></td>   -->
                      </tr>

                    </table>
              </div>

              <h5 class="mt-3">Sekarang, rangkailah menjadi satu kalimat pertanyaan dan jawaban yang sudah kamu ajukan</h5>
              <div class="form-group col-md-12">
                    <textarea name="kalimat" id="kalimat" placeholder="buat kalimat dari jawaban di atas.." class="form-control" rows="3"></textarea>
              </div>

             
              <h5 class="mt-3"> Rangkailah kalimatmu menjadi sebuah paragraph utuh, ingat-ingat Kembali video yang sudah kamu lihat di awal!</h5>
              <div class="form-group col-md-12">
                <textarea name="paragraf" id="paragraf" placeholder="buat paragraf.." class="form-control" rows="3"></textarea>
              </div>
              <input type="hidden" name="user_id" id="user_id" value="{{ $id_user }}">
              <input type="hidden" name="id_pertanyaan" id="id_pertanyaan" value="{{ $data->id }}">

                <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            </form>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </section>
    <!-- /.content -->

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