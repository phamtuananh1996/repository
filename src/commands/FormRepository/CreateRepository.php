<?php
namespace GFL\Repository\commands\FormRepository;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class CreateRepository extends Command {
	public function handle() {
		$this->call('gfl:FormRepositoryInterface', ['repository' => studly_case($this->argument('repository'))], ['model' => $this->option('model')]);
		$this->call('gfl:FormRepositoryEloquent', ['repository' => studly_case($this->argument('repository'))], ['model' => $this->option('model')]);
	}
	/**
	 * The name of argument being used.
	 *
	 * @var string
	 */
	protected $argumentName = 'repository';
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'gfl:repositories';
	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate new restful repository for the specified .';

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments() {
		return [
			['repository', InputArgument::REQUIRED, 'The name of the repository class.'],
		];
	}
	/**
	 * @return array
	 */
	protected function getOptions() {
		return [
			['model', 'm', InputOption::VALUE_OPTIONAL, 'Generate a model repository'],
		];
	}

}