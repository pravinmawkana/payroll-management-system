@extends('layout.main')
@push('title')
    <title>Company Branch Master</title>

@endpush
@section('page-name')
    Company Branch Master
@endsection
@section('main-content')
{{-- Start Form --}}
<div class="container-fluid">
<form name="frmBranch" id="frmBranch" method="post"  action="companybranchmaster">
    @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <h3>Branch Master</h3>
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
    <div class="form-group col-md-3">
      <label for="branchCode">Branch Code</label>
      <input type="text" size="20" maxlength="20" class="form-control" id="branchCode" name="branchCode" placeholder="Enter Branch Code" required>
    </div>
    <div class="form-group col-md-3">
      <label for="branchName">Branch Name</label>
      <input type="text" size="30" maxlength="30" class="form-control" id="branchName" name="branchName" placeholder="Enter Branch Name" required>
    </div>

    <div class="form-group col-md-3">
      <label for="address">Address</label>
      <input type="text" size="255" maxlength="255" class="form-control" id="address" name="address" placeholder="Enter Address" required>
    </div>
    <div class="form-group col-md-3">
      <label for="tanNo">Tan No</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="tanNo" name="tanNo" placeholder="Enter Tan No" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="isPTApplicable">PT Applicable? </label>
      <select id="isPTApplicable" name="isPTApplicable" class="form-control">
        <option value="1" default>Yes </option>
        <option value="0" >No </option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="ptRegNo">ptRegNo</label>
      <input type="text" size="20" maxlength="20" class="form-control" id="ptRegNo" name="ptRegNo" placeholder="Enter ptRegNo" required>
    </div>

    <div class="form-group col-md-3">
      <label for="ptLocalOfiice">ptLocalOfiice</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="ptLocalOfiice" name="ptLocalOfiice" placeholder="Enter ptLocalOfiice" required>
    </div>
    <div class="form-group col-md-3">
      <label for="days">days</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="days" name="days" placeholder="Enter days" required>
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
                                <th>Branch Id</th>
                                <th>Branch Code</th>
                                <th>Branch Name</th>
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
<div class="modal fade" id="viewRecord" tabindex="-1" role="dialog" aria-labelledby="viewRecordLabel" aria-hidden="true">
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
$(document).ready(function(){
        $(document).ajaxStart(function () {
            $("#loadingmessage").show();
        }).ajaxStop(function () {
            $("#loadingmessage").hide();
        });

        displayRecords();
        // loadRecordTable();
});


    function displayRecords(){
        $.ajax({
            url:'{{route('branchmasterdisplay')  }}',
            method :'get',
            success:function(response){
                //console.log(response);
                $('#loadRecordTable').html(response);
                $('table').DataTable();
        }
        });
    }
    $('#btnCancel').click(function (){
        $('#frmBranch')[0].reset();
        $('#btnSave').text('Save');
        Swal.fire(
            'Reset',
            'Reset for enter new record',
           'success'
                        );
    });
    $('#frmBranch').submit(function(e){
        e.preventDefault();
        fd = new FormData(this);
        var btnSaveText = $('#btnSave').text();
        if(btnSaveText=='Save')
        {
            $('.message').html("Record Insert");
            $.ajax({
            url: '{{ route('branchmasterstore') }}',
            method : 'post',
            data: fd,
            processData: false,
            contentType: false,
            success:function(response){
                //console.log(response);
                if(response.status==200){
                    $('.message').html(response.rowmessage);
                    $('#frmBranch')[0].reset();
                    displayRecords();
                    $('#btnSave').text('Save');
                    Swal.fire(
                        'Saved',
                        response.rowmessage,
                        'success'
                        );
                }else{
                    //alert('Server Error');
                    var errormessages = "";
                    $.each(response.errors,function(key,errormessge){
                        errormessages = errormessages + errormessge + "</br>";
                        //console.log(errormessge);
                    });
                    //console.log(response.errors);
                    $('.message').html(errormessages);
                    Swal.fire(
                        'Error in save',
                        errormessages,
                        'error'
                        );
                }
            }
        });

            //manageData('Insert');
        }
        if(btnSaveText=='Update')
        {
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
                        url: '{{ route('branchmasterupdate') }}',
                        method : 'post',
                        data: fd,
                        processData: false,
                        contentType: false,
                        success:function(response){
                            //console.log(response);
                            if(response.status==200){
                                $('.message').html(response.rowmessage);
                                $('#frmBranch')[0].reset();
                                displayRecords();
                                $('#btnSave').text('Save');
                                Swal.fire('1 Record Updated!', '', 'success')
                            }else{
                                //alert('Server Error');
                                var errormessages = "";
                                $.each(response.errors,function(key,errormessge){
                                    errormessages = errormessages + errormessge + "</br>";
                                    //console.log(errormessge);
                                });
                                //console.log(response.errors);
                                $('.message').html(errormessages);
                                Swal.fire('Error in Upadte!', errormessages, 'error')
                            }
                        }
                    });


                } else if (result.isDenied) {
                    Swal.fire('Changes are not Updated', '', 'info')
                }
            });

        }

        //alert('done');
        //console.log(fd);

    });
    function editData(status,key,branchId){
        $('.message').html('Click Update button after changes');
        //console.log(branchId);
        $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('branchmasteredit')  }}',
            method :'post',
            data: {
                branchId: branchId
            },
            success:function(response){
                //console.log(response);
                $('#btnSave').text('Update');
                if(status==1){
                    $('#rowId').val(response.branchId);
                    $('#branchCode').val(response.branchCode);
                    $('#branchName').val(response.branchName);
                    $('#address').val(response.address);
                    $('#tanNo').val(response.tanNo);
                    $('#isPTApplicable').val(response.isPTApplicable);
                    $('#ptRegNo').val(response.ptRegNo);
                    $('#ptLocalOfiice').val(response.ptLocalOfiice);
                    $('#days').val(response.days);

                    topFunction();

                }
                else{
                    //alert('view');
                     $('#viewRecordLabel').html("Branch Code:-"+ response.branchCode);
              $('#viewRecord').modal('show');
              var view = "Branch Id :" + response.branchId  + "<br> Branch Name :-" + response.branchName +"<br>Address :-" + response.address + "<br>TAN No:-" + response.tanNo + "<br> Address 1 :-" + response.isPTApplicable + "<br> ptRegNo :-" + response.ptRegNo + "<br> ptLocalOfiice :-" + response.ptLocalOfiice + "<br> days :-" + response.days;
              $('#viewContent').html(view);
                }

        }
        });

    }
    function deleteData(status,key,branchId){
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
                    url:'{{route('branchmasterdelete')  }}',
                    method :'post',
                    data: {
                        branchId: branchId
                    },
                    success:function(response){
                        if(response.status==200){
                            $('.message').html(response.rowmessage);
                            displayRecords();
                        }else{
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
