@extends('layouts.appad')

@section('content')



<body>
<div class="container emp-profile">
            
                <div class="row">
                    <div class="col-md-4">
                        <div class="test123">
                            <img  src="{{url('/')}}/UserAvatar/{{Auth::user()->user_avt}}" alt=""/>
                            
                           
                        </div>
                    </div>

                  
                    
                    <div class="row">
                    <br><br>   
                   
        <div class="user_inf_place">
        <form method="POST" action="{{ route('infor.edit') }}" enctype="multipart/form-data">
            @csrf
            <table class="table table-striped" style="width: 1040px;">
               
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
                    <td><input class="form-control" type="text" name="role" readonly value="{{Auth::user()->role}}"></td>
                    
                    
                </tr>
                <tr>
                    <th class="headtb">Change password</th>
                    <td><input class="form-control" type="password" name="password"  value="{{Auth::user()->password}}"></td>
                    
                    
                </tr>
                <tr>
                    <th class="headtb">Your Avatar</th>
                    <td><input class="form-control" type="file" name="user_avt" value="{{Auth::user()->user_avatar}}"></td>
                    
                    
                </tr>
                
             
                
            </table>
            <button type="submit"
                                             class="btn btn-primary" style="margin:auto; display:block" ><strong> 
                                Save</strong></button>
        </form>
            
           
        </div>
    
                   
                    
                           
                        </div>
                    </div>
                </div>
                     
        </div>
        
       
         
                              
                            
                                @endsection                                 