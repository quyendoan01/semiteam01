@extends('layouts.appad')

@section('content')



<body>
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="test123">
                            <img  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            
                            <div class="file btn btn-lg btn-primary" style="background-position: center; width: 275px; height: 55px; background-color: gray; " >
                                
                                <input type="file" name="file" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                    
                   
        <div class="user_inf_place">
            <table class="table table-striped" style="width: 1040px;">
                @if(session()->has('currentuser'))
                <tr>
                    <th colspan="3" class="titletb">Your Information</th>
                </tr>
                <tr>
                    <th class="headtb">Your UserName</th>
                    <td>{{Auth::user()->user_name}}</td>
                    <td>change</td>
                </tr>
                <tr>
                    <th class="headtb">Your Name</th>
                    <td>{{Auth::user()->user_full_name}}</td>
                    <td>change</td>
                </tr>
                <tr>
                    <th class="headtb">Your Email</th>
                    <td>{{Auth::user()->user_email}}</td>
                    <td>change</td>
                </tr>
                <tr>
                    <th class="headtb">Your Role</th>
                    <td>{{Auth::user()->role}}</td>
                    <td>change</td>
                </tr>
                
                    
                @endif
                <tbody>
                            @if (isset($listuser))
                                @foreach ($listuser as $video)
                                    <tr>
                                        
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
                    </div>
                </div>
            </form>           
        </div>
        @endsection     