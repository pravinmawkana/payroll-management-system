@extends('layout.main')
@push('title')
    <title>Company TAN Master</title>

@endpush
@section('page-name')
    Company TAN Master
@endsection
@section('main-content')
{{-- Start Form --}}
<div class="container-fluid">
<form name="frmTAN" id="frmTAN" method="post"  action="companytanmaster">
    @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <h3>TAN Master</h3>
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
      <label for="tanNo">TAN No</label>
      <input type="text" size="10" maxlength="10" class="form-control" id="tanNo" name="tanNo" placeholder="Enter TAN No" required>
    </div>
    <div class="form-group col-md-3">
      <label for="tanRegisterAt">TAN Registered At</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="tanRegisterAt" name="tanRegisterAt" placeholder="Enter TAN No" required>
    </div>

    <div class="form-group col-md-3">
      <label for="tdsCircle">TDS Circle</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="tdsCircle" name="tdsCircle" placeholder="Enter Bank TDS Circle" required>
    </div>
    <div class="form-group col-md-3">
      <label for="decuctorType">Decuster Type</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="decuctorType" name="decuctorType" placeholder="Enter Decuster Type" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="address1">Address 1</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="address1" name="address1" placeholder="Enter Address 1" required>
    </div>
    <div class="form-group col-md-3">
      <label for="address2">Address2</label>
      <input type="text" size="5" maxlength="5" class="form-control" id="address2" name="address2" placeholder="Enter Address2" required>
    </div>

    <div class="form-group col-md-3">
      <label for="address3">Address 3</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="address3" name="address3" placeholder="Enter Address 3" required>
    </div>
    <div class="form-group col-md-3">
      <label for="city">city</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="city" name="city" placeholder="Enter city" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="pinCode">Pin Code</label>
      <input type="text" size="10" maxlength="10" class="form-control" id="pinCode" name="pinCode" placeholder="Enter Pin Code" required>

    </div>
    <div class="form-group col-md-3">
      <label for="state">state</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="state" name="state" placeholder="Enter state" required>
    </div>

    <div class="form-group col-md-3">
      <label for="emailId1">Email Id</label>
      <input type="text" size="255" maxlength="255" class="form-control" id="emailId1" name="emailId1" placeholder="Enter Email Id" required>
    </div>
    <div class="form-group col-md-3">
      <label for="emailId2">Alternative Email Id</label>
      <input type="text" size="255" maxlength="255" class="form-control" id="emailId2" name="emailId2" placeholder="Enter Alternative Email Id" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="contact1">Contanct No</label>
      <input type="text" size="20" maxlength="20" class="form-control" id="contact1" name="contact1" placeholder="Enter Contanct No" required>
    </div>
    <div class="form-group col-md-3">
      <label for="contact2">Alternative Contact</label>
      <input type="text" size="20" maxlength="20" class="form-control" id="contact2" name="contact2" placeholder="Enter Alternative Contact" required>
    </div>

    <div class="form-group col-md-3">
      <label for="resonsiblePersonName">Responsible Person Name</label>
      <input type="text" size="100" maxlength="100" class="form-control" id="resonsiblePersonName" name="resonsiblePersonName" placeholder="Enter Responsible Person Name" required>
    </div>
    <div class="form-group col-md-3">
      <label for="resonsiblePersonPAN">Responsible Person PAN</label>
      <input type="text" size="10" maxlength="10" class="form-control" id="resonsiblePersonPAN" name="resonsiblePersonPAN" placeholder="Enter Responsible Person PAN" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="resonsiblePersonDesignation">Responsible Person Designation</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="resonsiblePersonDesignation" name="resonsiblePersonDesignation" placeholder="Enter Responsible Person Designation" required>
    </div>
    <div class="form-group col-md-3">
      <label for="resonsiblePersonFName">Responsible Person Father Name</label>
      <input type="text" size="100" maxlength="100" class="form-control" id="resonsiblePersonFName" name="resonsiblePersonFName" placeholder="Enter Responsible Person Father Name" required>
    </div>

    <div class="form-group col-md-3">
      <label for="resonsiblePersonMobile">Responsible Person Mobile</label>
      <input type="text" size="20" maxlength="20" class="form-control" id="resonsiblePersonMobile" name="resonsiblePersonMobile" placeholder="Enter Responsible Person Mobile" required>
    </div>
    <div class="form-group col-md-3">
      <label for="resonsiblePersonContactNo1">Responsible Person Contact</label>
      <input type="text" size="20" maxlength="20" class="form-control" id="resonsiblePersonContactNo1" name="resonsiblePersonContactNo1" placeholder="Enter Responsible Person Contact" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="resonsiblePersonContactNo2">Responsible Person Alt No</label>
      <input type="text" size="20" maxlength="20" class="form-control" id="resonsiblePersonContactNo2" name="resonsiblePersonContactNo2" placeholder="Enter Responsible Person Alt No" required>
    </div>
    <div class="form-group col-md-3">
      <label for="resonsiblePersonemailId1">Responsible Person Email</label>
      <input type="text" size="255" maxlength="255" class="form-control" id="resonsiblePersonemailId1" name="resonsiblePersonemailId1" placeholder="Enter Responsible Person Email" required>
    </div>

    <div class="form-group col-md-3">
      <label for="resonsiblePersonemailId2">Responsible Person alt Email</label>
      <input type="text" size="255" maxlength="255" class="form-control" id="resonsiblePersonemailId2" name="resonsiblePersonemailId2" placeholder="Enter Responsible Person alt Email" required>
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
                                <th>Tan Id</th>
                                <th>Tan No</th>
                                <th>Responsible Person Name</th>
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

    // function loadRecordTable(){
    //     var $table = $('table').DataTable({
    //     serverSide:true,
    //     processing:true,
    //     ajax:"{{ route('companybankmaster') }}",
    //     columns:[
    //         {data: 'DT_RowIndex',name: 'DT_RowIndex'},
    //         {data: 'tanNo',name: 'tanNo'},
    //         {data: 'tanRegisterAt',name: 'tanRegisterAt'},
    //         {data: 'action',name: 'edit'}

    //     ]
    // });
    // }
    //display all records
    function displayRecords(){
        $.ajax({
            url:'{{route('companytanmasterdisplay')  }}',
            method :'get',
            success:function(response){
                //console.log(response);
                $('#loadRecordTable').html(response);
                $('table').DataTable();
        }
        });
    }
    $('#btnCancel').click(function (){
        $('#frmTAN')[0].reset();
        $('#btnSave').text('Save');
        Swal.fire(
            'Reset',
            'Reset for enter new record',
           'success'
                        );
    });
    $('#frmTAN').submit(function(e){
        e.preventDefault();
        fd = new FormData(this);
        var btnSaveText = $('#btnSave').text();
        if(btnSaveText=='Save')
        {
            $('.message').html("Record Insert");
            $.ajax({
            url: '{{ route('companytanmasterstore') }}',
            method : 'post',
            data: fd,
            processData: false,
            contentType: false,
            success:function(response){
                //console.log(response);
                if(response.status==200){
                    $('.message').html(response.rowmessage);
                    $('#frmTAN')[0].reset();
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
                        url: '{{ route('companytanmasterupdate') }}',
                        method : 'post',
                        data: fd,
                        processData: false,
                        contentType: false,
                        success:function(response){
                            //console.log(response);
                            if(response.status==200){
                                $('.message').html(response.rowmessage);
                                $('#frmTAN')[0].reset();
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
    function editData(status,key,tanId){
        $('.message').html('Click Update button after changes');
        //console.log(tanId);
        $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('companytanmasteredit')  }}',
            method :'post',
            data: {
                tanId: tanId
            },
            success:function(response){
                //console.log(response);
                $('#btnSave').text('Update');
                if(status==1){
                    $('#rowId').val(response.tanId);
                    $('#tanNo').val(response.tanNo);
                    $('#tanRegisterAt').val(response.tanRegisterAt);
                    $('#tdsCircle').val(response.tdsCircle);
                    $('#decuctorType').val(response.decuctorType);
                    $('#address1').val(response.address1);
                    $('#address2').val(response.address2);
                    $('#address3').val(response.address3);
                    $('#city').val(response.city);
                    $('#pinCode').val(response.pinCode);
                    $('#state').val(response.state);
                    $('#emailId1').val(response.emailId1);
                    $('#emailId2').val(response.emailId2);
                    $('#contact1').val(response.contact1);
                    $('#contact2').val(response.contact2);
                    $('#resonsiblePersonName').val(response.resonsiblePersonName);
                    $('#resonsiblePersonPAN').val(response.resonsiblePersonPAN);
                    $('#resonsiblePersonDesignation').val(response.resonsiblePersonDesignation);
                    $('#resonsiblePersonFName').val(response.resonsiblePersonFName);
                    $('#resonsiblePersonMobile').val(response.resonsiblePersonMobile);
                    $('#resonsiblePersonContactNo1').val(response.resonsiblePersonContactNo1);
                    $('#resonsiblePersonContactNo2').val(response.resonsiblePersonContactNo2);
                    $('#resonsiblePersonemailId1').val(response.resonsiblePersonemailId1);
                    $('#resonsiblePersonemailId2').val(response.resonsiblePersonemailId2);


                    topFunction();

                }
                else{
                    //alert('view');
                     $('#viewRecordLabel').html("TAN No:-"+ response.tanNo);
              $('#viewRecord').modal('show');
              var view = "TAN Id :" + response.tanId  + "<br> TAN Registered At :-" + response.tanRegisterAt +"<br>Responsible Person Name :-" + response.resonsiblePersonName + "<br> Reposible Person Moible :-" + response.resonsiblePersonMobile + "<br> Address 1 :-" + response.address1 + "<br> Address 2:-" + response.address2 + "<br> Address 3 :-" + response.address3 + "<br> city :-" + response.city;
              $('#viewContent').html(view);
                }

        }
        });

    }
    function deleteData(status,key,tanId){
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
                    url:'{{route('companytanmasterdelete')  }}',
                    method :'post',
                    data: {
                        tanId: tanId
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
