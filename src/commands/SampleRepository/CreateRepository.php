<?php
namespace GFL\Repository\commands\SampleRepository;

use Illuminate\Console\Command;

class CreateRepository extends Command {

	public function handle() {
		$this->call('gfl:repository-eloquent');
		$this->call('gfl:repository-contract');
	}
	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'gfl:repository-generate';
	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate new restful repository for the specified .';
}
