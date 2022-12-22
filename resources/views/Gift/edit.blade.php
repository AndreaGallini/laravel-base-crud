@extends('layouts.app')

@section('content')
    <section id="createForm" class="d-flex edit justify-content-center align-items-center">
        <form action="{{ route('gift.update') }}" method="POST"
            class="d-flex flex-column justify-content-around align-items-center text-white">
            @csrf
            @method('PUT')


            <label for="name">Name</label>
            <input type="text" name="name" maxlength="10000" id="name" class="@error('name') is-invalid @enderror"
                value="{{ old('name', $gift->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="surname">Surname</label>
            <input type="text" name="surname" id="surname" value="{{ old('surname', $gift->surname) }}">

            <label for="imgGift">imageURL</label>
            <input type="text" name="imgGift" id="imgGift" value="{{ old('imgGift', $gift->imgGift) }}">

            <label for="nameGift">name Gift</label>
            <input type="text" name="nameGift" id="nameGift">

            <label for="kidGood">È stato bravo</label>
            <input type="checkbox" name="kidGood" id="kidGood">

            <!-- <label for="kidGood">kidGood</label>
                                        <input type="text" name="kidGood" id="kidGood"> -->

            <input type="submit" value="Invia" class="btn btn-primary mt-3">
        </form>
    </section>
@endsection
