@extends('layouts.app')


@section('content')
	@if(isset($artist))
		<div id="track">
			<header class="album-header">
				<div class="row">
					<div class="col-md-4">
						@unless(!isset($artist['images']))
							<div>
								<img src="{!! $artist['images'][0]['url'] !!}" class="album-thumb" alt="">
							</div>
						@endunless
					</div>
					<div class="col-md-8">
						<h2>{!! $artist['name'] !!}</h2>
						<h4>Follower: {!! $artist['followers']['total'] !!}</h4>
						<h5>Popularity: {!! $artist['popularity'] !!}</h5>
						<a href="{!! $artist['external_urls']['spotify'] !!}" target="_blank" class="btn btn-primary">View Artist In
							Spotify</a>
					</div>
				</div>
			</header>

			<div class="album-tracks">
				<h2>Album Tracks</h2>
				@foreach($tracks['tracks'] as $track)
					<div>
						<div class="well">
							<div class="row">
								<div class="col-md-2">
									<img class="album-thumb" src="{!! $track['album']['images'][0]['url'] !!}" alt="">
									<span>{!! $track['album']['name'] !!}</span><br>
									<a href="/album/{!! $track['album']['id'] !!}">View Album </a>
								</div>
								<div class="col-md-10">
									<h4>{!! $track['name'] !!}</h4>
									<a href="{!! $track['preview_url'] !!}" target="_blank" class="btn btn-primary">Preview Track</a>
									<div>
										{!! msMinute($track['duration_ms']) !!} - Popularity: {!! $track['popularity'] !!} <br>
									</div>
								</div>
							</div>

						</div>
					</div>
				@endforeach

			</div>


	@else
		@include('errors/errorfield')
	@endif



@endsection