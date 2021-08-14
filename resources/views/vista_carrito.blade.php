@extends('app')
<script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=MXN" data-sdk-integration-source="button-factory"></script>
<script>
  function initPayPalButton() {
    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'blue',
        layout: 'vertical',
        label: 'buynow',

      },

      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{"description":"Ps4","amount":{"currency_code":"MXN","value":9282.68,"breakdown":{"item_total":{"currency_code":"MXN","value":7998},"shipping":{"currency_code":"MXN","value":5},"tax_total":{"currency_code":"MXN","value":1279.68}}}}]
        });
      },

      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          alert('Transaction completed by ' + details.payer.name.given_name + '!');
        });
      },

      onError: function(err) {
        console.log(err);
      }
    }).render('#paypal-button-container');
  }
  initPayPalButton();
</script>

@section('content')

<div class="container">
    <div class="row">
       <div class="col-sm-3 bg-light">
           @if (count(Cart::getContent()))
               <a href="{{route('cart.checkout')}}"> VER CARRITO <span class="badge badge-danger">{{count(Cart::getContent())}}</span></a>
           @endif

       </div>
       <div class="col-sm-9">
            <div class="row  justify-content-center">
                @forelse ($productos as $item)
                <div class="col-4 border p-5 mt-5 text-center">
					<img width="170" height="140" src="images/{{$item->foto}}">
                    <h1>{{$item->name}}</h1>
                    <P>$ {{$item->price}}</P>
                    {{-- <div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div> --}}

    <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="KPV7LZFWFA45A">
<input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>

                     {{-- <form action="{{route('cart.add')}}" method="post">
                        @csrf
                        <input type="hidden" name="producto_id" value="{{$item->id}}">
                        <input type="submit" name="btn"  class="btn btn-success" value="AÑADIR AL CARRITO">
                    </form> --}}
                </div>
            @empty

            @endforelse
            </div>
       </div>
    </div>
</div>
