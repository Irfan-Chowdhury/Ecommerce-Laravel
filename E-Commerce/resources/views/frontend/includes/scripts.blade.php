<script src="{{ asset('js/jquery-2.1.1.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/alertify.min.js"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jstree.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/template.js') }}" type="text/javascript" ></script>
<script src="{{ asset('js/common.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/global.js') }}" type="text/javascript"></script>
<script src="{{ asset('owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/parally.js')}}"></script> 
<script>
    $('.parallax').parally({offset: -40});
</script>

<script type="text\javascript">
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>


<script>
    function addToCart(product_id)
    {
      //alert(product_id);
      // $.post( "http://localhost:8080/Shikbo_Shobai/Laravel_Onlinestore/public/api/carts/store", { product_id:product_id })
      $.post( "http://localhost:8000/products/api/carts/store", { product_id:product_id })
        .done(function( data ) {
          data = JSON.parase(data);
          if (data.status == 'success') 
          {
            alertfy.set('notifier','position','top-center');  
            alertfy.success('Item added to the Cart, you can chekout the product.Total Items:'+.data.totalItems+'<br>');
            $("#totalItems").html(data.totalItems);  
          }
        });
    } 
</script>
             {{-- alert( "Data Loaded: " + data ); --}}
