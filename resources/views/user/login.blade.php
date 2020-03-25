@extends('layout.default')
@section('content')
<!-- Login section -->
<section class="hero-section">
	<div class="container">
		<div class="row">
			<div class="col-md-6 hero-text">
				<h2>Manage <span>Expense</span> <br>With ease</h2>
				<h4>Easily managed your daily expenses in one apps</h4>
				<form class="hero-subscribe-from" method="POST" action="{{ url('login') }}">
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
                        Create an <a href="{{url('register')}}">account</a>
                        <button type="submit" class="site-btn sb-gradients pull-right">Sign In</button>
                        <!-- <a href="{{url('reset')}}" class="pull-right">Forgot password</a> -->
                    </div>
				</form>
			</div>
			<div class="col-md-6">
				<img src="img/laptop.png" class="laptop-image" alt="">
			</div>
		</div>
	</div>
</section>
<!-- Login section end -->

@stop