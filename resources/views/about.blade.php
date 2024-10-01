@extends('layout')

@section('content')


<div class="container-fluid">
    <div class="layout_border">
       <!-- about section start -->
       <div class="about_section layout_padding margin_bottom90">
          <div class="container">
             <div class="row">
                <div class="col-md-12">
                   <h1 class="about_taital">About</h1>
                   <table>
                     @foreach ($listings as $user)
                        <tr>
                            <th style="padding-right: 20px">Name:</th>
                            <td>{{$user->f_name}} {{$user->l_name}}</td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>{{$user->gender}}</td>
                        </tr> 
                        <tr>
                           <th>Phone:</th>
                           <td>{{$user->phone}}</td>
                        </tr>
                     @endforeach
                   </table>
                   
                   <table class="table table-bordered" style="width: 80%">
                     <tr>
                        <th style="width: 50%">Address</th>
                        <th style="width: 10%; text-align: center">Action</th>
                     </tr>
                     @foreach ($addresses as $address)
                         <tr>
                           <td>{{ $address->address_line_1}},{{$address->address_line_2}},{{$address->city}},{{$address->p_code}},{{$address->state}}</td>
                           <td style="text-align: center"><a href="{{route('del_address', $address->id)}}">Delete</a></td>
                         </tr>
                     @endforeach 
                   </table>
                </div>
                <div class="col-md-12 table-responsive-sm">
                  <h1 class="about_taital">Order List</h1>
                  <table class="table table-bordered">
                     <tr>
                        <th>Product Name</th>
                        <th>Quantity(kg)</th>
                        <th>Price(RM)</th>
                        <th>status</th>
                        <th>Action</th>
                     </tr>
                     @foreach ($cart as $item)
                         <tr>
                            <td>{{ $item->p_name }}</td>
                            <td>{{ $item->mass/1000 }}</td>
                            <td>{{ $item->total_price }}</td>
                            <td>{{ $item->status }}</td>
                            <form action="{{ route('cart.destroy', $item->newid) }}" method="post">
                              @csrf
                              @if ($item->status == 'pending')
                                 <td><button class="col-12 btn btn-success" type="submit" id="done" disabled>Done</button></td>
                              @else
                                 <td><button class="col-12 btn btn-success" type="submit" id="done">Done</button></td>
                              @endif
                            </form>
                            
                         </tr>
                     @endforeach
                  </table>
                </div>
             </div>
          </div>
       </div>
       <!-- about section end -->
       <!-- layout_border end -->
    </div>
 </div>
 
 @endsection

 @if (session()->has('error'))
     <script>
         alert("{{ session('error') }}");
     </script>
 @endif