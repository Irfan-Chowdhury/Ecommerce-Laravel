<script src="{{ asset('js/jquery-2.1.1.min.js') }}" type="text/javascript"></script>
<!-- Alertifyjs JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/alertify.min.js"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jstree.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/template.js') }}" type="text/javascript" ></script>
<script src="{{ asset('js/common.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/global.js') }}" type="text/javascript"></script>
<script src="{{ asset('owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/parally.js') }}"></script> 
<script>
  $('.parallax').parally({offset: -40});
</script>

<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  function addToCart(product_id){
    
    $.post( "http://localhost/Shikbe_Shobai/E-Commerce/public/api/carts/store", 
      { 
        product_id: product_id 
      } )

      .done(function( data ) {
          data = JSON.parse(data);
          if ( data.status == 'success'){
            alertify.set('notifier','position', 'bottom-center');
          	alertify.success('Item added to the Cart, you can checkout the product. Total Items: ' + data.totalItems + '<br>');
                $("#totalItems").html(data.totalItems);
          }
    });
  }
</script>

    {{-- $.post( "http://localhost:8000/products/carts/store", { product_id:product_id }) --}}
    {{-- http://localhost/Shikbe_Shobai/E-Commerce/public/api/carts/store --}}