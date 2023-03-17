<x-backend.layouts.master>
    <x-slot:title>
               Portfolio Page
            </x-slot>
            <a href="{{ route('portfolio.index') }}">list</a>
            <div class="container mt-5">
                <div class="row justifay-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header"><h3>Create a Portfolio</h3></div>
                            <div class="card-body">
                                <!-- <form action="./index.php" method="" > -->
                                <form  action="{{ route('portfolio.store') }}"  method="POST" enctype="multipart/form-data"  >

                                    @csrf
                                    
                                    <div class="mb-3">
                                        <label for="category_id">Select Category:</label>
                                        <select name="category_id" id="category_id" class="form-select">
                                            <option selected disabled value="">Select Category</option>
                                            @foreach ($categories as $category )
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror 
                                    </div>
                                    <div class="mb-3">
                                        <label for="name">Product Name:</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror 
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="description">Description:</label>
                                        <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    <div class="mb-3">
                                        <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                    
                                    <div class="mb-3">
                                        <input type="submit" class="form-control btn btn-primary" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
  </x-backend.layouts.master>