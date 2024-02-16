@extends('master')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <img class="detail-img" src="{{$products['gallery']}}" alt="">
    </div>

    <div class="col-sm-6">
      <a class="" href="/">Go Back</a>

      <h1>Name :{{$products['name']}}</h1>
      <h4>Price :{{$products['price']}}</h4>
      <h4>category :{{$products['category']}}</h4>

      <h4>Description :{{$products['description']}}</h4>
      <br><br>
      <form action="/add_to_cart" method="post">
        <input type="hidden" name="product_id" value="{{$products['id']}}">
        @csrf
        <button class="btn btn-success">Add TO Cart</button>
      </form>
      <br><br>
      <button class="btn btn-primary">Buy Now</button>
      <br>
      <br>

    </div>
  </div>


</div>
@endsection