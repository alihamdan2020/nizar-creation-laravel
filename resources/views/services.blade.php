@section('content')
<div class="services">
    <div class="title">
        <h3 class="main-title">Services</h3>
    </div>
<div class="content-services">
@foreach ($allservices as $service)
    <div class="feature-card">
			<div class="feature-image" style="background-image:url(images/<?php echo $service->serviceImage ?> )"></div>
				<div class="feature-text">
					<h3 class="feature-title">{{$service->serviceName}}</h3>
					<p>{{substr($service->serviceDesc,0,50)}}...</p>
				</div>
				<div class="feature-footer">
	            <a href="{{route('services')}}" class="one">more</a>
                </div>  
    </div>
@endforeach
</div>
</div>

<div class="services">
    <div class="title">
        <h3 class="main-title">POrtfolio</h3>
    </div>
<div class="content-services">
@foreach ($allportfolio as $portfolio)
    
<a href='#'>
    <div class='gallerycard'>
        <img src='images/$portfolio->portfolioImage' class='img'/>
	</div>
</a>
@endforeach
</div>
</div>

@endsection