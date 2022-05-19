@extends('pages.admin.app')

@section('admin-content')
    <div class="assets">
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="text-center tc-blue-dark-1 mb-5">Assets</h2>
            </div>
        </div>
        <div class="row mt-3 mb-5 justify-content-center">
            <div class="col-12">
                <div id='assets-wrapper'>
                    <div class="row">
                        @foreach ($files as $file)
                            <div class="col-lg-4 col-md-6 col-12 mb-4">
                                <img src="{{ asset($file->webPath) }}" class="img-thumbnail rounded" alt="" loading="lazy">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
