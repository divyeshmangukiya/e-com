@extends('master')

@section('content')


<div class="container custom-product">

  <div class="row">
  <div class="col-sm-4">
    <a href="#">FILTER</a>
  </div>
  <DIV class="col-sm-4">
  <div class="treding-slider">
      <h1>Results Of Products</h1>
      <div class="carousel-inner">
        @foreach($products as $item)
        <div class="search-item">
          <a href="detail/{{$item['id']}}">

            <img class="trending-image" src="{{$item['gallery']}}" alt="New York">
            <div class="">
              <h3>{{$item['name']}}</h3>
              <h3>{{$item['description']}}</h3>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </DIV>
  </div>
  @endsection