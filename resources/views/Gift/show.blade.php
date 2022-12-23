@extends('layouts.app')

@section('content')
    <div class="container-lg p-3"></div>
    <div class="my_card">
        <div class="left">
            @if ($gift->kidGood == 1)
                <img src="{{ $gift->imgGift }}" alt="">
            @elseif ($gift->kidGood == 0)
                <img src="https://www.vitantica.net/wp-content/uploads/2017/11/carbone.jpg"alt="">
            @endif

        </div>
        <div class="right">

            <h1 class="kid_name_show">{{ $gift->name }} {{ $gift->surname }}</h1>
            @if ($gift->kidGood == 1)
                <h2 class="kid_nameGift_show">{{ $gift->nameGift }}</h2>
                <p>{{ $gift->description }}</p>
            @elseif ($gift->kidGood == 0)
                <h2 class="kid_nameGift_show">Carbone</h2>
                <p>Del carbone perchè sei orribile</p>
            @endif


            <div class="butto">
                <button class="btn btn-primary"><a href="{{ route('gift.edit', $gift->id) }}">Modifica</a></button>
                <form action="{{ route('gift.destroy', $gift->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                      <input type="hidden" value="XxBabboNatalexX" name="psw" id="psw">

                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Cancella
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Sei sicuro di voler cancellare?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        Se lo cancelli, perderai i dati!
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annulla</button>

                        <button type="submit" class="  btn btn-danger">Cancella</button>
                        </div>
                    </div>
                    </div>
                </div>

                </form>
            </div>
        </div>

    </div>
    </div>

    </div>
@endsection
