<link rel="stylesheet" href="{{ asset("css/Parts.css/Articles.css")}}">

<div class="articles" id="articles">
    <h2 class="main-title">Articles</h2>
    <div class="container">
        @foreach($Offres as $Offre)
            <div class="box">
                @foreach ($Images as $key => $Image)
                @if ($Offre->id === $Image->id_offer)
                    <div class="img-holder">
                        <img src="{{ asset($Image->path) }}" alt="">
                    </div>
                    @break
                @endif
            @endforeach
                <div class="content">
                    <div class="fav">
                            <h3>{{$Offre->Category}}</h3>
                        <i class='bx bx-heart' onclick="changeHeartColor(this)"></i>
                    </div>
                    <p>{{ \Illuminate\Support\Str::limit($Offre->Descreption, 80) }}</p>
                    <h4>{{$Offre->Price}} DH</h4>
                    <button class="btn btn-primary w-100 mt-2" {{ $etat }} >Add To Cart</button>
                </div>
                <div class="info">
                    <a href="{{ route("Offres.show", $Offre->id) }}" >Read More</a>
                    <i class="bx bx-right-arrow-alt"></i>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="spikes"></div>
