<?php $title = "Edit Products"; ?> 
@extends('../admin/layouts/index')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      </div>
      <div class="row md-1">
        <div class="col-sm-10 ">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Product </h3>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <ol class="float-sm-right">
            <a href="{{ url('product')}}" class="btn btn-flat btn-custom btn1"><i class="fa fa-bars"></i>&nbsp;Product List</a>
          </ol>
        </div>
        <div class="col-sm-8">
          <form id="formid" method="post" action="{{action('admin\ProductController@update', $id)}}">
              @csrf @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="code">Product No*</label>
                <input type="text" class="form-control" value="{{ $product['product_no'] }}"  disabled title="Product No">
                </div>
                {{-- <div class="form-group">
                  <label class="form-check-label" for="hsn_code"><b>Hsn Code*</b></label>
                  <select class="form-control select2" name="hsn_code" id="hsn_code" style="width:100%;" required>
                      <option value="" selected="selected">Select Code</option> --}}
                    {{-- @foreach($hsnes as $hsn){
                      <option value="{{ $hsn['id'] }}" >{{ $hsn['hsn_code'] }}</option>
                      }
                      @endforeach --}}
                      <div class="form-group">
                        <label class="form-check-label" for="hsn_code"><b>Hsn Code *</b></label>
                        <select class="form-control select2" name="hsn_code" id="hsn_code" style="width: 100%;" required>
                            <?php
                            foreach($hsns as $shsn){
                              if($shsn['id'] == $product->hsn_id){
                              ?>
                              <option value="{{$shsn['id'] }}" selected="selected">{{ $shsn['hsn_code'] }}</option> 
                              <?php
                              } 
                                } 
                                ?>
                                <?php
                              foreach($hsns as $shsn){
                              if($shsn['id'] != $product->hsn_id){
                              ?>
                              <option value="{{$shsn['id'] }}" selected="selected">{{ $shsn['hsn_code'] }}</option> 
                              <?php
                              } 
                                } 
                            ?>
                            </select>
                      </div>
                    {{-- </select>
                </div> --}}
                <div class="form-group">
                    <label for="Client Name">Product Name*</label>
                    <input type="text" class="form-control"  value="{{ $product['product_name'] }}"   id="product_name" title="Product Name" name="name" placeholder="Enter Product Name" required>
                      </div>
                <div class="form-group">
                  <label for="mrp">MRP*</label>
                  <input type="text" class="form-control" id="mrp"  value="{{ $product['mrp'] }}"  title="MRP" name="mrp" placeholder="Enter MRP" required>
                    </div>
                    <div class="form-group">
                      <label for="intimate">Intimate Count*</label>
                      <input type="text" class="form-control"  value="{{ $product['target'] }}"  id="intimate" title="Intimate Count" name="target" placeholder="Enter Intimate Count" required>
                        </div>
                    <div class="form-group">
                        <label for="invoice_price">Invoice Price*</label>
                        <input type="text" class="form-control"  value="{{ $product['invoice_price'] }}"  id="invoice_price" title="Invoice Price" name="invoice_price" placeholder="Enter Invoice Price" required>
                          </div>
                <div class="card-footer">
                  <button type="submit" id="add_client" class="btn btn-primary">Edit Product</button>
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
<script src="{{asset('website/plugins/select2/select2.full.min.js')}}"></script>
<script>
  $(document).ready(function () { 
          $(function () {
            $('.select2').select2()
        });
    });

</script>
@endpush