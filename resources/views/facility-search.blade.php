<!DOCTYPE html>
<html>
<head>
    <title>Real Estate</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
	<div class="container">
		<h1>Search Properties</h1>


		<form method="GET" action="{{ url('facility-search') }}">
			<div class="row">
				<div class="col-md-6">
					<input type="text" name="search" class="form-control" placeholder="Search" value="{{ old('search') }}">
				</div>
				<div class="col-md-6">
					<button class="btn btn-success">Search</button>
				</div>
			</div>
            <br/>
		</form>

<strong>Available Properties</strong>

		<table class="table table-bordered">
			<tr>
				<th>Id</th>
				<th>Property Type</th>
				<th>District</th>
                <th>Location</th>
				<th>Price</th>
                <th>Facility</th>
				<th>Property Image</th>
			</tr>
			@if($properties->count())
				@foreach($properties as $property)
				<tr>
					<td>{{ $property->id }}</td>
					<td>{{ $property->property_type }}</td>
					<td>{{ $property->district }}</td>
                    <td>{{ $property->location }}</td>
					<td>{{ $property->area }}</td>
                    <td>{{ $property->facility }}</td>
					<td><img width="100" src="../storage/app/uploads/property/{{$property -> property_image}}"   alt = "<?php echo $property -> image ?> "> </td>
				</tr>
				@endforeach
			@else
			<tr>
				<td colspan="3">Result not found.</td>
			</tr>
			@endif
		</table>
<strong>Facilities of Properties</strong>

		<table class="table table-bordered">
			<tr>
				<th>Id</th>
				<th>Facility Name</th>
				<th>Bedroom</th>
                <th>Bathroom</th>
                <th>Furnished Status</th>
			</tr>
			@if($facilities->count())
				@foreach($facilities as $facility)
				<tr>
					<td>{{ $facility->id }}</td>
					<td>{{ $facility->facility_name }}</td>
					<td>{{ $facility->bedroom }}</td>
                    <td>{{ $facility->bathroom }}</td>
                    <td>{{ $facility->furnished }}</td>
				</tr>
				@endforeach
			@else
			<tr>
				<td colspan="3">Result not found.</td>
			</tr>
			@endif
		</table>




	</div>
</body>
</html>