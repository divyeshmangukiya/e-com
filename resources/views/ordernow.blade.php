@extends('master')
@section('content')


<div class="container custom-product">
  <div class="col-sm-6">
    <table class="table table-striped">

      <tbody>
        <tr>
          <td>Price</td>
          <td>{{$total}} Amount</td>
        </tr>
        <tr>
          <td>Tax</td>
          <td>Ruppes</td>
        </tr>
        <tr>
          <td>Delhivery</td>
          <td>100</td>
        </tr>
        <tr>
          <td>Total Amount</td>
          <td>{{$total+100}}</td>
        </tr>
      </tbody>
    </table>

    <hr>
    <form class="form-inline" method="post" action="orderplace">
      @csrf
      <textarea placeholder="Enter your Adress" id="w3review" name="address" rows="4" cols="50"></textarea>

      <br>
      <div class="form-group">
        <label for="">Payment method</label>
        <p> <input type="radio" value="cash"  name="payment"><span> Online Payment</span></p>
        <p><input type="radio"  value="cash" name="payment"><span> EMI Payment</span></p>
        <p> <input type="radio"  value="cash" name="payment"><span> Payment ON DELHVERY</span></p>
      </div>
      <hr>
      <button type="submit" class="btn btn-default">Order Now</button>
    </form>

  </div>
</div>
@endsection