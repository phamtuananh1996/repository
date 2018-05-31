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
        $this->call('gfl:respository-eloquent', ['respository' => studly_case($this->argument('respository'))]);
        $this->call('gfl:respository-contract', ['respository' => studly_case($this->argument('respository'))]);
    }
    /**
     * The name of argument being used.
     *
     * @var string
     */
    protected $argumentName = 'respository';
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'gfl:respository';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate new restful respository for the specified .';
   
    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['respository', InputArgument::REQUIRED, 'The name of the respository class.'],
        ];
    }
    /**
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['model', 'm', InputOption::VALUE_NONE, 'Generate a model respository', null],
            ['plain', 'p', InputOption::VALUE_NONE, 'Generate a plain respository', null],
        ];
    }
    
}
