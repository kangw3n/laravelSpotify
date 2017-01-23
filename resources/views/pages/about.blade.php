@extends('layouts.app')

@section('content')
	<h2 data-id="{!! $test !!}">These Data comes from mySQL with users: {{$users->total()}}</h2>


	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<ul class="list-group">
				@forelse($users as $user)
					<li class="list-group-item" style="margin-top: 20px;">
						<span>{{$user->name}}</span>
						<span class="pull-right clearfix">
							Joined ({{$user->created_at-> diffForHumans()}})

							<button class="btn-btn-xs btn-primary">Follow</button>
						</span>
					</li>
				@empty
					<p>No data!</p>
				@endforelse

				{{$users->links()}}
			</ul>
		</div>
	</div>
@stop