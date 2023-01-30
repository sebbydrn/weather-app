@extends('layout.main')

@section('content')
  <div class="container-fluid mt-2">
    <h4 class="text-center">
      <a href="{{route('home')}}" class="text-decoration-none text-dark">
        Weather App
      </a>
    </h4>

    <form class="mt-2 mb-5">
      <div class="row g-3 align-items-center justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12">
          <input 
          type="text" 
          name="city" 
          class="form-control search-text" 
          placeholder="City"
          value="{{$cityName}}">
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

    <div class="row g-3 align-items-center justify-content-center mb-5">
      <div class="col-lg-6 col-md-8 col-sm-12">
        <div class="border border-primary-subtle rounded bg-primary bg-gradient 
        shadow text-white pt-3">
          <p class="text-center">{{$weatherNow['dateTime']}}</p>
          <p class="text-center fw-bold display-6">
            Weather in {{$cityName}}, Japan
          </p>
          <h1 class="text-center display-2 fw-bold">
            <img src="http://openweathermap.org/img/wn/{{$weatherNow['weatherIcon']}}@2x.png">
            <br>
            {{$weatherNow['temperature']}}&#176;C
          </h1>
          <p class="text-center fw-bold">{{$weatherNow['weather']}}</p>
          <p class="text-center lh-sm">
            High: {{$weatherNow['maxTemperature']}}&#176;
            Low: {{$weatherNow['minTemperature']}}&#176;
            <br>
            Humidity: {{$weatherNow['humidity']}}%
            <br>
            Wind Speed: {{$weatherNow['windSpeed']}} kph
          </p>
        </div>
      </div>
    </div>

    <h3 class="text-center mb-4">
      Weather in {{$cityName}} for the next 24 Hours
    </h3>

    <div class="row g-3 align-items-center justify-content-center mb-5">
      <div class="col-lg-6 col-md-8 col-sm-12">
        <div class="row g-3 align-items-center justify-content-center">
          @foreach($weatherHourly as $item)
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="border border-primary-subtle rounded bg-primary 
              bg-gradient bg-opacity-75 shadow text-white pt-2 pt-3">
                <p class="text-center">{{$item['dateTime']}}</p>
                <h4 class="text-center fw-bold">
                  <img src="http://openweathermap.org/img/wn/{{$item['weatherIcon']}}.png">
                  {{$item['temperature']}}&#176;C
                </h4>
                <p class="text-center fw-bold">{{$item['weather']}}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <h3 class="text-center mb-4">Nearby Places</h3>

    <div class="row g-3 align-items-center justify-content-center mb-5">
      <div class="col-lg-6 col-md-8 col-sm-12">
        <div class="row g-3 align-items-center justify-content-center">
          @foreach($nearByPlaces as $item)
            <div class="col-lg-8 col-md-8 col-sm-12">
              <div class="border border-light-subtle rounded bg-light 
              bg-gradient bg-opacity-75 shadow pt-2 p-3 pt-3">
                <img src="{{$item['photo_200']}}" class="mx-auto d-block">
                <p class="text-center mt-2">{{$item['name']}}</p>
                <p class="text-center lh-1">Address: {{$item['address']}}</p>
                <p class="text-center lh-1">
                  Distance: {{$item['distance']}} km
                </p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script type="text/javascript">
    let searchUrl = "{{route('search', ':cityName')}}";
  </script>
@endpush