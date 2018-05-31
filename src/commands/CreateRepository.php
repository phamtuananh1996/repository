<?php
namespace GFL\Repository\commands;

use GFL\Repository\Support\Stub;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Illuminate\Console\Command;

class CreateRepository extends Command
{

  public function handle()
    {
        $this->call('gfl:repository-eloquent', ['repository' => studly_case($this->argument('repository'))]);
        $this->call('gfl:repository-contract', ['repository' => studly_case($this->argument('repository'))]);
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
    protected $name = 'gfl:repository';
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
    protected function getArguments()
    {
        return [
            ['repository', InputArgument::REQUIRED, 'The name of the repository class.'],
        ];
    }
    /**
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['model', 'm', InputOption::VALUE_NONE, 'Generate a model repository', null],
            ['plain', 'p', InputOption::VALUE_NONE, 'Generate a plain repository', null],
        ];
    }
    
}
