<?php
namespace GFL\Repository\commands\SampleRepository;

use GFL\Repository\commands\GeneratorCommand;
use GFL\Repository\Support\Stub;

class CreateRepositoryEloquents extends GeneratorCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'gfl:repository-eloquent';
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
			'NAMESPACE' => "App\Repositories\Eloquents",
			//'NAME' => str_replace('/', '\\', studly_case($this->argument('repository'))),
			'CLASS_NAMESPACE' => $this->getClassNamespace(),
			//'CLASS' => class_basename($this->getRepositoryName()),
		]))->render();
	}

	/**
	 * @return array|string
	 */
	protected function getRepositoryName() {
		return "EloquentRepository";
	}
	public function getDefaultNamespace(): string {
		return "App\Repositories\Eloquents";
	}
	/**
	 * Get the stub file name based on the plain option
	 * @return string
	 */
	private function getStubName() {
		return '/repository-eloquent.stub';
	}
}
