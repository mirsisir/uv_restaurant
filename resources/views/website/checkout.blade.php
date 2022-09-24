@extends('layouts.base')
@section('title', 'Cart')

@section('content')

    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700');


        @media (min-width: 1200px) {
            .container {
                max-width: 1140px;
            }
        }

        .d-flex {
            display: flex;
            flex-direction: row;

        }

        .clr {
            background: #f6f6f6;
            border-radius: 0 0 5px 5px;
            padding: 25px;
            padding-bottom: 200px;
        }

        form {
            flex: 4;
        }

        .Yorder {
            flex: 2;
        }

        .title {
            background: -webkit-gradient(linear, left top, right bottom, color-stop(0, #5195A8), color-stop(100, #70EAFF));
            background: -moz-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);
            background: -ms-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);
            background: -o-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);
            background: linear-gradient(to bottom right, #5195A8 0%, #70EAFF 100%);
            border-radius: 5px 5px 0 0;
            padding: 20px;
            color: #f6f6f6;
        }

        .required {
            color: red;
        }

        label, table {
            display: block;
            margin: 15px;
        }

        label > span {
            float: left;
            width: 25%;
            margin-top: 12px;
            padding-right: 10px;
        }

        input[type="text"], input[type="tel"], input[type="email"], select {
            width: 70%;
            height: 30px;
            padding: 5px 10px;
            margin-bottom: 10px;
            border: 1px solid #dadada;
            color: #888;
        }

        select {
            width: 72%;
            height: 45px;
            padding: 5px 10px;
            margin-bottom: 10px;
        }

        .Yorder {
            margin-top: 15px;
            height: 600px;
            padding: 20px;
            border: 1px solid #dadada;
        }

        table {
            margin: 0;
            padding: 0;
        }

        th {
            border-bottom: 1px solid #dadada;
            padding: 10px 0;
        }

        tr > td:nth-child(1) {
            text-align: left;
            color: #2d2d2a;
        }

        tr > td:nth-child(2) {
            text-align: right;
            color: #52ad9c;
        }

        td {
            border-bottom: 1px solid #dadada;
            padding: 25px 25px 25px 0;
        }

        .Yorder > div {
            padding: 15px 0;
        }

        button {
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            border: none;
            border-radius: 30px;
            background: #52ad9c;
            color: #fff;
            font-size: 15px;
            font-weight: bold;
        }

        button:hover {
            cursor: pointer;
            background: #428a7d;
        }
        body{
            background-color: #0c5460;
        }
    </style>



       <div class="container mb-5" style="z-index: 5009; margin-top: 200px;">
           <div class="title">
               <h2>{{__('web.Product_Order_Form')}}</h2>
           </div>
           <div class="d-flex clr">
               <form action="{{route('place_order')}}" class="row" method="POST">
                   @csrf
                     <div class="col-8">
                <label>
                    <span class="fname">First Name <span class="required">*</span></span>
                    <input type="text" name="first_name" required>
                </label>
                <label>
                    <span class="lname">Last Name <span class="required">*</span></span>
                    <input type="text" name="last_name" required>
                </label>
                <label>
                    <span>Street Address <span class="required">*</span></span>
                    <input type="text" name="address" placeholder="House number and street name" required>
                </label>

                <label>
                    <span>Postcode / ZIP <span class="required">*</span></span>
                    <input type="text" name="city">
                </label>
                <label>
                    <span>Phone <span class="required">*</span></span>
                    <input type="tel"  name="phone">
                </label>
                <label>
                    <span>Email Address <span class="required">*</span></span>
                    <input type="email" name="city">
                    <input type="hidden" value="{{$total}}" name="total" id="total">
                </label>
            </div>
               <div class="Yorder col-sm-4">
                   <table>
                       <tr>
                           <td>Subtotal</td>
                           <td>{{$total}}</td>
                       </tr>
                       <tr>
                           <td>Shipping</td>
                           <td>Free shipping</td>
                       </tr>
                   </table>
                   <br>
                   <div>
                       <input type="radio" name="dbt" value="dbt" checked> Direct Bank Transfer
                   </div>
                   <p>
                       Make your payment directly into our bank account. Please use your Order ID as the payment reference.
                       Your order will not be shipped until the funds have cleared in our account.
                   </p>
                   <div>
                       <input type="radio" name="dbt" value="cd"> Cash on Delivery
                   </div>
                   <div>
                       <input type="radio" name="dbt" value="cd"> Paypal <span>


      <img src="https://www.logolynx.com/images/logolynx/c3/c36093ca9fb6c250f74d319550acac4d.jpeg" alt="" width="50">
      </span>
                   </div>
                   <button type="submit" class="mb-4">Place Order</button>
               </div><!-- Yorder -->
               </form>

           </div>
       </div>

    <br>
    <br>
    <br>
    <br>
    <br>


@endsection

@section('scripts')

@endsection
