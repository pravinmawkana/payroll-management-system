@extends('layout.main')
@push('title')
    <title>Upload Employee</title>
@endpush
@section('page-name')
    Upload Employee
@endsection
@section('main-content')
    <form id="frmUploadEmployee" name="frmUploadEmployee" method="post" action="{{ route('importemployee') }}"
        enctype="multipart/form-data">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="employeUpload">Upload Only XlSX File</label>
                <input type="file" class="form-control" id="employeUpload" name="employeUpload" required>
                <div class="fileSelected" style="color: white;"></div>
                <label for="btnUpload">Click Here for Upload File</label>
                <button class="btn btn-primary" type="submit" id="btnUpload"><span id="submitSpinner"></span> File and
                    Validate</button>
            </div>
            <div class="form-group col-md-6">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated uploadProgress" style="width:0%">
                    </div>
                </div>
                <br>
                <div class="status" style="color: white;">No File Selected</div>
            </div>
        </div>
    </form>

    <div class="responseData"></div>
@endsection

@section('script')
    <script type="text/javascript">
        function validateFile() {
            const fileInput = document.getElementById('employeUpload');
            const filePath = fileInput.value;
            const allowedExtensions = /(\.xlsx)$/i;

            if (!allowedExtensions.exec(filePath)) {
                Swal.fire('Invalid file type!', 'Only XLSX files are allowed', 'error')

                fileInput.value = '';
                return false;
            }
            return true;
        }
        $('body').on('submit', '#frmUploadEmployee', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if (validateFile()) {
                $.ajax({
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    type: 'POST',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('#submitSpinner').html('<i class="fa fa-spinner fa-spin"></i>');
                    },
                    success: function(data) {

                        $('.responseData').html(data.data);
                        // if (data.status == 400) {
                        //     $('#submitSpinner').html('');
                        // }
                        // if (data.status == 200) {
                        $('#submitSpinner').html('');
                        // }
                    }

                });
            }
            // alert('ok');
        });
        $('body').on('submit', '.excelsubmit', function(e) {
            // alert('ok');
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: $(this).attr('action'),
                data: new FormData(this),
                type: 'POST',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#finalsubmitspinner').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data) {
                    alert(data);
                    // $('.responseData').html(data.data);
                    // if (data.status == 400) {
                    //     $('#finalsubmitspinner').html('');
                    // }
                    // if (data.status == 200) {
                    $('#finalsubmitspinner').html('');
                    // }
                }

            });


        });
    </script>
@endsection
