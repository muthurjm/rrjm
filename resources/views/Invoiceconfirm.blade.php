<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Invoices</title>
    <link rel="stylesheet" href="{{asset('website/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/main.css')}}">
    <link rel="stylesheet" href="{{asset('website/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> @stack('css')
    <style>
      textarea{
      height: 40px !important;
      }
      .submit-btn{
        display: inline-block;
    text-align: center;
    vertical-align: middle;
    white-space: nowrap;
    touch-action: manipulation;
    cursor: pointer;
    user-select: none;
    transition-duration: 300ms;
    transition-property: all;
    transition-timing-function: cubic-bezier(0.7, 1, 0.7, 1);
    text-transform: uppercase;
    border-width: 0.0625rem;
    border-style: solid;
    border-color: #13b1cd;
    color: #fff;
    background: #13b1cd;
    border-width: 0.0625rem;
    border-style: solid;
    padding: 15px;
    border-radius: 20px;
    width: 250px;
      }
      .submit-btn:hover {
    color: #13b1cd;
    background: #fff;
}
    </style>
</head>
<body> 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row md-1">
        <div class="col-sm-10 ">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Invoices RJM </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
        <div class="col-md-10">
            @if ($message = Session::get('success'))
            <div class="alert  alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <p>{{ $message }}</p>
            </div>
              @endif
              @if ($message = Session::get('error'))
              <div class="alert  alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p>{{ $message }}</p>
              </div>
                @endif
        </div>
          <form id="formid" method="post" action="{{url('/')}}">
            @csrf
            <div class="card-body">
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
              <div class="form-group">
                <label for="code">Bill No*</label>
              <input type="text" class="form-control" id="client_name" value="{{ $bill_no }}"  disabled title="Client Name">
              <input type="hidden" name="invoice_number" value="{{ $bill_no }}">
              </div>
                </div>
                <div class="col-md-5">
              <div class="form-group">
                  <label style="margin-top: 10px;" class="form-check-label" for="client_code"><b>Client Code*</b></label>
                    <select class="form-control select2" name="client_code" id="client_code" style="width:100%;" >
                      <option value="" selected="selected">Select Client Code</option>
                        @foreach($clients as $client){
                        <option value="{{ $client['id'] }}" >{{ $client['id'] }} - {{ $client['name'] }}</option>
                        }
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="col-md-5">
              <div class="form-group">
                <label for="street">Street*</label>
                <textarea  readonly class="form-control street  " id="street" title="Street" placeholder="Select Client" required></textarea>
                <textarea class="hide form-control street"  name="street"></textarea>
                  </div>
                </div>
                <div class="col-md-5">
              <div class="form-group">
                  <label for="city">City*</label>
                  <textarea  readonly class="form-control city" id="city" title="City"  placeholder="Select Client" required></textarea>
                  <textarea class="hide form-control city" name="city"></textarea>
                    </div>
                  </div>
                  <div class="col-md-5">
                <div class="form-group">
                    <label for="tin">Tin Number*</label>
                    <textarea readonly class="form-control tin" id="tin" title="Street" placeholder="Select Client" required></textarea>
                    <textarea class="hide form-control tin" name="tin"></textarea>
                      </div>
                    </div>
                    <div class="col-md-5">
                  <div class="form-group">
                      <label for="Phone">Phone Number*</label>
                      <textarea readonly class="form-control phone" id="phone" title="Phone" placeholder="Select Client" required></textarea>
                      <textarea class="hide form-control phone" name="phone"></textarea>
                        </div>
                      </div>
                      <hr>
            </div>
            <div class="row">
              <?php $i=1 ?>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label style="margin-top: 10px;" class="form-check-label" for="product_code{{ $i }}"><b>Product Code*</b></label>
                          <select class="form-control select2 product_code" data="{{ $i }}" id="product_code{{ $i }}" name="product_code[]" id="product_code" style="width:100%;">
                                  <option value="" selected="selected">Select Product</option>
                                    @foreach($products as $product){
                                    <option value="{{ $product['id'] }}" >{{ $product['id'] }} - {{ $product['product_name'] }}</option>
                                    }
                                    @endforeach
                                </select>
                            </div>
                          </div>
                          {{-- <div class="col-md-1">
                              <div class="form-group">
                                  <label for="hsn{{ $i }}">Hsn Code*</label>
                              <textarea readonly class="form-control hsn{{ $i }}" id="hsn{{ $i }}" title="Hsn Code" placeholder="Hsn" required></textarea>
                                  <textarea class="hide form-control hsn{{ $i }}" name="hsn[]"></textarea>
                                    </div>
                          </div>
                          <div class="col-md-1">
                              <div class="form-group">
                                  <label for="mrp{{ $i }}">MRP*</label>
                                  <textarea readonly class="form-control mrp{{ $i }}" id="mrp{{ $i }}" title="MRP"  placeholder="MRP"  required></textarea>
                                  <textarea class="hide form-control mrp{{ $i }}" name="mrp[]"></textarea>
                                    </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label for="product{{ $i }}">Product Name*</label>
                                  <textarea readonly class="form-control product{{ $i }}" id="product{{ $i }}" title="Product Name" placeholder="Select Product Name" required></textarea>
                                  <textarea class="hide form-control product{{ $i }}" name="product[]"></textarea>
                                    </div>
                          </div> --}}
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="quantity{{ $i }}">Quantity*</label>
                                  <input type="text" class="form-control quantity quantity{{ $i }}" id="quantity{{ $i }}" name="quantity[]" title="Quantity" >
                                    </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="price{{ $i }}">Price*</label>
                              <input type="text" class="form-control price price{{ $i }}" data="{{ $i }}" id="price{{ $i }}" title="Price" name="price[]">
                                    </div>
                          </div>
                          {{-- <div class="col-md-1">
                              <div class="form-group">
                                  <label for="tax{{ $i }}">GST*</label>
                                  <textarea readonly class="form-control tax{{ $i }}" id="tax{{ $i }}" title="GST"></textarea>
                                  <textarea class="hide form-control tax{{ $i }}" name="tax[]"></textarea>
                                    </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label for="amount{{ $i }}">Amount*</label>
                                  <textarea readonly class="form-control amount{{ $i }}" id="amount{{ $i }}" title="Amount"  required></textarea>
                                  <textarea class="hide form-control amount{{ $i }}" name="amount[]"></textarea>
                                    </div>
                          </div> --}}
                        <div class="col-md-1">
                            <button style="margin-top:37px;" class="btn btn-success success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                        </div>
                        <div class="csample increment"></div>
                          <br>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="card-footer">
                    <div class="text-center">
                    <button type="submit" id="submit_btn" class="submit-btn">Save Invoice</button>
                  </div>
                </div>
                </div>
            </div>
          </div>
          </form>
  </section>
</body>
<script src="{{asset('website/plugins/jquery/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
   
</script>
<script src="{{asset('website/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('website/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('website/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{asset('website/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('website/plugins/fastclick/fastclick.js')}}"></script>
<script src="{{asset('website/dist/js/adminlte.js')}}"></script>
<script src="{{asset('website/dist/js/demo.js')}}"></script>
<script src="{{asset('website/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>
    $(document).ready(function(){
      $(".success").click(function(){ 
        var i = 0;
        $(".increment").load("raw",{var:i})
        $(".csample").removeClass("increment");
          // var html = $(".clone").html();
          // $(".increment").after(html);
      });
    });
    </script>
<script>
  $(document).ready(function(){
        $('.select2').select2()
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });
      $("#client_code").change(function(){
          var id= $(this).val();
          $.ajax({
    url: "/invoice/ajax1/",
    type: "POST",
    data:{id:id},
    success: function (data) {
        test = JSON.stringify(data);
        if(test == "something is wrong"){
          alert(test);
          return false;
        }
        $( ".street" ).empty();
        $( ".city" ).empty();
        $( ".tin" ).empty();
        $( ".phone" ).empty();
        $(".street").append(data['street']);
        $(".city").append(data['city']);
        $(".tin").append(data['tin']);
        $(".phone").append(data['phone1']);
    },
})
    });
//     $(".product_code").change(function(){
//       alert("c");
//           var id= $(this).val();
//           var card= $(this).attr('data');
//           $.ajax({
//     url: "/invoice/ajax2/",
//     type: "POST",
//     data:{id:id},
//     success: function (data) {
//         test = JSON.stringify(data);
//         if(test == "something is wrong"){
//           alert(test);
//           return false;
//         }
//         $(".hsn"+card).empty();
//         $(".mrp"+card).empty();
//         $(".product"+card).empty();
//         $(".tax"+card).empty();
//         $(".hsn"+card).append(data['hsn']);
//         $(".tax"+card).append(data['tax']);
//         $(".mrp"+card).append(data['mrp']);
//         $(".product"+card).append(data['product_name']);
//     },
// })
//     });
//       $(".price").keyup(function(){
//           var id= $(this).attr('id');
//           var card= $(this).attr('data');
//           var quantity= $(".quantity"+card).val();
//           var price= $(".price"+card).val();
//           var amount = parseFloat(price * quantity);
//           $(".amount"+card).empty();
//           $(".amount"+card).append(amount);
//     });
    $("#submit_btn").click(function(e){
      e.preventDefault(); 
      if(!$('#street').val() || !$('#city').val() || !$('#phone').val()) {
                alert('Select Client');
                return false;
        }
      else if(!$('#product_code1').val()) {
                alert('Atleast One Product is required');
                return false;
        }
       else if(!$('#quantity1').val() || !$('#price1').val()) {
                alert('Enter Product details correctly');
                return false;
        }
        else{
          $('#formid').trigger('submit');
        }
    });
  });
</script>
</html>