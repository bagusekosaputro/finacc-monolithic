@extends('layout.default')
@section('content')
<!-- Registration section -->
<section class="page-info-section">
    <div class="container">
        <h2>Sign In</h2>
        <div class="site-beradcamb">
            <a href="">Home</a>
            <span><i class="fa fa-angle-right"></i> Sign In</span>
        </div>
    </div>
</section>
<!-- Registration section end -->

<!-- About section -->
<section class="about-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-6 about-text">
                <form method="POST" action="/login">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        Create an <a href="{{url('register')}}">account</a>
                        <button type="submit" class="btn btn-primary pull-right">Sign In</button>
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