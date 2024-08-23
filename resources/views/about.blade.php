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
                        <tr>
                            <th>Name:</th>
                            <td>{{$listings->f_name}} {{$listings->l_name}}</td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>{{$listings->gender}}</td>
                        </tr>
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