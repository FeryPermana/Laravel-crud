@extends('layouts.master')
@section('title','crud')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('crud.simpan') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label @error('kode_barang')
                                        class="text-danger"
                                    @enderror>Kode Barang 
                                    @error('kode_barang')
                                       | {{ $message }}
                                    @enderror 
                                    </label>
                                    <input type="text" value="{{ old('kode_barang') }}" name="kode_barang" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label @error('nama_barang')
                                        class="text-danger"
                                    @enderror>Nama Barang 
                                    @error('nama_barang')
                                       | {{ $message }}
                                    @enderror 
                                    </label>
                                    <input type="text" value="{{ old('nama_barang') }}" name="nama_barang" class="form-control">
                                </div>
                            </div>
                        </div>
                </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                    </form>
              </div>
        </div>
    </div>
</div>
@endsection
@push('page-script')
@endpush