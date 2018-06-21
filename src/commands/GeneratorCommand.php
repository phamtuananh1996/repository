<?php
namespace GFL\Repository\commands;

use GFL\Repository\exceptions\FileAlreadyExistException;
use GFL\Repository\generators\FileGenerator;
use Illuminate\Console\Command;

abstract class GeneratorCommand extends Command {
	/**
	 * The name of 'name' argument.
	 *
	 * @var string
	 */
	protected $argumentName = '';
	/**
	 * Get template contents.
	 *
	 * @return string
	 */
	abstract protected function getTemplateContents();
	/**
	 * Get the destination file path.
	 *
	 * @return string
	 */
	abstract protected function getDestinationFilePath();
	/**
	 * Execute the console command.
	 */
	public function handle() {
		$path = str_replace('\\', '/', $this->getDestinationFilePath());
		if (!$this->laravel['files']->isDirectory($dir = dirname($path))) {
			$this->laravel['files']->makeDirectory($dir, 0777, true);
		}
		$contents = $this->getTemplateContents();
		try {
			with(new FileGenerator($path, $contents))->generate();
			$this->info("Created : {$path}");
		} catch (FileAlreadyExistException $e) {
			$this->error("File : {$path} already exists.");
		}
	}
	/**
	 * Get class name.
	 *
	 * @return string
	 */
	public function getClass() {
		if ($this->argumentName != '') {
			return class_basename($this->argument($this->argumentName));
		}

	}
	/**
	 * Get default namespace.
	 *
	 * @return string
	 */
	public function getDefaultNamespace(): string {
		return '';
	}
	/**
	 * Get class namespace.
	 *
	 * @param \Nwidart\Modules\Module $module
	 *
	 * @return string
	 */
	public function getClassNamespace() {
		if ($this->argumentName != '') {
			$extra = str_replace_last($this->getClass(), '', $this->argument($this->argumentName));
			$extra = str_replace('/', '\\', $extra);
			$namespace = "";
			$namespace .= '\\' . $this->getDefaultNamespace();
			$namespace .= '\\' . $extra;
			$namespace = str_replace('/', '\\', $namespace);
			return trim($namespace, '\\');
		}
	}

	function str_replace_last($search, $replace, $str) {
		if (($pos = strrpos($str, $search)) !== false) {
			$search_length = strlen($search);
			$str = substr_replace($str, $replace, $pos, $search_length);
		}
		return $str;
	}
}
