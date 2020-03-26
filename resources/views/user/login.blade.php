@extends('layout.default')
@section('content')
<section class="hero-section">
	<div class="container">
		<div class="row">
			<div class="col-md-6 hero-text">
				<h2>Catat <span>Pengeluaranmu</span> <br>dengan mudah</h2>
                <h4>Aplikasi Web untuk mencatat pengeluaran harianmu</h4>
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
				<form class="hero-subscribe-from" method="POST" action="{{ url('login') }}">
                    {{ csrf_field() }}
                    <input type="email" name="email" placeholder="Enter your email">
                    @if ($errors->has('email'))
                        <span class="error">{{ $errors->first('email') }}</span>
                    @endif  
                    <input type="password" name="password" placeholder="Enter your password">
                    @if ($errors->has('password'))
                        <span class="error">{{ $errors->first('password') }}</span>
                    @endif
                    <br>
					<a href="{{url('register')}}">Daftar</a> <button class="site-btn sb-gradients pull-right">Masuk</button>
				</form>
			</div>
			<div class="col-md-6">
				<img src="img/laptop.png" class="laptop-image" alt="">
			</div>
		</div>
	</div>
</section>
@stop