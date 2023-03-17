<x-backend.layouts.master>
    <x-slot:title>
        Category Page
     </x-slot>
     <a href="{{ route('category.index') }}">list</a>
     <div class="container mt-5">
         <div class="row justifay-content-center">
             <div class="col-lg-8">
                 <div class="card">
                     <div class="card-header"><h3>Edit Your Category</h3></div>
                     <div class="card-body">
                         <form  action="{{ route('category.update',$category->id) }}"  method="POST"  >
                            @csrf
                            @method('PATCH')
                             
                             <div class="mb-3">
                                 <label for="name">Category Name:</label>
                             <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
                             @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror  
                            </div>
                             
                             <div class="mb-3">
                                 <label for="description">Description:</label>
                                 <textarea name="description" id="description" class="form-control" rows="5">{{$category->description}}</textarea>
                                 @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror 
                                </div>
                             
                             <div class="mb-3">
                                 <input type="submit" name="submit"  class="form-control btn btn-primary" value="Update">
                             </div>
                         </form>
                     </div>
                 </div>
                 
             </div>
         </div>
     </div>
</x-backend.layouts.master>