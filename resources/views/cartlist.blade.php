@extends('master')
@section('content')


<div class="container custom-product">
  <div class="col-sm-10">
    <div class="treding-slider">
      <h1>Cart List</h1>
      <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br>

      @foreach($products as $item)
      <div class="row search-item">
        <div class="col-sm-3">
          <a href="detail/{{$item->id}}">
            <img class="trending-image" src="{{$item->gallery}}" alt="New York">
          </a>
        </div>
        <hr>
        <div class="col-sm-4">
          <div class="">

            <h3>{{$item->name}}</h3>
            <h3>{{$item->description}}</h3>
          </div>
        </div>
        <hr>

        <div class="col-sm-3">

          <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove From CarT</a>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</div>
@endsection