@extends('layouts.appad')

@section('content')


    <div class="container-fluid">
        <div class="container-fluid">

            <div class="mng_staff">

                <a href="{{ url('addlc') }}"> <button style="" type="button"
                        class="add_cus btn btn-secondary">Add account</button>
                </a>
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
                                    
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
