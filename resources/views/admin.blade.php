<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Vege Admin Dashboard</title>
</head>
<body>
    <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand text-white fs-4" href="#">Vege Admin Dashboard</a>
                        <button class="navbar-toggler navbar-toggler-right collapsed bg-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav fs-6">
                            <li class="nav-item">
                                <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#products">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#orders">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('logout')}}" class="nav-link text-white">Logout</a>          
                            </li>
                        </ul>
                    </div>
    </header>
    <main>
        <br><br><br>
        <div class="container mt-5">
            <h1 class="text-center mb-5">Welcome to Vege Admin Dashboard</h1>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body text-center ">
                            <h5 class="card-title">Total Products</h5>
                            <p class="card-text fs-2">{{count($items)}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Orders</h5>
                            <p class="card-text fs-2">{{count($carts)}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text fs-2">{{count($users)}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="products">
            <br><br><br>
            <div class="container mt-5">
                <h2 class="text-center mb-5">Products</h2>
                <table class="table table-striped text-center">
                    <tr>
                        <th style="width: 20%">image</th>
                        <th>Item Name</th>
                        <th>Mass(per Kg)</th>
                        <th>Price(RM)</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($items as $item)
                    <tr>
                        <td><img style="object-fit: cover; height: 100px; width: 50%;" src="{{$item->image}}" alt="{{ $item->p_name }}"></td>
                        <td>{{ $item->p_name }}</td>
                        <td>{{ $item->price_mass }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <a href="{{route('admin.del_item',$item->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    <form action="{{route('admin.add_item')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <tr>
                            <td><input type="file" class="form-control" name="image"></td>
                            <td><input type="text" class="form-control" name="p_name" placeholder="Item Name"></td>
                            <td><input type="text" class="form-control" name="price_mass" placeholder="Mass(per Kg)"></td>
                            <td><input type="text" class="form-control" name="price" placeholder="Price(RM)"></td>
                            <td><button type="submit" class="col-12 btn btn-primary">Add</button></td>
                        </tr>
                    </form>
                </table>
        </section>

        <section id="orders">
            <br><br><br>
            <div class="container mt-5 table-responsive-sm">
                <h2 class="text-center mb-5">Orders</h2>
                <table class="table table-striped text-center">
                    <tr>
                        <th>Trade Number</th>
                        <th>Image</th>
                        <th>Item Name</th>
                        <th>Mass(per g)</th>
                        <th>Price(RM)</th>
                        <th>Buyer</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($carts as $cart)
                    <tr>
                        <td>{{ $cart->trade_number }}</td>
                        <td><img style="object-fit: cover; height: 70px; width: 60%;" src="{{ $cart->image }}" alt="{{ $cart->p_name }}"></td>
                        <td>{{ $cart->p_name }}</td>
                        <td>{{ $cart->mass }}</td>
                        <td>{{ $cart->total_price }}</td>
                        <td>{{ $cart->f_name }} {{$cart->l_name }}</td>
                        <td>{{ $cart->city}}, {{ $cart->state }}</td>
                        <td>
                            <form action="{{route('admin.checkout', $cart->newid)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">Checkout</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>             
        </section>

        
    </main>
<br><br><br><br><br><br><br><br>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
