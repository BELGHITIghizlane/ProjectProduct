
@extends('Categories.base')
@section('name')
<body>
    <div class="col s12">
        <h1 class="text-center" style="color: rgb(0, 162, 255)">CATEGOREY</h1>
        <div class="d-flex justify-content-end ">
             <a href="{{route('categories.create')}}" class="btn btn-primary ">Create</a>

        </div>
        {{-- <table class="table table-bordered border-primary"> --}}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($categores as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="d-flex align-items-center justify-content-center">
                            <a href="{{route('category-edit', $category->id) }}" class="btn btn-primary">modifier</a>
                            <form method="post" action="{{ route('delete-category', $category->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                        </td>
                    </tr>
                @empty
                <td colspan="6" align ="center">
                    <h6>no categoreis</h6>
                </td>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection
