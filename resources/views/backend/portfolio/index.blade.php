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
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                <tbody>
                    @foreach ($categories as $category )
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->status }}</td>
                        <td>
                            <a href="{{ route('category.show',$category->id) }}" class="btn btn-sm btn-success">show</a>
                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-warning">edit</a>
                            <form style="display:inline" action="{{ route('category.delete',$category->id) }}" method="POST">
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