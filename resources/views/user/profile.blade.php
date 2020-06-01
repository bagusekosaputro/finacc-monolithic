@extends('layout.auth.default')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#profile">Profile</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#password">Password</a>
                    </li>
                </ul>
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                    </div>
                @elseif (session('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                <div class="card tab-content">
                    <div class="card-header card-header-primary">
                        
                    </div>
                    <div class="card-body tab-pane active" id="profile">
                        <form action="{{ url('profile/update/'.Auth::user()->id) }}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="text" value="{{ Auth::user()->email }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Full Name</label>
                                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="bmd-label-floating">Profile Image</label>
                                    <div class="custom-file">
                                        <input type="file" name="profile_image" accept="image/*" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                    
                                </div>
                                <div class="col-md-3">
                                <!-- <div class="form-group">
                                    <label class="bmd-label-floating">Country</label>
                                    <input type="text" class="form-control">
                                </div> -->
                                </div>
                                <div class="col-md-3">
                                    <!-- <div class="form-group">
                                        <label class="bmd-label-floating">Postal Code</label>
                                        <input type="text" class="form-control">
                                    </div> -->
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="cancel" class="btn btn-danger">Cancel</button>
                                    <span>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    <div class="card-body tab-pane fade" id="password">
                        <form action="{{ url('profile/change-password/'.Auth::user()->id) }}" method="POST">
                        @csrf
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Current Password</label>
                                        <input type="password" name="current_password" class="form-control">
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">New Password</label>
                                        <input type="password" name="new_password" class="form-control">
                                        @if ($errors->has('new_password'))
                                            <small class="form-text text-muted">{{ $errors->first('new_password') }}</small>
                                        @endif  
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                        @if ($errors->has('password_confirmation'))
                                            <small class="form-text text-muted">{{ $errors->first('password_confirmation') }}</small>
                                        @endif  
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="cancel" class="btn btn-danger">Cancel</button>
                                    <span>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@stop