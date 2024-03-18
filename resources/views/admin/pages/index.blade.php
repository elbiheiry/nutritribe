@extends('admin.layouts.master')
@section('css')
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Float four columns side by side */
        .column {
            float: left;
            width: 33%;
            height: 150px;
            padding: 0 5px;
            padding-top: 10px;
        }

        .row {margin: 0 -5px;}

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive columns */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 10px;
            }
        }

        /* Style the counter cards */
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 16px;
            text-align: center;
            background-color: #0b0b0b;
            color: white;
        }

        p {
            color: #fece4e;
        }

        h3 {
            color: #fece4e;
        }
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="column">
            <div class="card">
                <h3>{{\App\Category::count()}}</h3>
                <p>Category</p>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <h3>{{\App\Product::count()}}</h3>
                <p>Product</p>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <h3>{{\App\Blog::count()}}</h3>
                <p>Blog</p>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <h3>{{\App\User::count()}}</h3>
                <p>User</p>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <h3>{{\App\Appointment::count()}}</h3>
                <p>Appointments</p>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <h3>{{\App\Order::count()}}</h3>
                <p>Orders</p>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-md-6">
                    <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTlyMItNip5jGXzEgR-RUoPiHY-UUptE3B5bsQ6XAzCGrYm04-slFjRyBN07d-njNx4mGHli_DdJb-x/pubchart?oid=1207011286&amp;format=interactive"></iframe>
                </div>
            
                <div class="col-md-6">
                    <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTlyMItNip5jGXzEgR-RUoPiHY-UUptE3B5bsQ6XAzCGrYm04-slFjRyBN07d-njNx4mGHli_DdJb-x/pubchart?oid=1332730981&amp;format=interactive"></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTlyMItNip5jGXzEgR-RUoPiHY-UUptE3B5bsQ6XAzCGrYm04-slFjRyBN07d-njNx4mGHli_DdJb-x/pubchart?oid=1985512820&amp;format=interactive"></iframe>
                </div>
                <div class="col-md-6">
                    <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTlyMItNip5jGXzEgR-RUoPiHY-UUptE3B5bsQ6XAzCGrYm04-slFjRyBN07d-njNx4mGHli_DdJb-x/pubchart?oid=774929540&amp;format=interactive"></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTlyMItNip5jGXzEgR-RUoPiHY-UUptE3B5bsQ6XAzCGrYm04-slFjRyBN07d-njNx4mGHli_DdJb-x/pubchart?oid=456861752&amp;format=interactive"></iframe>
                </div>
                <div class="col-md-6">
                    <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTlyMItNip5jGXzEgR-RUoPiHY-UUptE3B5bsQ6XAzCGrYm04-slFjRyBN07d-njNx4mGHli_DdJb-x/pubchart?oid=1740133465&amp;format=interactive"></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTlyMItNip5jGXzEgR-RUoPiHY-UUptE3B5bsQ6XAzCGrYm04-slFjRyBN07d-njNx4mGHli_DdJb-x/pubchart?oid=1172642940&amp;format=interactive"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection