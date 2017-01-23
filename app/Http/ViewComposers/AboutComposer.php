<?php
	namespace App\Http\ViewComposers;

	use Illuminate\View\View;

	class AboutComposer
	{
		public function compose(View $view)
		{
			$view->with('test', random_int(0, 10));
		}
	}