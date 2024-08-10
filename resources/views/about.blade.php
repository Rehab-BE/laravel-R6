@extends('layouts.main')
@section('content')

@include('includes.site-header')
           <main>
            @include('includes.team-section')
            @include('includes.testimonial-section')
           </main>
           @include('includes.model-fade')

@endsection
