@extends('layouts.app')

@section('content')
    <!-- <section id="gifts">
            <div class="row">

            </div>
        </section> -->
    @foreach ($gifts as $gift)
        <h1>{{ $gift->name }}</h1>
        @if ($gift->kidGood == 1)
            <h2>{{ $gift->nameGift }}</h2>
            <img src="{{ $gift->imgGift }}" alt="">
        @elseif ($gift->kidGood == 0)
            <h2>Carbone</h2>
            <img src="https://www.vitantica.net/wp-content/uploads/2017/11/carbone.jpg" alt="">
        @endif
    @endforeach
@endsection
