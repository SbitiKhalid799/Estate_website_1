@extends("Layout",["title"=>"Details Page"])

@section("body")

<link rel="stylesheet" href="{{ asset('css/Details.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <main class="main-details">
        <div class="container">
            <div class="box">
                <div class="images">
                @foreach ($Images as $key => $Image)
                    <div  class="img-holder {{ $key === 0 ? 'active' : '' }}">
                        <img src="{{ asset($Image->path) }}" alt="">
                    </div>
                @endforeach
                </div>
                <div class="basic-info">
                    <div class="d-flex">
                        <h1>{{$Offre->Category}}/</h1>
                        <h1 class="{{$Offre->Type_Offre === 'Purchase' ? 'text text-primary' :'text text-secondary' }}">
                            {{$Offre->Type_Offre}}
                            @if($Offre->Type_Offre === 'Purchase')
                            <i class="fas fa-shopping-cart"></i>
                            @else
                            <i class="fas fa-key"></i>
                            @endif
                        </h1>
                    </div>
                        <span>{{$Offre->Location}} / {{$Offre->Price}} DH</span>
                    <div class="options">
                        <a href="#">Buy It Now</a>
                        <a href="#">Add to Cart</a>
                    </div>
                </div>
                <div class="description">
                    <p style="max-width: 400px; word-wrap: break-word;">{{$Offre->Descreption}}</p>
                    <div style="width:100%">
                        <a class="btn btn-primary" href="javascript:history.back()">Back</a>
                    </div>
                </div>

            </div>

    </main>

@endsection
