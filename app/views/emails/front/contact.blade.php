<!DOCTYPE html>
<html lang="nl-NL">
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
		</style>
	</head>
	<body style="background-color: #EFEFEF;">
	    <div style="width: 500px;border: 1px solid #CDCDCD; background-color: #FFF; margin: 40px auto; padding: 40px;">
            <h2 style="margin-top: 20px;">{{$subject}}</h2>
            <p>Van : <strong>{{ $from_name }} / {{ $from }}</strong></p>
            @if (isset($phone))
                <p>Telefoonnummer : <strong>{{ $phone }}</strong></p>
            @endif
            <p>{{ $from_message }}</p>
		</div>
	</body>
</html>
