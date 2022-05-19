@extends('layout.main')
@push('title')
    <title>Designation Master</title>

@endpush
@section('page-name')
    Designation Master
@endsection
@section('main-content')
{{-- Start Form --}}
<div class="container-fluid">
<form name="frmDesignationMaster" id="frmDesignationMaster" method="post"  action="designationmaster">
    @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <h3>Designation Master</h3>
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
      <label for="desigName">Designation Name</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="desigName" name="desigName" placeholder="Enter Designation Name" required>
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
                                <th>Designation Id</th>
                                <th>Designation Name</th>
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
            url:'{{route('desigmasterdisplay')  }}',
            method :'get',
            success:function(response){
                //console.log(response);
                $('#loadRecordTable').html(response);
                $('table').DataTable();
        }
        });
    }
    $('#btnCancel').click(function (){
        $('#frmDesignationMaster')[0].reset();
        $('#btnSave').text('Save');
        Swal.fire(
            'Reset',
            'Reset for enter new record',
           'success'
                        );
    });
    $('#frmDesignationMaster').submit(function(e){
        e.preventDefault();
        fd = new FormData(this);
        var btnSaveText = $('#btnSave').text();
        if(btnSaveText=='Save')
        {
            $('.message').html("Record Insert");
            $.ajax({
            url: '{{ route('desigmasterstore') }}',
            method : 'post',
            data: fd,
            processData: false,
            contentType: false,
            success:function(response){
                //console.log(response);
                if(response.status==200){
                    $('.message').html(response.rowmessage);
                    $('#frmDesignationMaster')[0].reset();
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
                        url: '{{ route('desigmasterupdate') }}',
                        method : 'post',
                        data: fd,
                        processData: false,
                        contentType: false,
                        success:function(response){
                            //console.log(response);
                            if(response.status==200){
                                $('.message').html(response.rowmessage);
                                $('#frmDesignationMaster')[0].reset();
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
    function editData(status,key,desigId){
        $('.message').html('Click Update button after changes');
        //console.log(desigId);
        $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('desigmasteredit')}}',
            method :'post',
            data: {
                desigId: desigId
            },
            success:function(response){
                //console.log(response);
                $('#btnSave').text('Update');
                if(status==1){
                    $('#rowId').val(response.desigId);
                    $('#desigName').val(response.desigName);


                    topFunction();

                }
                else{
                    //alert('view');
                     $('#viewRecordLabel').html("Branch Code:-"+ response.desigName);
              $('#viewRecord').modal('show');
              var view = "Designation Id :" + response.desigId  + "<br> Designation Name :-" + response.desigName ;
              $('#viewContent').html(view);
                }

        }
        });

    }
    function deleteData(status,key,desigId){
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
                    url:'{{route('desigmasterdelete')  }}',
                    method :'post',
                    data: {
                        desigId: desigId
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
