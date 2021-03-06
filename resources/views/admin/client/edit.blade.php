<?php $title = "Edit Client"; ?> 
@extends('../admin/layouts/index')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) --> 
  <section class="content-header">
    <div class="container-fluid">
      </div>
      <div class="row md-1">
        <div class="col-sm-10 ">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Client </h3>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <ol class="float-sm-right">
            <a href="{{ url('client')}}" class="btn btn-flat btn-custom btn1"><i class="fa fa-bars"></i>&nbsp;Client List</a>
          </ol>
        </div>
        <div class="col-sm-8">
          <form id="formid" method="post" action="{{action('admin\ClientController@update', $id)}}">
              @csrf @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="code">Client No*</label>
              <input type="text" class="form-control" value="{{ $client['client_no'] }}"  disabled title="Client Name">
              </div>
              <div class="form-group">
                  <label for="Client Name">Client Name*</label>
                  <input type="text" class="form-control" value="{{ $client['name'] }}" id="Client_Name" title="Client Name" name="name" placeholder="Enter Client Name" required>
                    </div>
              <div class="form-group">
                <label for="Street">Street*</label>
                <input type="text" class="form-control" id="Street" value="{{ $client['street'] }}" title="Street" name="street" placeholder="Enter Street">
                  </div>
              <div class="form-group">
                  <label for="City">City*</label>
                  <input type="text" class="form-control" id="City" value="{{ $client['city'] }}" title="City" name="city" placeholder="Enter City" required>
                    </div>
                    <div class="form-group">
                      <label>Choose Category</label>
                      <select name="category" class="form-control select2" style="width: 100%;">
                        <option <?php if($product['category'] == "medical") { echo'selected="selected"';} ?> value="medical">Medical</option>
                        <option <?php if($product['category'] == "gt") { echo 'selected="selected"';} ?> value="gt">GT</option>
                      </select>
                    </div>
                <div class="form-group">
                    <label for="Tin">GST*</label>
                    <input type="text" class="form-control" id="Tin" value="{{ $client['tin'] }}"title="Street" name="tin" placeholder="Enter Tin" >
                      </div>
                  <div class="form-group">
                      <label for="Phone1">Phone1*</label>
                      <input type="text" class="form-control" id="Phone1" value="{{ $client['phone1'] }}"title="Phone1" name="phone1" placeholder="Enter Phone1" >
                        </div>
                  <div class="form-group">
                        <label for="Phone2">Phone2*</label>
                        <input type="text" class="form-control" id="Phone2"value="{{ $client['phone2'] }}" title="Phone2" name="phone2" placeholder="Enter Phone2" >
                  </div>
              <div class="card-footer">
                <button type="submit" id="add_client" class="btn btn-primary">Add Client</button>
              </div>
          </form>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop
@push("js")
{{-- <script>
$('#formid').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});
</script> --}}
@endpush