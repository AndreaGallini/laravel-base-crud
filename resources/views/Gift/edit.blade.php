@extends('layouts.app')

@section('content')
    <section id="createForm" class="d-flex edit flex-column justify-content-center align-items-center">
        <h1 class="text-center">You are Editing: <span class="edit-title">{{ $gift->name }} {{ $gift->surname }}'s gift</span></h1>
        <form action="{{ route('gift.update', $gift->id) }}" method="POST"
            class="d-flex flex-column justify-content-around align-items-center text-black">
            @csrf
            @method('PUT')


            <div class="form-field d-flex flex-column align-items-center">
                <label for="name">Name</label>
                <input type="text" name="name" maxlength="10000" id="name" class="@error('name') is-invalid @enderror"
                    value="{{ old('name', $gift->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-field d-flex flex-column align-items-center">
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname" value="{{ old('surname', $gift->surname) }}" class="@error('surname') is-invalid @enderror">
                @error('surname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-field d-flex flex-column align-items-center">
                <label for="imgGift">ImageURL</label>
                <input type="text" name="imgGift" id="imgGift" value="{{ old('imgGift', $gift->imgGift) }}" class="@error('imgGift') is-invalid @enderror">
                @error('imgGift')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            <div class="form-field d-flex flex-column align-items-center">
           <label for="description">Description</label>
                <input type="description" name="description" id="description" value="{{ old('description',$gift->description) }}">
            </div>

            <div class="form-field d-flex flex-column align-items-center text-black">
                <label for="nameGift">Name Gift</label>
                <input type="text" name="nameGift" id="nameGift" value="{{ old('nameGift', $gift->nameGift) }}">
            </div>

            <select name="kidGood" id="kidGood" class="mt-3" class="form-field d-flex flex-column align-items-center">
                <option value="1" {{old('kidGood', $gift->kidGood == '1' ? 'selected' : '')}}>&#128519;</option>
                <option value="0" {{old('kidGood', $gift->kidGood == '0' ? 'selected' : '')}}>&#128520;</option>
            </select>

            <input type="submit" value="Invia" class="btn btn-primary mt-3">
        </form>
        <a href="{{ route('gift.show', $gift->id) }}" class="btn btn-warning rounded-pill mt-3">CLOSE EDIT</a>
    </section>
@endsection
