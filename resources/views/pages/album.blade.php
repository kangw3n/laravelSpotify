@extends('layouts.app')


@section('content')

	@if(isset($albums))
		<div id="album">
			<header class="album-header">
				<div class="row">
					<div class="col-md-4">

						@unless(!isset($albums['images']))
							<div>
								<img src="{!! $albums['images'][0]['url'] !!}" class="album-thumb" alt="">
							</div>
						@endunless

					</div>

					<div class="col-md-8">

						@unless(!isset($albums['artists']))
							<h4>
								@foreach($albums['artists'] as $artist)
				          <span >
				            {{ $artist['name'] }}
				          </span>
								@endforeach
							</h4>
						@endunless

						<h2>{!! $albums['name'] !!}</h2>
						<h5>Release Date: {!!  $albums['release_date'] !!}</h5>
						<a href="{!! $albums['external_urls']['spotify'] !!}" target="_blank" class="btn btn-primary">View In Spotify</a>
					</div>
				</div>
			</header>

			<div class="album-tracks">
				<h2>Album Tracks</h2>

				@foreach($albums['tracks']['items'] as $track)
					<div>
						<div class="well">
							<h5>{!! $track['track_number'] !!} - <a href="/track/{!! $track['id'] !!}"> {!! $track['name'] !!}</a></h5>
							<div>
								Artists:
								@foreach($track['artists'] as $artist)
									<span class="spacer">
										<a href="/artist/{!! $artist['id'] !!}">{!! $artist['name'] !!}</a>
									</span>
								@endforeach
							</div>
							<a href="{!! $track['preview_url'] !!}" target="_blank">Preview Track</a>
						</div>
					</div>
				@endforeach

			</div>
		</div>
	@else
		@include('errors/errorfield')
	@endif

@endsection