<?php
namespace GFL\Repository\commands\FormRepository;

use GFL\Repository\commands\GeneratorCommand;
use GFL\Repository\Support\Stub;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class RepositoryContracts extends GeneratorCommand {
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
	protected $name = 'gfl:FormRepositoryInterface';
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
		return 'app/Repositories/Contracts/' . $this->getRepositoryName() . '.php';
	}
	/**
	 * @return string
	 */
	protected function getTemplateContents() {
		return (new Stub($this->getStubName(), [
			'NAMESPACE' => "App\Repositories\Contract",
			'CLASS_NAMESPACE' => $this->getClassNamespace(),
			'CLASS' => class_basename($this->getRepositoryName()),
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
			['model', 'm', InputOption::VALUE_NONE, 'Generate a model repository', null],
		];
	}
	/**
	 * @return array|string
	 */
	protected function getRepositoryName() {
		$repository = studly_case($this->argument('repository'));
		if (str_contains(strtolower($repository), 'interface') === false) {
			$repository .= 'Interface';
		}
		return $repository;
	}
	public function getDefaultNamespace(): string {
		return "App\Repositories\Contracts";
	}
	/**
	 * Get the stub file name based on the plain option
	 * @return string
	 */
	private function getStubName() {
		return '/FormRepositoryInterface.stub';
	}
}