<?php
namespace GFL\Repository\commands\FormRepository;

use GFL\Repository\commands\GeneratorCommand;
use GFL\Repository\Support\Stub;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class RepositoryEloquents extends GeneratorCommand {
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
	protected $name = 'gfl:FormRepositoryEloquent';
	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate new restful repository for the specified .';
	/**
	 * Get controller name.
	 *
	 * @return string
	 */
	public function getDestinationFilePath() {
		return 'app/Repositories/Eloquents/' . $this->getRepositoryName() . '.php';
	}
	/**
	 * @return string
	 */
	protected function getTemplateContents() {
		return (new Stub($this->getStubName(), [
			'NAME' => studly_case($this->argument('repository')),
			'NAMESPACE' => "App\Repositories\Eloquents",
			'CLASS_NAMESPACE' => $this->getClassNamespace(),
			'CLASS' => class_basename($this->getRepositoryName()),
			'MODEL' => $this->option('model'),
		]))->render();
	}
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
	/**
	 * @return array|string
	 */
	protected function getRepositoryName() {
		$repository = "Eloquent" . studly_case($this->argument('repository'));
		return $repository;
	}
	public function getDefaultNamespace(): string {
		return "App\Repositories\Eloquents";
	}
	/**
	 * Get the stub file name based on the plain option
	 * @return string
	 */
	private function getStubName() {
		return '/FormRepositoryEloquent.stub';
	}
}