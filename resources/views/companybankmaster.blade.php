@extends('layout.main')
@push('title')
    <title>Company Bank Master</title>

@endpush
@section('page-name')
    Company Bank Master
@endsection
@section('main-content')
{{-- Start Form --}}
<div class="container-fluid">
<form name="frmBank" id="frmBank" method="post"  action="companybankdetail">
    @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <h3>Bank Master</h3>
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
    <div class="form-group col-md-6">
      <label for="bankName">Bank Name</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="bankName" name="bankName" placeholder="Enter Bank Name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="accountNumber">Bank Account Number</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="accountNumber" name="accountNumber" placeholder="Enter Bank Name" required>
    </div>
  </div>
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="bsrCode">Bar Code</label>
      <input type="text" size="20" maxlength="20" class="form-control" id="bsrCode" name="bsrCode" placeholder="Enter Bank Bar code" required>
    </div>
    <div class="form-group col-md-6">
      <label for="micrCode">MICR Code</label>
      <input type="text" size="20" maxlength="20" class="form-control" id="micrCode" name="micrCode" placeholder="Enter MICR Code" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="ifscCode">IFSC Code</label>
      <input type="text" size="20" maxlength="20" class="form-control" id="ifscCode" name="ifscCode" placeholder="Enter IFSC Code" required>
    </div>
    <div class="form-group col-md-6">
      <label for="address">Address</label>
      <input type="text" size="255" maxlength="255" class="form-control" id="address" name="address" placeholder="Enter Address" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="contactPersonName">Contact Person Name</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="contactPersonName" name="contactPersonName" placeholder="Enter Contact Person Name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="contactPersonNo">Contact Person Number</label>
      <input type="text" size="20" maxlength="20" class="form-control" id="contactPersonNo" name="contactPersonNo" placeholder="Enter Contact Person Number" required>
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
    //         {data: 'bankName',name: 'bankName'},
    //         {data: 'accountNumber',name: 'accountNumber'},
    //         {data: 'action',name: 'edit'}

    //     ]
    // });
    // }
    //display all records
    function displayRecords(){
        $.ajax({
            url:'{{route('companybankmasterdisplay')  }}',
            method :'get',
            success:function(response){
                //console.log(response);
                $('#loadRecordTable').html(response);
                $('table').DataTable();
        }
        });
    }
    $('#btnCancel').click(function (){
        $('#frmBank')[0].reset();
        $('#btnSave').text('Save');
        Swal.fire(
            'Reset',
            'Reset for enter new record',
           'success'
                        );
    });
    $('#frmBank').submit(function(e){
        e.preventDefault();
        fd = new FormData(this);
        var btnSaveText = $('#btnSave').text();
        if(btnSaveText=='Save')
        {
            $('.message').html("Record Insert");
            $.ajax({
            url: '{{ route('companybankmasterstore') }}',
            method : 'post',
            data: fd,
            processData: false,
            contentType: false,
            success:function(response){
                //console.log(response);
                if(response.status==200){
                    $('.message').html(response.rowmessage);
                    $('#frmBank')[0].reset();
                    displayRecords();
                    $('#btnSave').text('Save');
                    Swal.fire(
                        'Saved',
                        response.rowmessage,
                        'success'
                        );
                }else{
                    $('.message').html('Error In Save');
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
                        url: '{{ route('companybankmasterupdate') }}',
                        method : 'post',
                        data: fd,
                        processData: false,
                        contentType: false,
                        success:function(response){
                            //console.log(response);
                            if(response.status==200){
                                $('.message').html(response.rowmessage);
                                $('#frmBank')[0].reset();
                                displayRecords();
                                $('#btnSave').text('Save');
                            }else{
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
    function editData(status,key,bankId){
        //console.log(bankId);
        $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('companybankmasteredit')  }}',
            method :'post',
            data: {
                bankId: bankId
            },
            success:function(response){
                //console.log(response);
                $('#btnSave').text('Update');
                if(status==1){
                    $('#rowId').val(response.bankId);
                    $('#bankName').val(response.bankName);
                    $('#accountNumber').val(response.accountNumber);
                    $('#bsrCode').val(response.bsrCode);
                    $('#micrCode').val(response.micrCode);
                    $('#ifscCode').val(response.ifscCode);
                    $('#address').val(response.address);
                    $('#contactPersonName').val(response.contactPersonName);
                    $('#contactPersonNo').val(response.contactPersonNo);
                    topFunction();

                }
                else{
                    //alert('view');
                     $('#viewRecordLabel').html("Bank Name:-"+ response.bankName);
              $('#viewRecord').modal('show');
              var view = "Bank Id :" + response.bankId  + "<br> Bank Account Number :-" + response.accountNumber +"<br> BSR Code :-" + response.bsrCode + "<br> MICR Code :-" + response.micrCode + "<br> IFSC Code :-" + response.ifscCode + "<br> Address :-" + response.address + "<br> Contact Person Name :-" + response.contactPersonName + "<br> Contact Person Number :-" + response.contactPersonNo;
              $('#viewContent').html(view);
                }

        }
        });

    }
    function deleteData(status,key,bankId){
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
                    url:'{{route('companybankmasterdelete')  }}',
                    method :'post',
                    data: {
                        bankId: bankId
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
