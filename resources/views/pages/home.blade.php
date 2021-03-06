<x-app-layout>

    @section('pagina')
        Home
    @endsection

    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('{{ asset('images/uno1.jpeg') }}'); background-size: contain;">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4"></h2>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('{{ asset('images/dos2.jpeg') }}'); background-size: contain;">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4"></h2>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('{{ asset('images/tres3.jpeg') }}'); background-size: contain;">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4"></h2>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('{{ asset('images/cuatro4.jpeg') }}'); background-size: contain;">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4"></h2>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>

    <x-slot name="js">
    </x-slot>

</x-app-layout>
