@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="veg-header" style="padding: 20px 0px 20px 0px">My Cart</h1>
                </div>

                <div class="col-md-12 d-flex justify-content-center">
                    <table class="table text-center" style="width: 90%; font-size: 20px; margin-bottom: 300px">
                        <tr>
                            <th colspan="2" style="width: 20%">Product</th>
                            <th >Price(RM)</th>
                            <th>Quantity(kg)</th>
                            <th style="width: 20%">Anction</th>
                        </tr>
                        @if ($listings != "No item in cart")
                            @foreach ($listings as $item)
                                <tr>
                                    <td style="width: 10%; text-align: right">
                                        <a href="{{route('cart.edit',$item->newid)}}"><img src="{{$item->image}}" alt="{{$item->p_name}}" style="width: 60%"></a>
                                    </td>
                                    <td>
                                        {{ $item->p_name }}                                
                                    </td>
                                    <td>
                                        <span id="price">{{ $item->total_price }}</span>
                                    </td>
                                    <td>
                                        <form action="{{route('update', $item->newid)}}" method="post">
                                            @csrf
                                            <button class="btn" name="minus">-</button>
                                            <span id="quantity">{{$item->mass/1000}}</span>
                                            <button class="btn" name="plus">+</button>
                                        </form>                                   
                                    </td>
                                    <td>
                                        <form action="{{route('remove', $item->newid)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" value="remove" class="btn btn-danger">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <form action="{{route('checkout')}}" method="post">
                             @csrf    
                            <tr>
                                <td colspan="4" style="text-align: right">
                                   <label>To:</label>
                                   <select name="address" style="width: 39%;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; text-align: center;">
                                    @foreach ($addresses as $address)
                                        <option value="{{$address->id}}">
                                          {{$address->city }}, {{ $address->state }}
                                        </option>
                                    @endforeach
                                   </select>
                                </td> 
                                <td>
                                    <button type="button" class="btn btn-primary">Add Address</button>
                                </td>
                            </tr>

                            <tr>
                                <td id="total-price" colspan="4" style="text-align: right">
                                    Total Price: <span style="font-weight: bold;color: rgb(4, 170, 12);font-size: 25px;">RM{{$total}}</span>
                                    
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success" style="margin-left: 10px">Checkout</button>
                                </td>
                            </tr>
                            </form>
                        @endif
                        
                        @if ($listings == "No item in cart")  
                            <tr>
                                <td colspan="5" style="text-align: center">
                                    {{$listings}}
                                </td>
                            </tr>
                        @endif
                            
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

