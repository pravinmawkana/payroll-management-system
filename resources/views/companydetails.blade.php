@extends('layout.main')
@push('title')
    <title>Company Details</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('page-name')
    Company  Master
@endsection
@section('main-content')

<h1>Company Details </h1> <h2 id="message"></h2>
<div class="table-responsive-md">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th>Company Id</th>
          <th>Company Name</th>
          <th>Pan No</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
</div>
<!-- Modal -->
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
@endsection

@section('script')
  <script type="text/javascript">

$(document).ready(function(){
        $(document).ajaxStart(function () {
            $("#loadingmessage").show();
        }).ajaxStop(function () {
            $("#loadingmessage").hide();
        });


    var $table = $('table').DataTable({
        serverSide:true,
        processing:true,
        ajax:"{{ route('companydetails.index') }}",
        columns:[
            {data: 'DT_RowIndex',name: 'DT_RowIndex'},
            {data: 'companyName',name: 'companyName'},
            {data: 'panNo',name: 'panNo'},
            {data: 'action',name: 'action'},
        ]
    });
});

function editData(status,key,id)
{
    //alert(id);
    $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $('#message').html('loding company');
    $.ajax({
          url: "{{ route('companyedit') }}",
          method: "post",
          datatype: "json",
          data :{
            key: key,
            id:id
          },success: function(response){
              $('#message').html('loaded company');
              $('#message').html(response.companyId);
            //console.log(response);
            //response = JSON.parse(response);
            if($.trim(status)=='1')
            {
              //alert($.trim(response));
              //response = JSON.parse(response);
              //alert(response.custBDate);
              $("#rowId").val(response.custId);
              $("#custSalution").val(response.custSalution);
              $("#companyName").val(response.companyName);
              $("#custAddress").val(response.custAddress);
              $("#custCity").val(response.custCity);
              $("#custTaluka").val(response.custTaluka);
              $("#custDist").val(response.custDistrict);
              $("#custEmail").val(response.custEmailId);
              $("#custMobileNo").val(response.custMobileNo);
              $("#custBDate").val(response.custBDate);
              $("#custPANCardNo").val(response.custPANCardNo);
              $("#custAadharNo").val(response.custAadharNo);
              $("#companyCode").val(response.companyCode);
              $("#pinCode").val(response.pinCode);
              $("#custState").val(response.custState);
              $("#custGSTNo").val(response.custGSTNo);
              $('#custType').val(response.custType).trigger('change');

              //$("#btnSave").val('Save Change');
              $("#btnSave").html('Save Change');
              $('.message').html("Click Save change After Editing");
              topFunction();
            }
            else
            {
              //response = JSON.parse(response);
              $('#viewRecordLabel').html(response.companyName);
              $('#viewRecord').modal('show');
              var viewcust = "Customer Code :" + response.companyCode +"<br> Customer Name :" + response.companyName +"<br> Address :-" + response.address1 + response.address1+ "<br> City :-"  + response.city+ "<br> State:- " + response.state + "<br> country:- " + response.country + "<br> Email:- " + response.emailId + "<br> Mobile:- " + response.contactNo1 + "<br> pf Registration No:- " + response.pfRegistrationNo + "<br> PAN No:- " + response.panNo + "<br> Website:-" +response.website;
              $('#viewContent').html(viewcust);
            }
          }
        });
}
</script>
@endsection
