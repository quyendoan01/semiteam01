@extends('layouts.blank')

@section('content')
    <!-- Navbar -->
    <div class="container-fluid">
        <div class="add_bill">
            <a href="{{ route('product') }}"><button type="button" class="back_btn btn btn-secondary">Back</button></a>
        </div>
    </div>
    {{$product->id}}
@endsection
