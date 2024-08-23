@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="veg-header" style="padding: 20px 0px 20px 0px">My Cart</h1>
                </div>

                <div class="col-md-12 d-flex justify-content-center">
                    <table class="table text-center" style="width: 90%; font-size: 20px;">
                        <tr>
                            <th colspan="2" style="width: 20%">Product</th>
                            <th >Price(RM)</th>
                            <th>Quantity(kg)</th>
                            <th style="width: 20%">Anction</th>
                        </tr>
                        @foreach ($listings as $item)
                            <tr>
                                <td style="width: 10%; text-align: right">
                                    <img src="{{$item->image}}" alt="{{$item->p_name}}" style="width: 60%">
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
                                        <button class="btn" name="minus" onclick="minus()">-</button>
                                        <span id="quantity">{{$item->mass/1000}}</span>
                                        <button class="btn" name="plus" onclick="plus()">+</button>
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
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

