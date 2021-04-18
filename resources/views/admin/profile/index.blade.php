@extends('layouts.dashboard_app')
@section('title')
    Profile | edit
@endsection
@section('dashboard_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ Route('home') }}">Home</a>
      <span class="breadcrumb-item active">Profile Edit</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Profile Edit</h5>
        <p>This is a starter page</p>
      </div><!-- sl-page-title -->
        <div class="container">
          <div class="row">
            <div class="col-lg-6">    
              <div class="card">
                  <div class="card-header card-header-default bg-info">
                      <h5>change Name</h5>
                    
                  </div>
                  <div class="card-body">
                    @if (session('name_change_status'))
                    <div class="alert alert-success">
                      {{ session('name_change_status') }}
                    </div>
                @endif
                       <form method="post" action="{{ route('profile.name.post') }}">
                          @csrf 
                           <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ Auth::user()->name }}">
                           </div>
                           <div class="form-group">
                              <button type="submit" class="btn btn-primary">change name</button>
                           </div>
                       </form>
                  </div>
              </div>
          </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header bg-info text-white">
                  <h5>Change Profile Photo</h5>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                 
                </div>
            @endif
            @if (session('profile_photo_status'))
            <div class="alert alert-success">
              {{ session('profile_photo_status') }}
            </div>
        @endif
                <div class="card-body">
                 <form method="post" action="{{ route('profile.photo.post') }}" enctype="multipart/form-data">
                   @csrf
                  <label><input type="file" name="profile_photo" onchange="readURL(this);"></label>
                  <img class="hidden" id="tenant_photo_viewer" src="#" alt="your image" height="75" width="75"/>
                  <style>
                    .hidden{
                      display: none;
                    }
                  </style>
    <script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#tenant_photo_viewer').attr('src', e.target.result).width(150).height(195);
        };
        $('#tenant_photo_viewer').removeClass('hidden');
        reader.readAsDataURL(input.files[0]);
      }
    }
    </script>
                  <br>
                  <button type="submit" class="mt-2 btn btn-primary dispay-block">Change</button>
                 </form>
                </div>
              </div>
            </div>
            <div class="col-lg-8 m-auto pt-5">
              <div class="card">
                  <div class="card-header bg-info text-white">
                    <h5>Change Name</h5>
                  </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </div>
                @endif
                    @if (session('password_change_status'))
                        <div class="alert alert-success">
                          {{ session('password_change_status') }}
                        </div>
                    @endif
                  <form method="post" action="{{ route('profile.password.post') }}">
                    @csrf
                  <div class="card-body">
                  <Label>Old Password</Label>
                  <input type="password" class="form-control" name="old_password" placeholder="Enter our old password">
                  <br>
                  <Label>New Password</Label>
                  <input type="password" class="form-control" name="password" placeholder="Enter your new password">
                  <br>
                  <Label>Confirem Password</Label>
                  <input type="password" class="form-control" name="password_confirmation" placeholder="Enter your confirmation password" id="passwordshow">
                  <br>
                  <input type="checkbox" onclick="myFunction()"> Show Password 
                  <br>
                  <button type="submit" class="btn btn-primary mt-3">Change Password</button>
                  </div>
                  <script>
                    function myFunction() {
                      var x = document.getElementById("passwordshow");
                      if (x.type === "password") {
                       x.type = "text";
                        } else {
                         x.type = "password";
                         }
                        } 
                  </script>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->
@endsection