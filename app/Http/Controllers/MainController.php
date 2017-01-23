<?php

	namespace App\Http\Controllers;

	use GuzzleHttp\Exception\RequestException;
	use Illuminate\Http\Request;
	use GuzzleHttp\Client;
	use App\User;

	class MainController extends Controller
	{
		/**
		 * Create a new controller instance.
		 *
		 * @return void
		 */

		public function __construct()
		{
			$this->middleware('auth');
		}

		public function aboutController()
		{
			$page = 'about';
			$users = User::paginate(10);
			return view('pages.about', compact('page', 'users'));
		}

		public function searchController()
		{
			$page = 'home';
			$title = 'Need Music?';
			$title2 = 'Use Spotify to listen music!';
			$queryType = ['track', 'album', 'artist'];

			return view('pages.search', compact('title', 'page', 'title2', 'queryType'));

		}

		public function trackController(Request $request, $id)
		{
			$client = new Client();
			$page = 'track';
			$error = '';
			$tracks = null;

			try {
				$res = $client->request('GET', '//api.spotify.com/v1/tracks/' . $id);
				$tracks = \GuzzleHttp\json_decode($res->getBody(), TRUE);
			} catch (RequestException $e) {
				$error = $e->getMessage();
			}


			return view('pages.track', compact('page', 'tracks', 'error'));
		}

		public function artistController(Request $request, $id)
		{
			$client = new Client();
			$client2 = new Client();
			$errorMsg = '';
			$artists = null;
			$albums = null;

			try {
				$res = $client->request('GET', '//api.spotify.com/v1/artists/' . $id);
				$artists = \GuzzleHttp\json_decode($res->getBody(), true);
			} catch (RequestException $e) {
				$res = null;
				$errorMsg = $e->getMessage();
			}

			try {
				$res2 = $client2->request('GET', '//api.spotify.com/v1/artists/' . $id . '/albums');
				$albums = \GuzzleHttp\json_decode($res2->getBody(), true);
			} catch (RequestException $e) {
				$res2 = null;
				$errorMsg = $e->getMessage();
			}


			$data = array(
				'page' => 'Artist',
				'artists' => $artists,
				'albums' => $albums,
				'error' => $errorMsg
			);

			return view('pages.artist', $data);
		}


		public function albumController(Request $request, $id)
		{
			$client = new Client();
			$error = '';
			$albums = null;
			$page = 'Album';

			try {
				$res = $client->request('GET', '//api.spotify.com/v1/albums/' . $id);
				$albums = \GuzzleHttp\json_decode($res->getBody(), true);
			} catch (RequestException $e) {
				$res = null;
				$error = $e->getMessage();
			}



			return view('pages.album', compact('error', 'page', 'albums') );
		}

		public function topTrackController(Request $request, $id)
		{
			$client = new Client();
			$client2 = new Client();
			$errorMsg = '';
			$tracks = null;
			$artist = null;

			try {
				$res = $client->request('GET', '//api.spotify.com/v1/artists/' . $id . '/top-tracks?country=TW');
				$tracks = \GuzzleHttp\json_decode($res->getBody(), true);
			} catch (RequestException $e) {
				$res = null;
				$errorMsg = $e->getMessage();
			}

			try {
				$res2 = $client2->request('GET', '//api.spotify.com/v1/artists/' . $id );
				$artist = \GuzzleHttp\json_decode($res2->getBody(), true);
			} catch (RequestException $e) {
				$res2 = null;
				$errorMsg = $e->getMessage();
			}


			$data = array(
				'page' => 'Top-Track',
				'artist' => $artist,
				'tracks' => $tracks,
				'error' => $errorMsg
			);

			return view('pages.toptrack', $data);
		}


	}
