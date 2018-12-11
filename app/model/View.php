<?php

namespace App\app\model;

use \App\app\manager\BookManager;

/** Get view page
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
	 * @param bool $backend
	 */
	public function render($view, $data = [], $backend = false)
	{
		if ($backend) {
			$view = 'backend/' . $view;
		} else {
			$view = 'frontend/' . $view;
		}
		$this->file = '../view/' . $view . '.php';
		$content = $this->renderFile($this->file, $data);

		$view = $this->renderFile('../view/template.php', [
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
	public function renderFile($file, $data)
	{
		if (file_exists($file)) {
			extract($data);

			ob_start();
			require $file . '';
			return ob_get_clean();
		}
	}
}