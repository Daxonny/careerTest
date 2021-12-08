@extends('Admin.View.layout')

@section('main')

<h1>{{ __('global.adminDashboard') }}</h1>
<div class="card">
	<div class="card-body">
		<h2 class="mb-4 card-title">{{ __('global.addUser') }}</h2>
		<form class="" action="{{ route('admin') }}" method="POST">
			@csrf
			<div class="row">
				<div class="form-group col-md-6">
					<label for="inputCountry" class="">{{ __('global.selectCountry') }}</label>
					<select id="inputCountry" class="form-control" name="country">
						<option disabled="disabled" selected="selected">{{ __('global.selectCountry') }}</option>
						@foreach($vm->countries as $country)
						<option id="country" value="{{ $country->id }}" >{{ $country->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group col-md-6">
					<label for="inputSchool" class="">{{ __('global.selectSchool') }}</label>
					<select id="inputSchool" class="form-control" name="school">
						<option disabled="disabled">{{ __('global.selectSchool') }}</option>
					</select>
				</div>

			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group"><label for="formrow-name-Input">{{ __('global.Name') }}</label><input id="formrow-name-Input" type="name" name="name" class="form-control form-control"></div>
				</div>
				<div class="col-md-6">
					<div class="form-group"><label for="formrow-name-Input">{{ __('global.Email') }}</label><input id="formrow-email-Input" type="email" name="email" class="form-control form-control"></div>
				</div>
				
			</div>

			<div>
				<label class="new-control new-checkbox checkbox-primary">
					<input type="checkbox" class="new-control-input" name="role" id="role" value="1">
					<span class="new-control-indicator"></span>{{ __('global.makeAdmin') }}
				</label>
				<button type="submit" class="btn btn-primary w-md float-sm-right">{{ __('global.Submit') }}</button>
			</div>

		</form>
	</div>
</div>

<section id="addedStaff" class="widget widget-table-two">
	<h2 class="widget-heading">{{ __('global.AddedStaff') }}</h2>

	<div class="widget-content">
		<div class="table-responsive">
			<form class="form-inline md-form mr-auto mb-4" method="POST" action="{{ route('search') }}">
				@csrf
					<input class="form-control mr-sm-2" type="text" placeholder="{{ __('global.SearchEmail') }}" name="search" aria-label="Search">
					<button class="btn btn-primary btn-sm my-0" type="submit">{{ __('global.Search') }}</button>
				</form>
			<table class="table">
				<thead>
					<tr>
						<th class="th-content">{{ __('global.Country') }}</th>
						<th class="th-content">{{ __('global.School') }}</th>
						<th class="th-content">{{ __('global.Name') }}</th>
						<th class="th-content">{{ __('global.Email') }}</th>
						<th class="th-content">{{ __('global.Actions') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($vm->users as $user)
					<tr>
						<td class="td-content">{{ $user->country }}</td>
						<td class="td-content">{{ $user->school }}</td>
						<td class="td-content">{{ $user->name }}</td>
						<td class="td-content">{{ $user->email }}</td>
						<form method="POST" >
						@csrf
							<td class="td-content">
								<button class="btn btn-danger btn-sm" formaction="{{ route('remove-user', $user->id) }}">{{ __('global.Delete') }}</button>
							</td>
						</form>
					</tr>
					@endforeach
				</tbody>
			</table>

			{{ $vm->users->links() }}
		</div>
	</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type='text/javascript'>
	$(document).ready(function(){
		$('#inputCountry').change(function(){
			$('#inputSchool').find('option').not(':first').remove();
			$.ajax({
			url: 'getSchools/' + $(this).val(),
			type: 'get',
			dataType: 'json',
				success: function(response){
					response['data'].forEach(school => {
						var option = "<option value='"+school.id+"'>"+school.name+"</option>"; 
						$("#inputSchool").append(option);
					});

				}
			});
		});
	});
</script>	

@endsection