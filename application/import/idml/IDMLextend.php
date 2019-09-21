<?php
namespace AdventistCommons\Import;

use \AdventistCommons\Eloquent\ProductSection;
use \AdventistCommons\Eloquent\ProductContent;

class IDMLextend
{	
	public $structure = array();

	public function __construct()
	{ }

	public function createSection($data)
	{

		$section = ProductSection::create(array(
			'product_id' => $data['id'],
			'name' => $data['name'],
			'position' => $data['position'],
			'order' => $data['order']
		));
	}

	public function createProductContent($data)
	{

		$productContent = ProductContent::create(array(
			'product_id' => $data['product_id'],
			'section_id' => $data['section_id'],
			'content' => $data['content']
		));
	}

	public function getProductContent($resource, $product_id)
	{

		$p = ProductSection::where('product_id', $product_id)->get();

		foreach ($p as $product) {
			$position = $product->position;


			foreach ($resource as $content) {


				if (!isset($content->Story->ParagraphStyleRange) && !isset($content->Story->XMLElement->ParagraphStyleRange)) {
					continue;
				}


				$loop_element = (isset($content->Story->ParagraphStyleRange)) ? $content->Story->ParagraphStyleRange : $content->Story->XMLElement->ParagraphStyleRange;


				$length = count($loop_element);

				for ($i = $position; $i < $length - 1; ++$i) {

					if ((strpos($loop_element[$i]['AppliedParagraphStyle'], 'ParagraphStyle/Section Divider') !== false)) {
						continue;
					} else {


						$text = array();

						foreach ($loop_element[$i] as $k => $v) {

							foreach ($v as $kk => $vv) {
								if ($kk == "Content" && trim($vv) != '') {

									$data = array(
										'product_id' =>  $product_id,
										'section_id' =>  $product->id,
										'content' => $vv
									);

									$this->createProductContent($data);
								}
							}
						}
					}
				}
			}
		}
	}

	public function getSections($resource, $product_id)
	{

		$section_index = array();

		foreach ($resource as $content) {


			if (!isset($content->Story->ParagraphStyleRange) && !isset($content->Story->XMLElement->ParagraphStyleRange)) {
				continue;
			}


			$loop_element = (isset($content->Story->ParagraphStyleRange)) ? $content->Story->ParagraphStyleRange : $content->Story->XMLElement->ParagraphStyleRange;

			$counter = 0;

			$length = count($loop_element);
			for ($i = 0; $i < $length - 1; ++$i) {

				if ((strpos($loop_element[$i]['AppliedParagraphStyle'], 'ParagraphStyle/Section Divider') !== false)) {

					$data = array(
						'id' => $product_id,
						'name' =>  explode("/", explode(" ", $loop_element[$i + 1]['AppliedParagraphStyle'])[0])[1],
						'order' => 0,
						'position' => $i
					);

					$this->createSection($data);
				}
			}
		}

		return $section_index;
	}
}
