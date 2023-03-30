@extends('layouts.appad')

@section('content')
    <div class="container-fluid">
<<<<<<< HEAD


=======
>>>>>>> 839e539dfe8104bcd0bb12a3833c40f66de071b7

        <div class="container-fluid">
            <form action="{{ route('account.search') }}" method="GET">
                @csrf
                <div class="container-fluid">
                    <form action="{{ route('account.search') }}" method="GET">
                        @csrf
                        <div class="input-group" style="width: 300px; height: 40px; margin:16px 0px; display:flex">
                            <button class="input-group-text text-body" type="submit"><i class="fas fa-search"
                                    aria-hidden="true"></i></button>
                            <input name="search" type="text" class="form-control" placeholder="Type here...">

                        </div>
                    </form>

<<<<<<< HEAD
                </div>
            </form>

        </div>

        <a href="{{ url('account/add') }}"> <button style="" type="button" class="add_staff btn btn-secondary">Add
                account</button>
        </a>
        <a href="{{ url('auth/userinfo') }}"> <button style="" type="button" class="add_staff btn btn-secondary">My account</button>
        </a>

        <div class="container-fluid">
            <div class="container-fluid">

                <div class="mng_staff">


                    <br><br>
                    @if (session('success'))
                        <span class="alert alert-success" style="float:right; margin:2px">
                            <strong>{{ session('success') }}</strong>
                        </span>
                    @endif
                    @if (session('danger'))
                        <span class="alert alert-danger" style="float:right; margin:2px">
                            <strong>{{ session('danger') }}</strong>
                        </span>
                    @endif
                </div>
                <table class="acc_table table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($listuser))
                            @foreach ($listuser as $video)
                                <tr>
                                    <th scope="col">US{{ $video->id }}</th>
                                    <td scope="col">{{ $video->user_name }}</td>
                                    <td scope="col">{{ $video->user_full_name }}</td>
                                    <td scope="col">{{ $video->user_email }}</td>
                                    <td scope="col">{{ $video->role }}</td>
                                    <td scope="col">
                                        <a href="{{ route('user_edit', $video->id) }}"><button type="button"
                                                class="btn btn-primary" style="margin:2px">Edit</button></a>
                                        @if ($video->id != 1)
                                            <a href="{{ route('user_delete', $video->id) }}"><button type="button"
                                                    class="btn btn-danger" style="margin:2px">Delete</button></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

       
=======
            <a href="{{ url('account/add') }}"> <button style="" type="button"
                    class="add_staff btn btn-secondary">Add account</button>
            </a>


                    <div class="mng_staff">


                        <br>
                        @if (session('success'))
                            <span class="alert alert-success" style="float:right; margin:2px">
                                <strong>{{ session('success') }}</strong>
                            </span>
                        @endif
                        @if (session('danger'))
                            <span class="alert alert-danger" style="float:right; margin:2px">
                                <strong>{{ session('danger') }}</strong>
                            </span>
                        @endif
                    </div>
                    <table class="acc_table table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Fullname</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($listuser))
                                @foreach ($listuser as $video)
                                    <tr>
                                        <th scope="col">US{{ $video->id }}</th>
                                        <td scope="col">{{ $video->user_name }}</td>
                                        <td scope="col">{{ $video->user_full_name }}</td>
                                        <td scope="col">{{ $video->user_email }}</td>
                                        <td scope="col">{{ $video->role }}</td>
                                        <td scope="col">
                                            <a href="{{ route('user_edit', $video->id) }}"><button type="button"
                                                    class="btn btn-primary" style="margin:2px">Edit</button></a>
                                            @if ($video->id != 1)
                                                    <a href="{{ route('user_delete', $video->id) }}"><button type="button"
                                                        class="btn btn-danger" style="margin:2px">Delete</button></a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
        @endsection
>>>>>>> 839e539dfe8104bcd0bb12a3833c40f66de071b7
