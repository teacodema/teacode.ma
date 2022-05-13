@extends('pages.admin.app')
@section('js-after')
    <script defer src="{{ asset('/js/admin.app.js') }}"></script>
@endsection
@section('admin-content')
    <div class="calendar">
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="text-center tc-blue-dark-1 mb-5">Calendar</h2>
            </div>
        </div>
        <div class="row mt-3 mb-5 justify-content-center">
            <div class="col-12">
                <div id='calendar-wrapper'></div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade animate__animated" id="event-detail" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close ms-auto" data-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer d-none">
                </div>
            </div>
        </div>
    </div>
@endsection
