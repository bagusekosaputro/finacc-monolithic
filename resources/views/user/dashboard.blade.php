@extends('layout.default')
@section('content')

Welcome {{ ucfirst(Auth()->user()->name) }}

@stop