@extends('layouts.app')

@section('content')
	@if(isset($artists))
		<div class="container" id="vueApp">
				<header class="artist-header clearfix">

					<h1>
						@unless(!isset($artists['images']))
					    <span>
						    <img src="{!! $artists['images'][0]['url'] !!}" class="artist-thumb img-circle" alt="">
					    </span>
						@endunless
							{!! $artists['name'] !!}
					</h1>

					@unless(!isset($artists['genres']))
						<p>
							Genres:
							@foreach($artists['genres'] as $genre)
								<span class="spacer">{!! $genre !!}</span>
							@endforeach
						</p>
					@endunless

					<div class="col-md-3">
						<a href="/top-tracks/{!! $artists['id'] !!}" class="btn btn-success">View all Tracks</a>
					</div>

				</header>

				<form id="albumFilter">
					<div class="form-group">
						<label class="control-label" for="inputDefault">Filter Album</label>
						<input type="text" name="albumFilter" class="form-control" id="inputDefault">
					</div>
				</form>

				<div class="artist-albums">
					<div class="row flexy">
							@foreach($albums['items'] as $album)
								<div class="col-md-3 well">
									<div class="album">
										<img class="album-thumb img-thumbnail" src="{!! $album['images'][0]['url'] !!}" alt="">
										<h4>{!! $album['name'] !!}</h4>
										<a href="/album/{!! $album['id'] !!}" class="btn btn-default btn-block">Album Details</a>
									</div>
								</div>
							@endforeach

					</div>
				</div>

		</div>
	@else
		@include('errors/errorfield')
	@endif



	<script>
		// plain vanila javascript filtering items

		var data = {!! json_encode($albums['items']) !!};
		var markupFn = function(i) {
			return `<div class="col-md-3 well">
								<div class="album">
									<img class="album-thumb img-thumbnail" src="${i.images[0].url}" alt="">
									<h4>${i.name}</h4>
									<a href="/album/${i.id}" class="btn btn-default btn-block">Album Details</a>
								</div>
							</div>`;
		}
		var inputModel = document.getElementById('inputDefault');
		var markupModel = '';

		inputModel.addEventListener('keyup', function(e) {
			var value = e.target.value.trim();
			//clear items
			markupModel = '';

			//filtering
			if (value !== '') {
				data.forEach(function(item) {
					if(item.name.indexOf(value) > -1) {
						markupModel += markupFn(item);
					}
				});
			} else {
				data.forEach(function(item) {
					markupModel += markupFn(item);
				})
			}


			//append items
			document.querySelector('.flexy').innerHTML = markupModel;
		});




	</script>



@stop