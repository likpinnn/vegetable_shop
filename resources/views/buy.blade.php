@extends('layout')
@section('content')
<div class="container">
    <div class="contact_section_2">
       <div class="row">
        <div class="col-md-6" style="margin-bottom: 50px">
            <img src="{{asset($listing->image)}}" alt="{{$listing->p_name}}">
         </div>
          <div class="col-md-6">
             <div class="mail_section_1">
                <h1 style="font-size: 60px">{{$listing->p_name}}</h1>
                
                <br>

               <form action="{{route('cart.store', $listing->id)}}" method="POST">
                  @csrf
                  <div class="d-flex">
                     <input type="number" onchange="calculateTotal(this.value)" class="mail_text" placeholder="Quantity(g)" name="mass" value="100" style="width: 200px; text-align:center" min="100">
                     <label style="margin-left: 10px; font-size: 20px">mass(g)</label>
                  </div>

                  <span class="col-md-12 d-flex" style="font-size: 20px; color: #009751; ">Total: RM <span id="total">0.00</span></span><br>              
                  
                  <input type="submit" name="add_to_cart" class="col-md-5 btn btn-primary" value="Add To Cart">  
               </form>

               @if (session()->has('success'))
                  <p style="color : green">*{{session('success')}}</p>
               @endif
                
             </div>
          </div>
       </div>
    </div>
 </div>
</div>
@endsection

<script>
    function calculateTotal(mass) {
        var price = {{$listing->price}};
        var multipe = price / 1000;
        var total = multipe * mass;
        document.getElementById("total").innerHTML = total.toFixed(2);
    }

    window.onload = function() {
        calculateTotal(100);
    };

</script>