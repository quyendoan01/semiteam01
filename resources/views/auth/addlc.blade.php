@extends('layouts.appad')

@section('content')

    <div class="container-fluid">
        <div class="add_account">
            <div class="container-fluid">

                <form method="POST"
                    action="@if (isset($cuss)) {{ route('cus_edit_auth') }}
                @else
                {{ route('add_cus_auth') }} @endif"
                    enctype="multipart/form-data">

                    @if (session('success'))
                        <div class="form-group">
                            <br>
                            <span class="alert alert-success" style="float:right">
                                <strong>{{ session('success') }}</strong>
                            </span>
                            <br><br>
                        </div>
                    @endif
                    @if (session('danger'))
                        <div class="form-group">
                            <br>
                            <span class="alert alert-danger" style="float:right">
                                <strong>{{ session('danger') }}</strong>
                            </span>
                            <br><br>
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                         @if (isset($cuss))
                            <input type="hidden" name="id" value="  {{ $cuss->id }}">
                        @endif
                        <label for="exampleFormControlInput1">Name</label>
                        <input name="cus_name" type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Full Name " required
                            value="@if (isset($cuss)) {{ $cuss->cus_name }} @endif">

                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email </label>
                        <input name="cus_email" type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="example@exam.ple" required
                            value="@if (isset($cuss)) {{ $cuss->cus_email }} @endif">

                    </div>
                   
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Address</label>
                        <input name="cus_address" type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="" required
                            value="@if (isset($cuss)) {{ $cuss->cus_address }} @endif">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Phone</label>
                        <input name="cus_phone" type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Enter your phone number" required
                            value="@if (isset($cuss)) {{ $cuss->cus_phone }} @endif">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">
                            @if (isset($cuss))
                                Update Account
                            @else
                                Add New Account
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
