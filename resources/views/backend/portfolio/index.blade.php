<x-backend.layouts.master>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            <x-slot:title>
                Portfolio List
            </x-slot>
        </div>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
            </div>   
        @endif
        <div class="card-body">
            <a href="{{ route('portfolio.create') }}" class="btn btn-sm btn-primary">create</a>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Ser</th>
                        <th>Name</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                <tbody>
                    @foreach ($portfolios as $portfolio )
                    <tr>
                        <td>{{ $portfolio->id }}</td>
                        <td>{{ $portfolio->name }}</td>
                        <td>{{ $portfolio->category_id }}</td>
                        <td>{{ $portfolio->description }}</td>
                        <td><img src="{{ asset('storage/portfolios/'.$portfolio->image) }}" width="100px" height="110px" alt=""></td>
                        <td>{{ $portfolio->status }}</td>
                        <td>
                            <a href="{{ route('portfolio.show',$portfolio->id) }}" class="btn btn-sm btn-success">show</a>
                            <a href="{{ route('portfolio.edit',$portfolio->id) }}" class="btn btn-sm btn-warning">edit</a>
                            <form style="display:inline" action="{{ route('portfolio.delete',$portfolio->id) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button onclick="alert('Are you sure?You want to delete this!')" type="submit" class="btn btn-sm btn-danger">delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
        </div>
    </div>

</x-backend.layouts.master>