<?php

namespace App\app\model;


/**
 * Class View
 * @package App\app\model
 */
class View
{
	private $file;
	private $title;

	/** Set the view
	 * @param $view
	 * @param array $data
	 */
	public function render($view, $data = [], $backend = false) {
		if ($backend) {
			$view = 'backend/' . $view;
			$template = 'admin';
		} else {
			$view = 'frontend/' . $view;
			$template = 'public';
		}
		$this->file = '../view/' . $view . '.php';
		$content = $this->renderFile($this->file, $data);
		$view = $this->renderFile('../view/' . $template . '_template.php', [
			'title' => $this->title,
			'content' => $content
		]);
		echo $view;
	}

	/** Get the view file
	 * @param $file
	 * @param $data
	 * @return false|string
	 */
	public function renderFile($file, $data) {
		if (file_exists($file)) {
			extract($data);

			ob_start();
			require $file . '';
			return ob_get_clean();
		}
	}
}