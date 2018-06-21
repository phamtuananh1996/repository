<?php

namespace GFL\Repository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {
	protected $commands = [
		'GFL\Repository\commands\SampleRepository\CreateRepositoryContracts',
		'GFL\Repository\commands\SampleRepository\CreateRepositoryEloquents',
		'GFL\Repository\commands\SampleRepository\CreateRepository',

		'GFL\Repository\commands\FormRepository\RepositoryContracts',
		'GFL\Repository\commands\FormRepository\RepositoryEloquents',
		'GFL\Repository\commands\FormRepository\CreateRepository',
	];

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		if ($this->app->runningInConsole()) {
			$this->commands($this->commands);
		}
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {

	}
}
