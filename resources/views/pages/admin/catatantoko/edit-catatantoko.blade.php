@extends('layouts.app')

@section('title', 'Edit Data Catatan Toko')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Data Catatan Toko</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Catatan Toko</a></div>
                    <div class="breadcrumb-item">Edit Data Catatan Toko</div>
                </div>
            </div>

            <div class="section-body">
                {{-- <h2 class="section-title">Edit Data Catatan Toko</h2>
                <p class="section-lead">
                    On this page you can create a new post and fill in all fields.
                </p> --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body mt-4">
                                <form method="POST" action="{{ route('admin.catatantoko.update', $data->id) }}"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name='nama'
                                                value="{{ old('nama') ?? $data->nama }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="date" class="form-control" name="tanggal"
                                                value="{{ old('tanggal') ?? $data->tanggal->format('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="summernote-simple" name="keterangan">{!! old('keterangan') ?? $data->keterangan !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto
                                            Catatan Toko</label>
                                        <div class="col-sm-6 col-md-7">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div id="image-preview" class="image-preview d-block">
                                                        <label for="image-upload" id="image-label">Pilih Foto</label>
                                                        <input type="file" name="image" id="image-upload" />
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="image-preview">
                                                        <img class="mr-3 rounded"
                                                            style="max-width: 100%;max-height: 100%;object-fit: cover;"
                                                            src="{{ Helper::setUrlImage($data->image) }}" alt="product">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary" type="submit">Edit Data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-post-create.js') }}"></script>
@endpush
