@extends('layout')

@section('content')

        <style>
            .login-container {
                background-color: #ffffff;
                padding: 200px 20px 200px 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                max-width: 100%;
                width: 100%;
                text-align: center
            }
            .login-container h2 {
                margin-bottom: 20px;
                font-size: 30px;
                text-align: center;
            }

            .gender-container{
                display: flex;
            }
            
            .login-container select,
            .login-container input[type="text"], 
            .login-container input[type="phone"] 
            {
                width: 50%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            .login-container button {
                width: 50%;
                padding: 10px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }
            .login-container button:hover {
                background-color: #0056b3;
            }
        </style>
    <body>
        <div class="login-container">
            <h2>Add Address</h2>
            <form action="{{route('informationListing')}}" method="POST">
                @csrf

                <input type="text" name="address_line_1" placeholder="Address Line 1">
                @error('address1')
                    <p style="color: red">{{$message}}</p>
                @enderror
                <input type="text" name="address_line_2" placeholder="Address Line 2">
                @error('address2')
                    <p style="color: red">{{$message}}</p>
                @enderror
                <input type="text" name="city" placeholder="City">
                @error('city')
                    <p style="color: red">{{$message}}</p>
                @enderror
                <input type="text" name="state" placeholder="State">
                @error('state')
                    <p style="color: red">{{$message}}</p>
                @enderror
                <input type="text" name="p_code" placeholder="Post Code">
                @error('p_code')
                    <p style="color: red">{{$message}}</p>
                @enderror
                <button type="submit" name="address">Add Address</button><br><br>
            </form>
        </div>
    </body>
    </html>


@endsection