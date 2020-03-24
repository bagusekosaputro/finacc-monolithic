@extends('layout.default')
@section('content')
<!-- Registration section -->
<section class="page-info-section">
    <div class="container">
        <h2>Registration</h2>
        <div class="site-beradcamb">
            <a href="">Home</a>
            <span><i class="fa fa-angle-right"></i> Registration</span>
        </div>
    </div>
</section>
<!-- Registration section end -->

<!-- About section -->
<section class="about-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-6 about-text">
                <form method="POST" action="/register">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                        @if ($errors->has('email'))
                            <span class="error">{{ $errors->first('email') }}</span>
                        @endif    
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                        @if ($errors->has('password'))
                            <span class="error">{{ $errors->first('password') }}</span>
                        @endif 
                    </div>
                    <div class="form-group">
                        Already have an <a href="{{url('login')}}">account</a>
                        <button type="submit" class="btn btn-primary pull-right">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="about-img">
            <img src="img/about-img.png" alt="">
        </div>
    </div>
</section>
<!-- About section end -->

@stop