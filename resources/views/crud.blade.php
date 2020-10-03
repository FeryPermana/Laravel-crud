@extends('layouts.master')
@section('title','crud')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{ route('crud.tambah') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-plus"></i>Tambah data</a>
            <hr>
            @if ($message = Session::get('hapus'))
                <div class="alert alert-warning alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>×</span>
                      </button>
                      {{ $message }}
                    </div>
                  </div>
            @endif
            @if ($message = Session::get('simpan'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>×</span>
                      </button>
                      {{ $message }}
                    </div>
                  </div>
            @endif
            @if ($message = Session::get('update'))
            <div class="alert alert-warning alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>×</span>
                  </button>
                  {{ $message }}
                </div>
              </div>
        @endif
            <table class="table table-striped table-bordered">
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Action</th>
                </tr>
             
                @foreach ($data_barang as $no => $data)
                <tr>
                    <td>{{ $data_barang->firstItem()+$no }}</td>
                    <td>{{ $data->kode_barang }}</td>
                    <td>{{ $data->nama_barang }}</td>
                    <td>
                        <a href="{{route('crud.edit', $data->id)}}" class="badge badge-warning">Edit</a>
                        <a href="#" data-id="{{$data->id}}" class="badge badge-danger swal-confirm">
                            <form action="{{route('crud.delete',$data->id)}}" id="delete{{$data->id}}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                            Delete</a>
                    </td>
                </tr>
                @endforeach
            
            </table>
            {{ $data_barang->links() }}
        </div>
    </div>
</div>

@endsection
@push('page-script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('after-script')
    <script>
        $(".swal-confirm").click(function(e) {
        id = e.target.dataset.id;
        swal({
            title: 'Yakin hapus data ???',
            text: 'Data yang dihapus',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                // swal('', {
                //     icon: 'success',
                // });
                $(`#delete${id}`).submit();
            } else {
                swal('Data gagal dihapus');
            }
            });
        });
    </script>
@endpush