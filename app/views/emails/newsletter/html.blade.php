<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<style>
		    html, body {
		        font: normal 14px/18px Arial, Helvetica, sans-serif;
		        color: #000;
		    }

		    h2 {
		        font-size: 20px;
		    }

		    h2 small {
		        color: #999999;
		    }

		    .images img {
		        clear: both;
		    }

		    .details, .images {
		        width: 100%;
		    }


		    div.dl-horizontal {
		        margin-top: 20px;
		        width: 100%;

		    }
		    div.dl-horizontal .title, div.dl-horizontal .value {
		        float: left;
		        padding: 5px 0;
		    }

		    div.dl-horizontal .title {
		        font-weight: bold;
		        width: 30%;
		    }
		    div.dl-horizontal .value {
		        font-weight: normal;
		        width: 50%;
		        padding-left: 5px;
		    }

		    .images .img-responsive {
		        max-width: 100%;
		        margin-bottom: 5px;
		    }

		</style>
	</head>
	<body style="background-color: #EFEFEF;">
	    <div style="width: 500px;border: 1px solid #CDCDCD; background-color: #FFF; margin: 40px auto; padding: 40px;">
	        <div style="display: inline-block; margin-left: 10px;position: relative;margin-top: -40px;vertical-align: top;width: 60px;background: #00C35E url('http://www.milkimclassiccars.nl/assets/build/img/icon-milkim-classic-cars.png') no-repeat center center;height: 50px;overflow: hidden;">
	            &nbsp;
	        </div>
            <h2 style="margin-top: 20px;">{{$subject}} <small>&euro; {{$car['price']}}</small></h2>
            <div class="details">
                <p>{{$catalog['description']}}</p>
                <a style="background: #00C35F; padding: 5px 10px; color: #FFF;" href="http://www.milkimclassiccars.nl/inventory/{{$catalog['id']}}/details" title="{{$catalog['title']}}">More information</a>
                <p style="height: 10px;"> </p>
                <div class="dl-horizontal">
                    <div class="title">Inventory #</div><div class="value">{{$catalog['id'] }}</div>
                    <div class="title">Location</div><div class="value">{{ $car['location'] }}</div>
                    <div class="title">Make</div><div class="value">{{ $car['make'] }}</div>
                    <div class="title">Brand</div><div class="value">{{ $car['brand'] }}</div>
                    <div class="title">Engine</div><div class="value">{{ $car['engine'] }}</div>
                    <div class="title">Type</div><div class="value">{{ $car['type'] }}</div>
                    <div class="title">Status</div><div class="value">{{ $car['status'] }}</div>
                    <div class="title">Millage</div><div class="value">{{ $car['milage'] }}</div>
                    <div class="title">Transmission</div><div class="value">{{ $car['transmission'] }}</div>
                </dl>
                <p style="height: 10px;"> </p>
            </div>
            <div class="images">
                @foreach($pictures as $picture)
                    @if (strpos($images, $picture['url']) !== false)
                        <a href="http://www.milkimclassiccars.nl/inventory/{{$catalog['id']}}/details" title="{{$catalog['title']}}">
                            <img src="http://www.milkimclassiccars.nl/custom/owner_images/{{$catalog['id'] }}/500-{{ $picture['url'] }}" class="img-responsive" alt="{{$catalog['title']}}" style="border: 0;" />
                        </a>
                    @endif
                @endforeach
            </div>
		</div>
	</body>
</html>
