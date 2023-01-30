@extends('layout.main')

@section('content')
  <div class="container-fluid mt-5">
    <h1 class="text-center">
      <a href="{{route('home')}}" class="text-decoration-none text-dark">
        Weather App
      </a>
    </h1>

    <form class="mt-4">
      <div class="row g-3 align-items-center justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
          <input 
          type="text" 
          name="city" 
          class="form-control search-text" 
          placeholder="City">
        </div>
      </div>

      <div class="row mt-1 g-3 align-items-center justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
          <button type="button" class="btn btn-primary search-button">
            Search
          </button>
        </div>
      </div>
    </form>

    <div class="row justify-content-center mt-3 text-center">
      <div class="col-12">
        <small>
          Suggested:

          @foreach($recommendedPlaces as $item)
            <a href="{{route('search', ['cityName' => $item])}}"
            class="text-decoration-none">
              {{$item}}
            </a>

            @if(!$loop->last)
              ,
            @endif
          @endforeach
        </small>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script type="text/javascript">
    let searchUrl = "{{route('search', ':cityName')}}";
  </script>
@endpush