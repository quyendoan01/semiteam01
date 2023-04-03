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
        <form method="POST" action="" enctype="multipart/form-data">
            <table class="table table-striped" style="width: 1040px;">
                @if(session()->has('currentuser'))
                <tr>
                    <th colspan="3" class="titletb">Your Information</th>
                </tr>
                <tr>
                    <input class="form-control" type="hidden" name="id" value="{{Auth::user()->id}}">
                    <input class="form-control" type="hidden" name="password" value="{{Auth::user()->password}}">
                    <th class="headtb">Your UserName</th>
                    <td><input class="form-control" type="text" name="user_name" value="{{Auth::user()->user_name}}"></td>
                    
                </tr>
                <tr>
                    <th class="headtb">Your Name</th>
                    <td><input class="form-control" type="text" name="user_full_name" value="{{Auth::user()->user_full_name}}"></td>
                    
                </tr>
                <tr>
                    <th class="headtb">Your Email</th>
                    <td><input class="form-control" type="text" name="user_email" value="{{Auth::user()->user_email}}"></td>
                   
                </tr>
                <tr>
                    <th class="headtb">Your Role</th>
                    <td><input class="form-control" type="text" name="role" value="{{Auth::user()->role}}"></td>
                    
                    
                </tr>
                
                    
                @endif
                
            </table>
        </form>
            
           
        </div>
    
                   
                    
                           
                        </div>
                    </div>
                </div>
            </form>           
        </div>
        
       
         <a class="" href="" style=""><button type="button"
                                             class="btn btn-primary" style="margin:auto; display:block" ><strong> 
                                Edit</strong></button></a>
                              
                            
                                @endsection                                 