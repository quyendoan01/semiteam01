@extends('layouts.blank')

@section('content')

    <div class="container-fluid">
        <div class="add_account">
            <div class="container-fluid">

                <form method="POST"
                    action="@if (isset($videos)) {{ route('user_edit_auth') }}
                @else
                {{ route('add_acc_auth') }} @endif"
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
                        @if (isset($videos))
                            <input type="hidden" name="id" value="  {{ $videos->id }}">
                        @endif
                        <label for="exampleFormControlInput1">Full Name</label>
                        <input name="user_full_name" type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Full Name of new Staff" required
                            value="@if (isset($videos)) {{ $videos->user_full_name }} @endif">

                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input name="user_email" type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="example@exam.ple" required
                            value="@if (isset($videos)) {{ $videos->user_email }} @endif">

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">User Name</label>
                        <input name="user_name" type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="User Name of new Staff" required
                            value="@if (isset($videos)) {{ $videos->user_name }} @endif">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Role</label>
                        <br>
                        <select id="role" name="role">
                            <option value="treasurer">Treasurer</option>
                            <option value="stocker">Stocker</option>
                            <option value="manageracc">Manager Account</option>
                        </select>
                        <a class="add_new_role" href="#" style="text-decoration:none"><strong> + Add new role</strong></a>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="img">Select avatar image</label>
                        <br>
                        <input type="file" id="img" name="img" accept="image/*">
                    </div> --}}
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Re-Type Password</label>
                        <input name="confirm_password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">
                            @if (isset($videos))
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
