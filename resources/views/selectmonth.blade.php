@extends('layout.main')
@push('title')
    <title>Select Month</title>
@endpush
@section('page-name')
    Select Month
@endsection
@section('main-content')
    {{-- Start Form --}}
    <div class="container-fluid">
        <form name="frmMonthMaster" id="frmMonthMaster" method="post" action="monthmaster">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h3>Month Master</h3>
                </div>
                <div class="form-group col-md-6">
                    <div class="message"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2"></div>
                <div class="form-group col-md-1">
                    <div class="Id"></div>
                </div>
                <div class="form-group col-md-3">

                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="startDate">Start Date</label>
                    <input type="date" size="50" maxlength="50" class="form-control" id="startDate" name="startDate"
                        placeholder="DD/MM/YYYY" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="endDate">End Date</label>
                    <input type="date" size="50" maxlength="50" class="form-control" id="endDate" name="endDate"
                        placeholder="DD/MM/YYYY" required>
                </div>
                <div class="form-group col-md-1">
                    <label for="mDays">Days</label>
                    <input type="text" size="20" maxlength="20" class="form-control" id="mDays" name="mDays"
                        placeholder="Enter Days" required>
                </div>
                <div class="form-group col-md-1">
                    <label for="month">Month</label>
                    <input type="text" size="20" maxlength="20" class="form-control" id="month" name="month"
                        placeholder="Enter Month" required>

                </div>
                <div class="form-group col-md-2">
                    <label for="year">Year</label>
                    <input type="text" size="20" maxlength="20" class="form-control" id="year" name="year"
                        placeholder="Enter year" required>

                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-3">
                    <input type="hidden" class="form-control" id="rowId" name="rowId">
                </div>
                <div class="form-group col-md-3">
                    <button id="btnSave" name="btnSave" type="submit" class="btn btn-success">Save</button>
                </div>
                <div class="form-group col-md-3">
                    <button id="btnCancel" name="btnCancel" type="button" class="btn btn-primary">Reset/Cancel</button>
                </div>
                <div class="form-group col-md-3">

                </div>
            </div>
        </form>
    </div>
    {{-- end form --}}

    {{-- Data Table Start --}}
    <div class="table-responsive-md" id="loadRecordTable">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Bank Id</th>
                    <th>Bank Name</th>
                    <th>Account No</th>
                    <th>Edit</th>
                    <th>View</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                <h1> Loadding....</h1>
            </tbody>
        </table>
    </div>
    {{-- Data Table End --}}
    {{-- Model for View --}}
    <div class="modal fade" id="viewRecord" tabindex="-1" role="dialog" aria-labelledby="viewRecordLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewRecordLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="viewContent">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Model --}}
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).ajaxStart(function() {
                $("#loadingmessage").show();
            }).ajaxStop(function() {
                $("#loadingmessage").hide();
            });

            displayRecords();
            // loadRecordTable();
        });

        // function loadRecordTable(){
        //     var $table = $('table').DataTable({
        //     serverSide:true,
        //     processing:true,
        //     ajax:"{{ route('companybankmaster') }}",
        //     columns:[
        //         {data: 'DT_RowIndex',name: 'DT_RowIndex'},
        //         {data: 'startDate',name: 'startDate'},
        //         {data: 'endDate',name: 'endDate'},
        //         {data: 'action',name: 'edit'}

        //     ]
        // });
        // }
        //display all records
        function displayRecords() {
            $.ajax({
                url: '{{ route('monthmasterdisplay') }}',
                method: 'get',
                success: function(response) {
                    //console.log(response);
                    $('#loadRecordTable').html(response);
                    $('table').DataTable();
                }
            });
        }
        $('#btnCancel').click(function() {
            $('#frmMonthMaster')[0].reset();
            $('#btnSave').text('Save');
            Swal.fire(
                'Reset',
                'Reset for enter new record',
                'success'
            );
        });
        $('#frmMonthMaster').submit(function(e) {
            e.preventDefault();
            fd = new FormData(this);
            var btnSaveText = $('#btnSave').text();
            if (btnSaveText == 'Save') {
                $('.message').html("Record Insert");
                $.ajax({
                    url: '{{ route('monthmasterstore') }}',
                    method: 'post',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        //console.log(response);
                        if (response.status == 200) {
                            $('.message').html(response.rowmessage);
                            $('#frmMonthMaster')[0].reset();
                            displayRecords();
                            $('#btnSave').text('Save');
                            Swal.fire(
                                'Saved',
                                response.rowmessage,
                                'success'
                            );
                        } else {
                            $('.message').html('Error In Save');
                        }
                    }
                });

                //manageData('Insert');
            }
            if (btnSaveText == 'Update') {
                Swal.fire({
                    title: 'Do you want to update the changes?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'update',
                    denyButtonText: `Don't update`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $('.message').html("Record Update");
                        $.ajax({
                            url: '{{ route('monthmasterupdate') }}',
                            method: 'post',
                            data: fd,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                //console.log(response);
                                if (response.status == 200) {
                                    $('.message').html(response.rowmessage);
                                    $('#frmMonthMaster')[0].reset();
                                    displayRecords();
                                    $('#btnSave').text('Save');
                                } else {
                                    $('.message').html('Error In Upadate');
                                }
                            }
                        });

                        Swal.fire('1 Record Updated!', '', 'success')
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not Updated', '', 'info')
                    }
                });

            }

            //alert('done');
            //console.log(fd);

        });

        function editData(status, key, sMonthId) {
            //console.log(sMonthId);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('monthmasteredit') }}',
                method: 'post',
                data: {
                    sMonthId: sMonthId
                },
                success: function(response) {
                    //console.log(response);
                    $('#btnSave').text('Update');
                    if (status == 1) {
                        $('#rowId').val(response.sMonthId);
                        $('#startDate').val(response.startDate);
                        $('#endDate').val(response.endDate);
                        $('#mDays').val(response.mDays);
                        $('#month').val(response.month);
                        $('#year').val(response.year);
                        topFunction();

                    } else {
                        //alert('view');
                        $('#viewRecordLabel').html("Month Details - " + response.monthDesc);
                        $('#viewRecord').modal('show');
                        var view = "Month Id :" + response.sMonthId + "<br> Start Date :-" + response
                            .startDate + "<br> End Date :-" + response
                            .endDate + "<br> Month days :-" + response.mDays + "<br> Month :-" +
                            response.month + "<br> Year :-" + response.year;

                        $('#viewContent').html(view);
                    }

                }
            });

        }

        function deleteData(status, key, sMonthId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route('monthmasterdelete') }}',
                        method: 'post',
                        data: {
                            sMonthId: sMonthId
                        },
                        success: function(response) {
                            if (response.status == 200) {
                                $('.message').html(response.rowmessage);
                                displayRecords();
                            } else {
                                $('.message').html('Error In Delete');
                            }
                        }
                    });
                    Swal.fire(
                        'Deleted!',
                        '1 Record deleted.',
                        'success'
                    )
                }
            });

        }
    </script>
@endsection
