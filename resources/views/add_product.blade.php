@extends('layouts.blank')

@section('content')
    <!-- Navbar -->
    {{-- <div class="container-fluid">
        <div class="add_bill">
            <a href="{{ url('bill') }}"><button type="button" class="btn btn-secondary">Back to Home</button></a>
        </div>
    </div> --}}
    <div class="container-fluid">
        <div class="add_account">
            <div class="container-fluid">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">ID</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="ID of Product">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"> Name </label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Name of product">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1"> Price</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Price of product">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Investment</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Investment of product">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Quantity </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Quantity of product">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Detail </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Detail of product">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add
                            Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
