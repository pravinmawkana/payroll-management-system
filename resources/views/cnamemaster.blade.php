@extends('layout.main')
@push('title')
    <title>Component Name Master</title>

@endpush
@section('page-name')
    Component Name Master
@endsection
@section('main-content')
{{-- Start Form --}}
<div class="container-fluid">
<form name="frmComponentNameMaster" id="frmComponentNameMaster" method="post"  action="ComponnentNameMaster">
    @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <h3>Component Name Master</h3>
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
          <label for="cTypeId">Component Type</label>
          <select class="selectcTypeId" name="cTypeId" id="cTypeId">
              <option value="select">---Select---</option>
          </select>
        </div>
    <div class="form-group col-md-3">
      <label for="cName">Component Name</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="cName" name="cName" placeholder="Enter Component Name" required>
    </div>
     <div class="form-group col-md-3">
      <label for="calcCode">Component Calculation Name</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="calcCode" name="calcCode" placeholder="Enter Component Caculation Name" required>
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
                                <th>Component Id</th>
                                <th>Component Name</th>
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
        loadCtype();
        displayRecords();
        // loadRecordTable();
        $('.selectcTypeId').select2({
                  placeholder: 'Select Chassis No',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
});

function loadCtype()
{
    $.ajaxSetup({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
    $.ajax({
            url:'{{route('cnamemasterload')  }}',
            method: 'post',
            data: {
              key:'ctype'
            },
            dataType: 'json',
            success:function(response){

                var len = response.length;

                $(".selectcTypeId").empty();
                for( var i = 0; i<len; i++){


                    var cTypeId = response[i]['cTypeId'];
                    var cTypeName = response[i]['cTypeName'];

                    $(".selectcTypeId").append("<option value='"+cTypeId+"'>"+cTypeName+"</option>");

                }

            }
        });
}
    function displayRecords(){
        $.ajax({
            url:'{{route('cnamemasterdisplay')  }}',
            method :'get',
            success:function(response){
                //console.log(response);
                $('#loadRecordTable').html(response);
                $('table').DataTable();
        }
        });
    }
    $('#btnCancel').click(function (){
        $('#frmComponentNameMaster')[0].reset();
        $('#btnSave').text('Save');
        Swal.fire(
            'Reset',
            'Reset for enter new record',
           'success'
                        );
    });
    $('#frmComponentNameMaster').submit(function(e){
        e.preventDefault();
        fd = new FormData(this);
        var btnSaveText = $('#btnSave').text();
        if(btnSaveText=='Save')
        {
            $('.message').html("Record Insert");
            $.ajax({
            url: '{{ route('cnamemasterstore') }}',
            method : 'post',
            data: fd,
            processData: false,
            contentType: false,
            success:function(response){
                //console.log(response);
                if(response.status==200){
                    $('.message').html(response.rowmessage);
                    $('#frmComponentNameMaster')[0].reset();
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
                        url: '{{ route('cnamemasterupdate') }}',
                        method : 'post',
                        data: fd,
                        processData: false,
                        contentType: false,
                        success:function(response){
                            //console.log(response);
                            if(response.status==200){
                                $('.message').html(response.rowmessage);
                                $('#frmComponentNameMaster')[0].reset();
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
    function editData(status,key,cNameId){
        $('.message').html('Click Update button after changes');
        //console.log(cNameId);
        $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('cnamemasteredit')}}',
            method :'post',
            data: {
                cNameId: cNameId
            },
            success:function(response){
                //console.log(response);
                $('#btnSave').text('Update');
                if(status==1){
                    $('#rowId').val(response.cNameId);
                    $('#cName').val(response.cName);
                    $('#calcCode').val(response.calcCode);
                   // $('#cTypeId').val(response.cTypeId);
                    $('#cTypeId').val(response.cTypeId).trigger('change');


                    topFunction();

                }
                else{
                    //alert('view');
                     $('#viewRecordLabel').html("Branch Code:-"+ response.cName);
              $('#viewRecord').modal('show');
              var view = "Division Id :" + response.cNameId  + "<br> Component Name :-" + response.cName +"<br> Component Calculation Name :-" + response.calcCode ;
              $('#viewContent').html(view);
                }

        }
        });

    }
    function deleteData(status,key,cNameId){
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
                    url:'{{route('cnamemasterdelete')  }}',
                    method :'post',
                    data: {
                        cNameId: cNameId
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
