<x-backend.layouts.master>
    <x-slot:title>
      Portfolio Page
   </x-slot>
   <a href="{{ route('portfolio.index') }}">list</a>
   <div class="container mt-5">
       <div class="row justifay-content-center">
           <div class="col-lg-6">
               <div class="card">
                <div class="card-header">Portfolio Details</div>
                   <div class="card-body">
                    <div>
                      <label for=""><h5>Portfolio Name:</h5></label>
                      <p>{{ $portfolio->name }}</p>
                    </div>
                    <div>
                      <label for=""><h5>Portfolio Description:</h5></label>
                      <p>{{$portfolio->description}}</p>
                    </div>
                    <div>
                      <label for=""><h5>Portfolio Image:</h5></label>
                      <p><img src="{{ asset('storage/portfolios/'.$portfolio->image) }}" width="100px" height="110px" alt=""></p>
                    </div>
                      
                       
                   </div>
               </div>
               
           </div>
       </div>
   </div>
  </x-backend.layouts.master>