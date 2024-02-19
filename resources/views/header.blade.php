<?php

use App\Http\Controllers\Productcontroller;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

$total = 0;

if (Session::has('user')) {
  // $total = Productcontroller::cartItem();
}

    $userId = Session::get('user')['id']??'1';
    $cartCount = \App\Models\Cart::where('user_id', $userId)->count();


// dd($cartCount);

?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">E-com </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home </a></li>
        <li><a href="#">Orders</a></li>

      </ul>
      <form action="/search" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" name="query" class="form-control search-box" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="/cartlist">Add TO Cart {{$cartCount}}</a></li>
        @if(Session::has('user'))
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> {{Session::get('user')['name']}}
            <span class="caret"></span></a>
          <ul class="dropdown-menu">

            <li><a href="/logout">logout</a></li>
            @else
            <li><a href="/login">Login</a></li>
            @endif
          </ul>
        </li>


      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>