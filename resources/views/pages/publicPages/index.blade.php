<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- fontawesome icon -->
    <script src="https://kit.fontawesome.com/73c690e49d.js" crossorigin="anonymous"></script>
    <!-- css file -->
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <title>Tugas WEB F</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">GALONKU</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @if (Auth::guest())
                        <li><a class="dropdown-item" href="/admin-view">Login</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 20px; display: block;">
        <!-- search -->
        <div class="search" action="" style="max-width: 500px; margin: auto">
            <input id="search-input" type="text" placeholder="Cari Produk">
            <button><i class="fa fa-search"></i></button>
        </div>
        <div>
            <h1>Produk Yang</h1>
            <div id="game-part" class="game-section">
                @foreach ($products as $product)
                    <div class="game-card">
                        <img class="center-cropped"
                            src="https://images.tokopedia.net/img/cache/500-square/product-1/2020/4/29/8421295/8421295_20a0b5b5-e819-4a8c-a099-3dfadc5ac393_1548_1548.jpg"
                            alt="game">
                        <div class="rating">
                            <i class="fa fa-star"></i> 4.7
                        </div>
                        <div class="game-detail">
                            <p class="title">{{ $product->product_name }}</p>
                            <p class="price" style="color: rgb(156, 156, 156); font-size: 10;">
                                @foreach ($product->categories as $category)
                                    {{ $category->category_name }},
                                @endforeach
                            </p>
                            <p class="price">Rp {{ $product->product_price }}</p>
                            <button id="id" class="btn game-buy">Buy</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close modal-close">&times;</span>
            <div id="game-modal-section">
                <!-- content modal -->
            </div>
        </div>
    </div>
</body>
<!-- script -->
<script src="{{ asset('public/js/script.js') }}"></script>
<script>
    $(document).ready(function() {
        $('body').on('click', '.game-buy', function() {
            var id = $(this).attr('id');
            var clearName = id.split('-').join(' ');
            var index = 0;
            var insertedDataModal = $('.checkout')
            for (let i = 0; i < games.length; i++) {
                if (clearName === games[i].name) {
                    index = i;
                }
            }
            $('#myModal').show()

            $("body").addClass("modal-open");
            if (insertedDataModal) {
                insertedDataModal.remove()
            }

            $('#game-modal-section').append(`
            <div class="checkout">
                <h1>Checkout</h1>
                <div class="summary-order">
                    <div class="order-detail">
                        <img class="col center-cropped" src="${games[index].thumbnail}" height="500" alt="${games[index]}-img">
                        <div class="order-price col">
                            <h1>${games[index].name}</h1>
                            <div class="flex" style="justify-content: space-between;">
                                <p>Price<br>VAT Included</p>
                                <p>$${games[index].price}</p>
                                </div>
                                <div class="flex" style="justify-content: space-between;">
                                    <p>Total</p>
                                    <p>$${games[index].price}</p>
                                    </div>
                                    </div>
                                    <div class="col" style="margin-bottom: 20px;">
                                        <div class="payment-method-wrapper">
                                            <div class="payment-method flex">
                                                <div class="payment-img">
                                                    <div class="payment-icon dana"></div>
                                                    </div>
                                                    Dana
                                                    </div>
                                                    <div class="payment-method flex">
                                                        <div class="payment-img">
                                                            <div class="payment-icon ovo"></div>
                                                            </div>
                                                            OVO
                            </div>
                            <div class="payment-method flex">
                                <div class="payment-img">
                                    <div class="payment-icon paypal"></div>
                                    </div>
                                    Paypal
                                    </div>
                                    <div class="payment-method flex">
                                        <div class="payment-img">
                                            <div class="payment-icon doku"></div>
                                            </div>
                                            Doku Wallet
                                            </div>
                                            </div>
                                            <button>Place Order</button>
                                            </div>
                                            </div>
                                            </div>
                                            </div>`)
        });
    });
</script>

</html>
