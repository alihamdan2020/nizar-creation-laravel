@extends('mainPage')

@section('title')
Index Page
@endsection

@section('content')

<div class="services" id="services">
    <div class="title">
        <h3 class="main-title">Services</h3>
    </div>
<div class="content-services">
@foreach ($allservices as $service)
    <div class="feature-card">
			<div class="feature-image" style="background-image:url('images/{{$service->serviceImage}}')"></div>
				<div class="feature-text">
					<h3 class="feature-title">{{$service->serviceName}}</h3>
					<p>{{substr($service->serviceDesc,0,50)}}...</p>
				</div>
				<div class="feature-footer">
	            <a href="{{route('services')}}#{{$service->id}}" class="one">more</a>
                </div>              
    </div>
@endforeach
</div>
</div>

<div class="services">
    <div class="title">
        <h3 class="main-title">Portfolio</h3>
    </div>
<div class="content-services">
@foreach ($allportfolio as $portfolio)
    
<a href="{{route('portfolio')}}#{{$portfolio->id}}">
    <div class='gallerycard'>
        <img src='images/{{$portfolio->portfolioImage}}' class='img'/>  
	</div>
</a>
@endforeach
</div>
</div>

@endsection

<style>
	.gallerycard {
    width: 300px;
    height: 300px;
    border: 15px solid rgb(25, 25, 25);
    margin-bottom: 50px;
    overflow: hidden;
    position: relative;
  }
  .img {
    width: 100%;
    transition: 0.5s;
  }
  
  .gallerycard img:hover {
    transform: rotate(5deg) scale(1.1);
  }
  
</style>