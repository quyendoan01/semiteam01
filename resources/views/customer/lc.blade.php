@extends('layouts.appad')

@section('content')


    <div class="container-fluid">
        <div class="container-fluid">
            <div class="mng_staff">
                <div class="input-group" style="width: 300px; height: 32px; margin:4px 0px; display:inline-flex">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here...">
                </div>
                <div style="float:right;align-items: center;display:flex;margin: 4px 0px">
                <a href="{{ url('addlc') }}"> <button style="margin:auto" type="button"
                        class="add_cus btn btn-secondary">Add account</button>
                </a>
            </div>
            <br>
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
                        <th scope="col">Fullname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>

                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($listcustomer))
                        @foreach ($listcustomer as $cuss)
                            <tr>
                                <th scope="col">U{{ $cuss->id }}</th>
                                <td scope="col">{{ $cuss->cus_name }}</td>
                                <td scope="col">{{ $cuss->cus_email }}</td>
                                <td scope="col">{{ $cuss->cus_address }}</td>
                                <td scope="col">{{ $cuss->cus_phone }}</td>
                                <td scope="col">
                                <a href="{{ route('cus_edit', $cuss->id) }}"><button type="button"
                                            class="btn btn-primary" style="margin:2px">Edit</button></a>

                                        <a href="{{ route('cus_delete', $cuss->id) }}"><button type="button"
                                                class="btn btn-danger" style="margin:2px">Delete</button></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

