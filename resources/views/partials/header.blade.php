<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('gift.index') }}"><img
                    src="https://www.pngplay.com/wp-content/uploads/5/Christmas-Santa-Claus-No-Background-PNG.png"
                    alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <form action="{{ route('gift.index') }}" method="GET">
                        <button class="bg-light btn-gift text-btn" type="submit">Gifts List</button>
                        <input type="hidden" value="XxBabboNatalexX" name="psw">
                    </form>
                    <button class="ms-2 bg-light text-btn"><a class="text-decoration-none text-btn" href="{{ route('gift.create') }}">New Gift <i class="fa-solid fa-plus"></i></a></button>
                <div class="text-black ">
                    <form action="{{route('gift.index')}}" method="GET">

                    <label class="mt-2 ms-3 my-label" for="search">Bambini: </label>
                    <select class="rounded-3 btn btn-danger ms-2" name="search" id="search">
                        <option value="tutti">Tutti</option>
                        <option value="buoni">Buoni</option>
                        <option value="cattivi">Cattivi</option>

                    </select>
                     <input type="hidden" value="XxBabboNatalexX" name="psw">
                        <button type="submit" class="btn btn-danger ms-2 rounded-3">Cerca</button>
                    </form>

                </div>
            </div>
        </div>
    </nav>
</header>
