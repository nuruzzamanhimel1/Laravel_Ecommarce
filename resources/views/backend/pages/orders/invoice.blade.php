<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ public_path('css/bootstrap_min.css') }}">
    <link rel="stylesheet" href="{{ public_path('assets/css/invoicePdf.css') }}">
    <title>Invoice  #LE{{ $order->id }}</title>
  
  </head>
  <body>
    
    
    <div>
      <div class="invoice_header_section clearfix">
      <div class="header_left float-left">
        <img src="{{ public_path('images/logo.jpg') }}" alt="" class="img-fluid" width="150px">
      </div>
      <div class="header_right float-right">
        <h2>Laravel Ecommarce</h2>
        <p>31/1, Satikhira, Khulna, Bangladesh</p>
        <p>Phone: <span >01622819929</span></p>
        <p>Email: <span >nuruzzaman.himel147@gmail.com</span></p>
      </div> 
    </div>
    </div>
    <!------------- invoice_header_section ------------>
    
    <div class="invoice_section clearfix">
      <div class="invoice_left">
        <p class="mt-3 mb-0">Invoice To</p>
        <h1>{{ $order->name }}</h1>
        <p><Strong>Address: </Strong>{{ $order->shipping_address }}</p>
        <p><Strong>Phone: </Strong>{{ $order->phone_no }}</p>
        <p><Strong>Email: </Strong>{{ $order->email }}</p>
      </div>
      <div class="invoice_right">
        <h1>Invoice #LE{{ $order->id }}</h1>
        <p>{{ date('Y-m-d H:i:s',strtotime($order->updated_at)) }}</p>
      </div>
    </div>
  
    <!--- /invoice_section -------->
    <div class="product_table_section clearfix">
      <div class="row w-100">
        <div class="col-md-12 ">
          <div class="product_table_inner">
            <h1>Products:</h1>
            <table>
              <thead>
                <tr>
                  <th>NO</th>
                  <th>Product Name</th>
                  <th>Product Image</th>
                  <th>Quantity</th>
                  <th>Unite Price</th>
                  <th>Sub Total Price</th>
                </tr>
              </thead>
              <tbody>
                @php $totalprice = 0 @endphp
                @foreach($order->cards as $card)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $card->product->title }}</td>
                  <td>
                    Product Image
                  </td>
                  <td>
                    {{ $card->product_quantity }}
                  </td>
                  <td>{{ $card->product->price }}</td>
                  <td>
                    @php $totalprice += $card->product_quantity * $card->product->price @endphp
                    {{ $card->product_quantity * $card->product->price }}
                  </td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="4" style="border: 0px"></td>
                  <td><strong>Shipping Cost :</strong></td>
                  <td><strong>{{ $order->shipping_cost }}</strong></td>
                </tr>
                <tr>
                  <td colspan="4" style="border: 0px"></td>
                  <td><strong>Custom Discount  :</strong></td>
                  <td><strong>{{ $order->custom_discount }}</strong></td>
                </tr>
                <tr>
                  <td colspan="4" style="border: 0px"></td>
                  <td><strong>Total Amount  :</strong></td>
                  <td><strong>{{ $totalprice + $order->shipping_cost - $order->custom_discount }}</strong></td>
                </tr>
              </tbody>
            </table>
          </div>
          
        </div>
      </div>
      
    </div>

    <!-- product_table_section --------->
    <div class="invoice_thx_section clearfix">
      <div class="thx_left">
        <h5>Thank you for your Buisness !!</h5>
      </div>
      <div class="thx_right">
        <p>---------------------------------------------</p>
        <h5>Authority Signature</h5>
      </div>
    </div>
  </body>
</html>