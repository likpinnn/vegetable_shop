@extends('layout')
@section('content')
<div class="container">
    <div class="contact_section_2">
       <div class="row">
        <div class="col-md-6">
            <img src="{{asset($listing->image)}}" alt="">
         </div>
          <div class="col-md-6">
             <div class="mail_section_1">
                <h1 style="font-size: 60px">{{$listing->p_name}}</h1>
                <h1>RM {{$listing->price}} (per KG)</h1>
                
                <br>

                <div class="d-flex">
                    <input type="number" class="mail_text" placeholder="Quantity(kg)" name="quantity" value="1" style="width: 200px; text-align:center">
                    <label style="margin-left: 10px">KG</label>
                </div>
                
                <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                <div class="send_bt"><a href="#">SEND</a></div>
             </div>
          </div>
       </div>
    </div>
 </div>
</div>
@endsection