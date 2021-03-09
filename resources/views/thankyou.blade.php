@extends('layout')

@section('title', 'Thank You')

@section('extra-css')

@endsection

@section('body-class', 'sticky-footer')

@section('content')

   <div class="thank-you-section">
       <h1>{{ __('general.thank_you_for_your_order') }}!</h1>
       <p>{{ __('general.a_confirmation_email_was_sent') }}</p>
       <div class="spacer"></div>
       <div>
           <a href="{{ route('landing-page') }}" class="button">{{ __('general.home_page') }}</a>
       </div>
   </div>




@endsection
