<?php
Route::get('/install/{key?}', array('as' => 'install', function ($key = null) {
	if ($key == "someSecretKey") {
		try {
			echo '<br>init migrate';
			Artisan::call('migrate', array('--force' => true));
			echo '<br>done migrate';

			echo '<br>init seeding';
			Artisan::call('db:seed', array('--force' => true));
			echo '<br>done seeding';

		} catch (Exception $e) {
			Response::make($e->getMessage(), 500);
		}
	} else {
		App::abort(404);
	}
}));
