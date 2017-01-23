@extends('layouts.app')

@section('content')
	<h1>{{$title}}</h1>
	<div class="lead">{{$title2}}</div>

	<form>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search Music..." name="searchStr" id="searchMusic">
		</div>

	<select class="query-type">

		@foreach($queryType as $option)
			<option>{{$option}}</option>
		@endforeach

	</select>

	</form>


	<div class="search-container"></div>


	<div class="error-msg">
		<h1>Error Occurs: <span></span></h1>
	</div>

	<script id="template" type='text/template'>
		@{{# each this}}
		<div class="row">
			<div class="col-md-12">
				<div class="search-res well">
					<h4><a href="/@{{type}}/@{{id}}">@{{name}}</a></h4>
					@{{#if genres}}
					<div>
						<strong>Genres: </strong>
						@{{#each genres}}
						<span class="spacer">@{{this}}</span>
						@{{/each}}
					</div>
					@{{/if}}
					@{{#if artists}}
					<div>
						<strong>Artists: </strong>
						@{{#each artists}}
						<span class="spacer"><a href="/artist/@{{this.id}}">@{{this.name}}</a></span>
						@{{/each}}
					</div>
					@{{/if}}
					@{{#if album}}
					<div>
						<strong>Album: </strong>
						<span class="spacer"><a href="/album/@{{this.album.id}}">@{{this.album.name}}</a></span>
					</div>
					@{{/if}}
				</div>
			</div>
		</div>
		@{{/ each}}
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.6/handlebars.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
	<script src="/js/search.js"></script>


@stop