<x-backend.layouts.master>
    <x-slot:title>
               Portfolio Page
            </x-slot>
            <a href="{{ route('portfolio.index') }}">list</a>
            <div class="container mt-5">
                <div class="row justifay-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header"><h3>Edit your Portfolio</h3></div>
                            <div class="card-body">
                                <!-- <form action="./index.php" method="" > -->
                                <form  action="{{ route('portfolio.update',$portfolio->id) }}"  method="POST" enctype="multipart/form-data"  >

                                    @csrf
                                    @method("PATCH")
                                    
                                    <div class="mb-3">
                                        <label for="name">Select Category:</label>
                                        <select name="category_id" id="category_id" class="form-select">
                                            <option selected disabled value="">Select Category</option>
                                            @foreach ($categories as $category )
                                            <option @selected($category->id == $portfolio->category_id) value="{{ $category->id }}">{{ $category->name }}</option>
                                                
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror 
                                    </div>
                                    <div class="mb-3">
                                        <label for="name">Portfolio Name:</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $portfolio->name }}">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror 
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="description">Description:</label>
                                        <textarea name="description" id="description" class="form-control" rows="5">{{ $portfolio->description }}</textarea>
                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    <div class="mb-3">
                                        <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <img src="{{ asset('storage/portfolios/'.$portfolio->image) }}" width="100px" height="110px" alt="">
                                    @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    
                                    <div class="mb-3">
                                        <input type="submit" class="form-control btn btn-primary" value="Update">
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
  </x-backend.layouts.master>