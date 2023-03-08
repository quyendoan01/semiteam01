@extends('layouts.appad')

@section('content')

    <div class="container-fluid">
        <div class="mng_staff">
            <a href="{{ url('add_product') }}"> <button style="" type="button"
                    class="add_staff btn btn-secondary">Add Product</button>
            </a>
        </div>
        <table class="acc_table table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Investment</th>
                    <th scope="col">Inventory</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col">1</th>
                    <td scope="col">pro1</td>
                    <td scope="col">1$</td>
                    <td scope="col">10</td>
                    <td scope="col">source1</td>
                    <td scope="col"><button type="button" class="btn btn-primary" style="margin:0">Edit</button>
                        <button type="button" class="btn btn-danger" style="margin:0">Delete</button>
                    </td>
                </tr>
                <tr>
                    <th scope="col">2</th>
                    <td scope="col">pro2</td>
                    <td scope="col">2$</td>
                    <td scope="col">20</td>
                    <td scope="col">source2</td>
                    <td scope="col"><button type="button" class="btn btn-primary" style="margin:0">Edit</button>
                        <button type="button" class="btn btn-danger" style="margin:0">Delete</button>
                    </td>
                </tr>
                <tr>
                    <th scope="col">3</th>
                    <td scope="col">pro3</td>
                    <td scope="col">3$</td>
                    <td scope="col">30</td>
                    <td scope="col">source3</td>
                    <td scope="col"><button type="button" class="btn btn-primary" style="margin:0">Edit</button>
                        <button type="button" class="btn btn-danger" style="margin:0">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
