@php
    use App\Http\Controllers\frontend\FrontendController;

@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('ui/frontend/image_portfoilo/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <section class="portfolio overflow-hidden">
        <div class="container">
            <div class="row">
                <!-- Portfolio Section Heading -->
                <div class="portfolio__heading text-center col-12">
                    <h1 class="portfolio__title fw-bold mb-5">Our Portfolio</h1>
                </div>
                <!-- Portfolio Navigation Buttons List -->
                <div class="col-12">
                    <ul class="portfolio__nav nav justify-content-center mb-4">
                        <li class="nav-item">
                            <button class="portfolio__nav__btn position-relative bg-transparent border-0 active" data-filter="*">All</button>
                        </li>
                        <li class="nav-item">
                            <button class="portfolio__nav__btn position-relative bg-transparent border-0" data-filter=".vehicle">Vehicle</button>
                        </li>
                        <li class="nav-item">
                            <button class="portfolio__nav__btn position-relative bg-transparent border-0" data-filter=".animal">Animal</button>
                        </li>
                        <li class="nav-item">
                            <button class="portfolio__nav__btn position-relative bg-transparent border-0" data-filter=".work-station">Work Station</button>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Portfolio Cards Container -->
            <div class="row grid">
                @php
                    $vehicles = FrontendController::image('Vehicle')
                @endphp
                @foreach ($vehicles as $vehicle )
                <div class="grid-item col-lg-4 col-sm-6 vehicle">
                    <a href="#!" class="portfolio__card position-relative d-inline-block w-100">
                        <img src="{{ asset('storage/portfolios/'.$vehicle->image) }}" alt="Random Image" class="w-100">
                    </a>
                </div>
                @endforeach
                @php
                    $animels = FrontendController::image('Animal')
                @endphp

                @foreach ($animels as $animal)
                <div class="grid-item col-lg-4 col-sm-6 animal">
                    <a href="#!" class="portfolio__card position-relative d-inline-block w-100">
                        <img src="{{ asset('storage/portfolios/'.$animal->image) }}" alt="Random Image" class="w-100">
                    </a>
                </div>
                @endforeach
                @php
                    $workstations = FrontendController::image('Work Station')
                @endphp

                @foreach ($workstations as $workstation)
                <div class="grid-item col-lg-4 col-sm-6 work-station">
                    <a href="#!" class="portfolio__card position-relative d-inline-block w-100">
                        <img src="{{ asset('storage/portfolios/'.$workstation->image) }}" alt="Random Image" class="w-100">
                    </a>
                </div>
                @endforeach
                
               
                
            </div>
        </div>
    </section>
    
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script src="{{ asset('ui/frontend/image_portfoilo/js/script.js') }}"></script>

</html>