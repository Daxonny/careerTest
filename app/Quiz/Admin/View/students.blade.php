@extends('Admin.View.layout')

@section('main')

<h1>{{ __('global.adminDashboard') }}</h1>
<div class="card">
	<div class="card-body">
			<section id="generateCode">
				<h1>{{ __('global.GenerateCode') }}</h1>
				<form action="{{ route('generate') }}" method="GET">
					<label>{{ __('global.pressButton') }}</label>
					<input type="number" id="codesNumber" name="codesNumber" placeholder="{{ __('global.codesNumber') }}" value="1">
					<button>{{ __('global.generateCode') }}</button>
					<div id="error">@error('codesNumber') {{ __('global.maxCodes') }} @enderror</div>
				</form>
				@if($vm->generatedCode)
				<div class="alert alert-primary mb-4 text-center" role="alert">
					@foreach($vm->generatedCode as $code)
					
					<p>{{$code}}</p>
					@endforeach
				</div> 
				@endif
			</section>
			<section id="generatedCodes">
				<h2>{{ __('global.GeneratedCodes') }}</h2>
				
				<form class="form-inline md-form mr-auto mb-4" method="POST" action="{{ route('students') }}">
				@csrf
					<input class="form-control mr-sm-2" type="text" placeholder="{{ __('global.SearchCode') }}" name="search" aria-label="Search">
					<button class="btn btn-primary btn-sm my-0" type="submit">{{ __('global.Search') }}</button>
				</form>

				<div class="widget-content">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th class="th-content">{{ __('global.Code') }}</th>
									<th class="th-content">{{ __('global.Name') }}</th>
									<th class="th-content">{{ __('global.Status') }}</th>
									<th class="th-content">{{ __('global.Results') }}</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($vm->res as $item)
								<tr>
									<td class="td-content">
										<a href="{{ route('students-res',['id'=>$item->id]) }}">{{ $item->testCode }}</a>
									</td>
									<td class="td-content">
										<button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#edit{{ $item->id }}">
											<span class="material-icons">mode_edit</span>
										</button> {{ $item->name }}
										<div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<form action="{{ route('enter-name',['id'=>$item->id]) }}" method="post" id="form">
													@csrf
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">{{ __('global.enterName') }}</h5>
														</div>
														<div class="modal-body">
															<input type="text" id="name" name="name" value="{{ $item->name }}" required>
														</div>
														<div class="modal-footer">
															<button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{ __('global.cancel') }}</button>
															
																<button type="submit" class="btn btn-primary">{{ __('global.save') }}</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</td>
									<td class="td-content">
										@if($item->status == 1)<span class="badge badge-success">{{ __('global.Completed') }}</span>
										@elseif($item->status == 0)<span class="badge badge-warning">{{ __('global.InProgress') }}</span>
										@else
										<span class="badge badge-danger">{{ __('global.NotStarted') }}</span>
										@endif
									</td>
									<td class="td-content">
										<a href="{{ route('students-res',['id'=>$item->id]) }}">{{ $item->code }}</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
			
						{{ $vm->res->links() }}
					</div>
				</div>
			</section>
	</div>
</div>

@endsection