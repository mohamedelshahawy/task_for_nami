@extends('users.layouts')
@section('content')
    <div class="container">
        {{-- <div class="container-fluid"> --}}

            
                <a class="btn btn-sm btn-outline-success  mt-5 mb-2" href="{{ route('users.create') }}"
                    class="btn btn-sm btn-outline-primary"> New user</a>
            
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Number</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_number }}</td>

                            <td>
                                <div style="display: block ruby;">

                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="btn btn-sm btn-outline-success">Edit</a>


                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        {{-- </div> --}}
    </div>

@endsection
