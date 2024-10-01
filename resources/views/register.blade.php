@extends('layout2')
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
   .login-container input[type="email"],
   .login-container input[type="password"] {
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
        <h2>Register</h2>
        <form action="{{route('registerListing')}}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email">
            @error('email')
                <p style="color: red">{{$message}}</p>
            @enderror
            <input type="password" name="password" placeholder="Password">
            @error('password')
                <p style="color: red">{{$message}}</p>
            @enderror
            <input type="password" name="password_confirmation" placeholder="Confirm Password">
            <button type="submit">Register</button><br><br>
            <a href="{{route('login')}}" style="font-size:13px">Have Account? Login</a>
        </form>
    </div>
</body>

@endsection
