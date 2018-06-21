<?php
namespace GFL\Repository\commands\SampleRepository;

use GFL\Repository\commands\GeneratorCommand;
use GFL\Repository\Support\Stub;

class CreateRepositoryContracts extends GeneratorCommand {

	protected $name = 'gfl:repository-contract';
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
	 * Generate NAMESPACE, CLASS_NAMESPACE, CLASS
	 * @return string
	 */
	protected function getTemplateContents() {
		return (new Stub($this->getStubName(), [
			'NAMESPACE' => "App\Repositories\Contracts",
			// 'CLASS_NAMESPACE' => $this->getClassNamespace(),
			'CLASS' => "RepositoryInterface",
		]))->render();
	}

	/**
	 * @return array|string
	 */
	protected function getRepositoryName() {
		return "RepositoryInterface";
	}
	public function getDefaultNamespace(): string {
		return "App\Repositories\Contracts";
	}
	/**
	 * Get the stub file name based on the plain option
	 * @return string
	 */
	private function getStubName() {
		return '/repository-interface.stub';
	}
}
