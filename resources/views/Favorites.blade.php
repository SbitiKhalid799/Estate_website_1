@extends("Layout",["title"=>"Favorites Page"])

@section("body")

<link rel="stylesheet" href="{{ asset('css/Favorites.css')}}">

    <?php
        $content = "
            <span href='#' class='logo'>real_estate</span>
            <div class='main-nav'>
                <a href='#''>Home</a>
                <span id='favorite-counter' class='btn border'>
                    <i class='bx bxs-heart text-primary'></i>
                    <span class='badge text-black'>0</span>
                </span>
                <form action='{{ route('Login')}}' method='GET'>
                    <button class='btn btn-light btn-header'>Log out</button>
                </form>
            </div> 
        ";

    ?>

    <header>
        @include("Parts.Header",["content"=>$content])
    </header>

    <main>
        <div>
            @include("Parts.Landing")
        </div>
        <div class="Favoris" id="articles">
            <h2 class="main-title">Favorites</h2>
            <div class="container">
                @for($i=0;$i < 6;$i++)
                    <div class="box">
                        <div class="border-fav">
                            <i class='bx bxs-bookmark'></i>
                            <img src="/images/houses/house_1.jpg">
                        </div>
                        <div class="content">
                            <div class="fav">
                                <h3>Test Title</h3>
                                <i class='bx bx-x'></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit</p>
                            <button class="btn btn-primary w-100 mt-2">Add To Cart</button>
                        </div>
                        <div class="info">
                            <a href="">Read More</a>
                            <i class="bx bx-right-arrow-alt"></i>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </main>

@endsection