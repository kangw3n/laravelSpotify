@extends('layouts.app')

@section('content')
	<div class="container">
		<div id="single">
			@if(isset($tracks))
				<header class="album-header">
					<div class="row">
						<div class="col-md-4">

							@unless(!isset($tracks['album']['images'][0]['url']))
								<div>
									<img src="{!! $tracks['album']['images'][0]['url'] !!}" class="album-thumb" alt="">
								</div>
							@endunless

						</div>
						<div class="col-md-8">

							@unless(!isset($tracks['artists']))
								<h4>
									@foreach($tracks['artists'] as $artist)
										<span class="spacer">
				            <a href="/artist/{!! $artist['id'] !!}"> {!! $artist['name'] !!}</a>
				          </span>
									@endforeach
								</h4>
							@endunless

							<h2>{!! $tracks['name'] !!}</h2>

							<h5>Album Name:
								<a href="/album/{!! $tracks['album']['id'] !!}">
									{!! $tracks['album']['name'] !!}
								</a>
							</h5>

							<a href="{!! $tracks['external_urls']['spotify'] !!}" target="_blank" class="btn btn-primary">View In
								Spotify</a>
						</div>
					</div>
				</header>
			@else
				@include('errors/errorfield')
			@endif
		</div>
	</div>


@endsection