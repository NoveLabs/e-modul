@extends('layouts.nilai')

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
              <h3 class="card-title">Report Hasil Penilaian</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <div id="table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                <div class="col-sm-12">
                <table id="table" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="table_info">
                <thead>
                <tr>
                <th>Nilai</th>
                <th>Nama Siswa</th>
                <th>Tema</th>
                <th>Judul Tema</th>
                <th>Tanggal</th>
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

@endsection

@push('scripts')
<script type="text/javascript">
$(document).ready( function () {
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $('#table').DataTable({
        processing: true,
        serverSide: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        ajax: "{{ route('nilai.sosial.index') }}",
        columns: [
            // { data: 'id', name: 'id' },
            { data: 'nilai', name: 'nilai' },
            { data: 'user_id', name: 'user_id' },
            { data: 'tema', name: 'tema' },
            { data: 'id_materi', name: 'id_materi' },
            { data: 'tgl', name: 'tgl' },
            ],
            });
        });
  

</script> 
@endpush