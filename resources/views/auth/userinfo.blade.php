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
                    
                </tr>
                <tr>
                    <th class="headtb">Your Name</th>
                    <td>{{Auth::user()->user_full_name}}</td>
                    
                </tr>
                <tr>
                    <th class="headtb">Your Email</th>
                    <td>{{Auth::user()->user_email}}</td>
                   
                </tr>
                <tr>
                    <th class="headtb">Your Role</th>
                    <td>{{Auth::user()->role}}</td>
                    
                    
                </tr>
                
                    
                @endif
                
            </table>
            
           
        </div>
    
                   
                    
                           
                        </div>
                    </div>
                </div>
            </form>           
        </div>
        
        <div class="container-fluid">
            <div class="container-fluid">
                <table class="acc_table table table-striped">    
                    <tbody>
                         
                            
                           
                    </tbody>
                </table>
            </div>
         </div>

         <a class="" onclick="show_check()" href="#" style=""><button type="button"
                                             class="btn btn-primary" style="margin:auto; display:block" ><strong> 
                                Edit</strong></button></a>

         <div class="div_useredit" id="div_useredit" style="display:none">
            <form method="POST" action="{{ route('user.edit') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Enter your password</label>
                    <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password"
                                        style="width: 8cm;">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                </div>
                <div class="row mb-0">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-secondary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif

                                </div>
                            </div>
                
            </form>
        </div>
         <script>
        function show_check() {
          var x = document.getElementById("div_useredit");
          if (x.style.display == "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
        }

        </script>
    @endsection     