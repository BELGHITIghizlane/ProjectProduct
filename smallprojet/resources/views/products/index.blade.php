
@extends('layout.master')
@section('name')
<body>
    <div class="col s12">
        <h1 class="text-center" style="color: rgb(0, 162, 255)">Product List</h1>
        <div class="d-flex justify-content-end ">
             <a href="{{route('create') }}" class="btn btn-primary ">Create</a>

        </div>
        {{-- <table class="table table-bordered border-primary"> --}}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>category</th>
                    <th>action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($products as $prouduct)
                    <tr>
                        <td>{{ $prouduct->id }}</td>
                        <td>{{ $prouduct->name }}</td>
                        <td>{{ $prouduct->description }}</td>
                        <td>{{ $prouduct->quantity }}</td>
                        <td><img width="100px" src="{{asset($prouduct->image) }}" alt=""> </td>
                        <td>{{ $prouduct->price }}DH</td>
                        <td>{{ $prouduct->category?->name }}</td>

                        <td class="d-flex align-items-center justify-content-center">
                            <a href="{{ route('edit-product', $prouduct->id) }}" class="btn btn-primary">modifier</a>
                            <form method="post" action="{{ route('delete', $prouduct->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                        </td>
                    </tr>
                @empty

                    <td colspan="6" class="align-center">
                        <h6>no products</h6>
                    </td>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection
