@extends('layouts.app')

@section('content')
    <!-- <section id="gifts">
                                                                        <div class="row">

                                                                        </div>
                                                                    </section> -->

    <div class="img_bg">


        <div class="container-lg gifts_m py-5">
            <div class="row g-2">
                @foreach ($gifts as $gift)
                    <div class="col-lg-3 col-md-4 col-sm-6 my_col">
                        <div class="card h-100 shadow-lg" style="">
                            @if ($gift->kidGood == 1)
                                <div class="overflow-hidden immg">
                                    <img src="{{ $gift->imgGift }}" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title kid_name">{{ $gift->name }} {{ $gift->surname }}</h5>
                                    <p class="name_gift">{{ Str::limit($gift->nameGift, 20) }}</p>

                                    <a href="{{ route('gift.show', $gift->id) }}" class="btn btn-primary">Scopri di
                                        più!!</a>
                                </div>
                            @elseif ($gift->kidGood == 0)
                                <div class="overflow-hidden immg">
                                    <img class=""
                                        src="https://www.vitantica.net/wp-content/uploads/2017/11/carbone.jpg"alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title kid_name">{{ $gift->name }} {{ $gift->surname }}</h5>
                                    <p class="name_gift">Carbone</p>

                                    <a href="{{ route('gift.show', $gift->id) }}" class="btn btn-primary">Scopri di
                                        più!!</a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
