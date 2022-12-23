@extends('layouts.app')
<!-- @section('page-title', 'Comic Form') -->

@section('content')

    <div class="container-fluid create_container">



        <section id="createForm" class="d-flex justify-content-center align-items-center">
            <form action="{{ route('gift.store') }}" method="POST"
                class="d-flex flex-column justify-content-around align-items-center text-black create_container">
                @csrf



                <div class="form-field d-flex flex-column align-items-center">
                    <label for="name">Name</label>
                    <input type="text" name="name" maxlength="10000" id="name"
                        class="@error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <!-- <div class="valid-feedback">
                                    Looks good!
                                </div> -->
                </div>

                <div class="form-field d-flex flex-column align-items-center">
                    <label for="surname">Surname</label>
                    <input type="text" name="surname" id="surname" class="@error('surname') is-invalid @enderror">
                    @error('surname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-field d-flex flex-column align-items-center">
                    <label for="imgGift">imageURL</label>
                    <input type="text" name="imgGift" id="imgGift" class="@error('imgGift') is-invalid @enderror">
                    @error('imgGift')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-field d-flex flex-column align-items-center">
                    <label for="description">Description</label>
                    <input type="description" name="description" id="description"
                        class="@error('description') is-invalid @enderror">
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-field d-flex flex-column align-items-center">
                    <label for="nameGift">Name Gift</label>
                    <input type="text" name="nameGift" id="nameGift" class="@error('nameGift') is-invalid @enderror">
                    @error('nameGift')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <select name="kidGood" id="kidGood"
                    class="form-field d-flex flex-column align-items-center @error('kidGood') is-invalid @enderror">
                    <option value="1">&#128519;</option>
                    <option value="0">&#128520;<i class="fa-solid fa-layer-group"></i></option>
                </select>
                @error('kidGood')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <input type="submit" value="Invia" class="btn btn-primary mt-3">
            </form>
        </section>

    </div>
@endsection
