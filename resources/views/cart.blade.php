<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
</head>
<style>
    body {
        background: #ddd;
        min-height: 100vh;
        vertical-align: middle;
        display: flex;
        font-family: sans-serif;
        font-size: 0.8rem;
        font-weight: bold;
    }

    .title {
        margin-bottom: 5vh;
    }

    .card {
        margin: auto;
        max-width: 950px;
        width: 90%;
        box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 1rem;
        border: transparent;
    }

    @media(max-width:767px) {
        .card {
            margin: 3vh auto;
        }
    }

    .cart {
        background-color: #fff;
        padding: 4vh 5vh;
        border-bottom-left-radius: 1rem;
        border-top-left-radius: 1rem;
    }

    @media(max-width:767px) {
        .cart {
            padding: 4vh;
            border-bottom-left-radius: unset;
            border-top-right-radius: 1rem;
        }
    }

    .summary {
        background-color: #ddd;
        border-top-right-radius: 1rem;
        border-bottom-right-radius: 1rem;
        padding: 4vh;
        color: rgb(65, 65, 65);
    }

    @media(max-width:767px) {
        .summary {
            border-top-right-radius: unset;
            border-bottom-left-radius: 1rem;
        }
    }

    .summary .col-2 {
        padding: 0;
    }

    .summary .col-10 {
        padding: 0;
    }

    .row {
        margin: 0;
    }

    .title b {
        font-size: 1.5rem;
    }

    .main {
        margin: 0;
        padding: 2vh 0;
        width: 100%;
    }

    .col-2,
    .col {
        padding: 0 1vh;
    }

    a {
        padding: 0 1vh;
    }

    .close {
        margin-left: auto;
        font-size: 0.7rem;
    }

    img {
        width: 3.5rem;
    }

    .back-to-shop {
        margin-top: 4.5rem;
    }

    h5 {
        margin-top: 4vh;
    }

    hr {
        margin-top: 1.25rem;
    }

    form {
        padding: 2vh 0;
    }

    select {
        border: 1px solid rgba(0, 0, 0, 0.137);
        padding: 1.5vh 1vh;
        margin-bottom: 4vh;
        outline: none;
        width: 100%;
        background-color: rgb(247, 247, 247);
    }

    input {
        border: 1px solid rgba(0, 0, 0, 0.137);
        padding: 1vh;
        margin-bottom: 4vh;
        outline: none;
        width: 100%;
        background-color: rgb(247, 247, 247);
    }

    input:focus::-webkit-input-placeholder {
        color: transparent;
    }

    .btn {
        background-color: #000;
        border-color: #000;
        color: white;
        width: 100%;
        font-size: 0.7rem;
        margin-top: 4vh;
        padding: 1vh;
        border-radius: 0;
    }

    .btn:focus {
        box-shadow: none;
        outline: none;
        box-shadow: none;
        color: white;
        -webkit-box-shadow: none;
        -webkit-user-select: none;
        transition: none;
    }

    .btn:hover {
        color: white;
    }

    a {
        color: black;
    }

    a:hover {
        color: black;
        text-decoration: none;
    }

    #code {
        background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
        background-repeat: no-repeat;
        background-position-x: 95%;
        background-position-y: center;
    }
</style>

<body>
    <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted">{{ count($cart) }} items</div>
                    </div>
                </div>
                @if (session('discount'))
                    <div class="alert alert-success">
                        Promo applied! You received a discount of Rp. {{ session('discount') }}.
                    </div>
                @endif
                @foreach ($cart as $id => $details)
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid"
                                    src="{{ asset('storage/dukpro/' . $details['image']) }}"></div>
                            <div class="col">
                                <div class="row text-muted">{{ $details['nama'] }}</div>
                            </div>
                            <div class="col">
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <a href="#" onclick="$(this).closest('form').submit()">-</a>
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}"
                                        min="1" class="border">
                                    <a href="#" onclick="$(this).closest('form').submit()">+</a>
                                </form>
                            </div>
                            <div class="col">Rp. {{ $details['harga'] * $details['quantity'] }}
                                <form action="{{ route('cart.remove') }}" method="POST" style="display:inline">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="close btn btn-link p-0 m-0">&times;</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="back-to-shop"><a href="{{ url('/dashboard-customer') }}">&leftarrow;</a><span class="text-muted">Back to
                        shop</span></div>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5><b>Summary</b></h5>
                </div>
                <hr>
                <div class="row">
                    <div class="col" style="padding-left:0;">ITEMS {{ count($cart) }}</div>
                    <div class="col text-right">Rp. {{ array_reduce($cart, function($carry, $item) { return $carry + $item['harga'] * $item['quantity']; }, 0) }}</div>
                </div>
                <form action="{{ route('cart.applyPromo') }}" method="POST">
                    @csrf
                    <div class="row">
                        @foreach ($promoPoints as $promo)
                        <div class="col-12 mb-2">
                            <div class="row">
                                <div class="col">{{ $promo['nama'] }} - {{ $promo['jumlah_point'] }} Poin</div>
                                <div class="col text-right">
                                    @if (session('claimed_promo_ids') && in_array($promo['id'], session('claimed_promo_ids')))
                                    <button type="button" class="btn btn-success btn-sm" disabled>Diklaim</button>
                                    @else
                                    <button type="submit" class="btn btn-primary btn-sm" name="promo_id" value="{{ $promo['id'] }}">Klaim</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <input type="hidden" name="total_price" value="{{ array_reduce($cart, function($carry, $item) { return $carry + $item['harga'] * $item['quantity']; }, 0) }}">
                </form>
            


                @if (session('status_claim') == 'true')
                <form action="{{ route('cart.applyPromoPoint') }}" method="POST">
                    @csrf
                    <div class="row">
                        <?php $point = auth()->user(); ?>
                      
                        <div class="col-12 mb-2">
                            <div class="row">
                                <div class="col">Point Anda - {{ $point->point }} Poin</div>
                                <div class="col text-right">
                                    <button type="button" class="btn btn-success btn-sm" disabled>Diklaim</button>
                                </div>
                            </div>
                        </div>
     
                    </div>
                    <input type="hidden" name="point_user" value="{{ $point->point }}">
                    <input type="hidden" name="total_price" value="{{ array_reduce($cart, function($carry, $item) { return $carry + $item['harga'] * $item['quantity']; }, 0) }}">
                </form>
                @else
                <form action="{{ route('cart.applyPromoPoint') }}" method="POST">
                    @csrf
                    <div class="row">
                        <?php $point = auth()->user(); ?>
                      
                        <div class="col-12 mb-2">
                            <div class="row">
                                <div class="col">Point Anda - {{ $point->point }} Poin</div>
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-primary btn-sm" name="promo_id" value="">Klaim</button>
                                </div>
                            </div>
                        </div>
     
                    </div>
                    <input type="hidden" name="point_user" value="{{ $point->point }}">
                    <input type="hidden" name="total_price" value="{{ array_reduce($cart, function($carry, $item) { return $carry + $item['harga'] * $item['quantity']; }, 0) }}">
                </form>
                @endif
             


                <hr>
            
                @if (session('total_discount'))
                <div class="row">
                    <div class="col" style="padding-left:0;">DISCOUNT POINT</div>
                    <div class="col text-right">-Rp. {{ session('total_discount') }}</div>
                </div>
                @endif

                @if (session('status_claim') == 'true')
                <div class="row">
                    <div class="col" style="padding-left:0;">DISCOUNT POINT KAMU</div>
                    <div class="col text-right">-Rp. {{ auth()->user()->point }}</div>
                </div>
               @endif
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">TOTAL PRICE</div>
                    <div class="col text-right">
                        Rp. {{ session('total_price_after_discount', array_reduce($cart, function($carry, $item) { return $carry + $item['harga'] * $item['quantity']; }, 0)) }}
                    </div>
                </div>
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">CHECKOUT</button>
                </form>
            </div>
            
        </div>
    </div>
</body>

</html>
