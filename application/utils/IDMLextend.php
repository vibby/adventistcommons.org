<?php
ini_set('memory_limit', '-1');

class IDMLextend
{
  private $arr_accepted_mime_types = array(
                  'application/zip; charset=binary',
                  'application/octet-stream; charset=binary');

  private $resource = array();

  public $structure = array();

  public function __construct()
  {
    
  }

  public function getCover($resource)
  {
    $counter = 0;
    $paragraphs = array();

    foreach ($resource as $content) {

               
			if(!isset($content->Story->ParagraphStyleRange) && !isset($content->Story->XMLElement->ParagraphStyleRange)){
			   continue;
			}
			

			$loop_element = (isset($content->Story->ParagraphStyleRange)) ? $content->Story->ParagraphStyleRange : $content->Story->XMLElement->ParagraphStyleRange;


      $counter_paragraph = 1;
      
			foreach($loop_element as $value){

  

			   if ((strpos($value['AppliedParagraphStyle'], 'ParagraphStyle/Cover') !== false)) {
				  
				  $text = array();

				  $counter_ = 0;
				  
				  foreach ($value as $k => $v) {

					 if($k == "CharacterStyleRange"){
						
						foreach ($v as $kk => $vv) {

						   if($kk == "Content" && trim($vv) != ''){

							  array_push($text, trim($vv));
							  $counter_ ++;
						   }

						   if($kk == "Br"){
							  array_push($text, "\r\n");
							  $counter_ ++;
						   }

						}
					 }
					 $counter++;
				  }
				
          $counter_paragraph ++;
          
          if(join($text) != '' ){
  				  array_push($paragraphs,join($text));

          }

			   }
      }
      
		}
  
    //echo join($paragraphs);
    return $paragraphs;
	}
	
	public function createSection($data){

		$section = ProductSection::create(array('product_id' => $data['id'],
		'name' => $data['name'],
		'position' => $data['position'],
		'order' => $data['order']));
	}

	public function createProductContent($data){

		$productContent = ProductContent::create(array('product_id' => $data['product_id'],
		'section_id' => $data['section_id'],
		'content' => $data['content']));

	}

	public function getProductContent($resource, $product_id)
  {
    $counter = 0;
		
		$paragraphs = array();

		$p = ProductSection::where('product_id',$product_id)->get();   

		foreach ($p as $product) {
			$position = $product->position;


			foreach ($resource as $content) {

               
				if(!isset($content->Story->ParagraphStyleRange) && !isset($content->Story->XMLElement->ParagraphStyleRange)){
					continue;
				}
					
	
				$loop_element = (isset($content->Story->ParagraphStyleRange)) ? $content->Story->ParagraphStyleRange : $content->Story->XMLElement->ParagraphStyleRange;
	
	
				$length = count($loop_element);

				for($i = $position; $i < $length - 1; ++$i) {
	
					if ((strpos($loop_element[$i]['AppliedParagraphStyle'], 'ParagraphStyle/Section Divider') !== false)) {
						continue;
	
					} else{


						$text = array();

						foreach ($loop_element[$i] as $k => $v) {

						 foreach ($v as $kk => $vv) {
									if($kk == "Content" && trim($vv) != ''){
										 
										$data = array(
											'product_id' =>  $product_id,
											'section_id' =>  $product->id,
											'content' => $vv
										);
										
										$this-> createProductContent($data);
									}
							}
						}

					}
					
				}
	
				
			}
		}

  }

  public function getSections($resource,$product_id)
  {
    
    $section_index = array();

    foreach ($resource as $content) {

               
			if(!isset($content->Story->ParagraphStyleRange) && !isset($content->Story->XMLElement->ParagraphStyleRange)){
				continue;
			}
				

			$loop_element = (isset($content->Story->ParagraphStyleRange)) ? $content->Story->ParagraphStyleRange : $content->Story->XMLElement->ParagraphStyleRange;

			$counter = 0;

			$length = count($loop_element);
			for($i = 0; $i < $length - 1; ++$i) {

				if ((strpos($loop_element[$i]['AppliedParagraphStyle'], 'ParagraphStyle/Section Divider') !== false)) {
					
					$data = array(
						'id' => $product_id,
						'name' =>  explode("/",explode(" ", $loop_element[$i + 1]['AppliedParagraphStyle'])[0])[1],
						'order' => 0,
						'position' => $i
					);
					
					$this-> createSection($data);

				}
				
			}

      
		}


  
    return $section_index;
  }


  public function getBack($resource)
  {
    $counter = 0;
    $paragraphs = array();

    foreach ($resource as $content) {

               
			if(!isset($content->Story->ParagraphStyleRange) && !isset($content->Story->XMLElement->ParagraphStyleRange)){
			   continue;
			}
			

			$loop_element = (isset($content->Story->ParagraphStyleRange)) ? $content->Story->ParagraphStyleRange : $content->Story->XMLElement->ParagraphStyleRange;


      $counter_paragraph = 1;
      
			foreach($loop_element as $value){

  

			   if ((strpos($value['AppliedParagraphStyle'], 'ParagraphStyle/Back') !== false)) {
				  
				  $text = array();

				  $counter_ = 0;
				  
				  foreach ($value as $k => $v) {

					 if($k == "CharacterStyleRange"){
						
						foreach ($v as $kk => $vv) {

						   if($kk == "Content" && trim($vv) != ''){

							  array_push($text, trim($vv));
							  $counter_ ++;
						   }

						   if($kk == "Br"){
							  array_push($text, "\r\n");
							  $counter_ ++;
						   }

						}
					 }
					 $counter++;
				  }
				
          $counter_paragraph ++;
          
          if(join($text) != '' ){
  				  array_push($paragraphs,join($text));

          }

			   }
      }
      
		}
  
    //echo join($paragraphs);
    return $paragraphs;
  }

  public function getBody($resource)
  {
    $counter = 0;
    $paragraphs = array();

    foreach ($resource as $content) {

               
			if(!isset($content->Story->ParagraphStyleRange) && !isset($content->Story->XMLElement->ParagraphStyleRange)){
			   continue;
			}
			

			$loop_element = (isset($content->Story->ParagraphStyleRange)) ? $content->Story->ParagraphStyleRange : $content->Story->XMLElement->ParagraphStyleRange;


      $counter_paragraph = 1;
      
			foreach($loop_element as $value){

			   if ((strpos($value['AppliedParagraphStyle'], 'ParagraphStyle/Body') !== false)) {
				  
				  $text = array();

				  $counter_ = 0;
				  
				  foreach ($value as $k => $v) {

					 if($k == "CharacterStyleRange"){
						
						foreach ($v as $kk => $vv) {

						   if($kk == "Content" && trim($vv) != ''){

							  array_push($text, trim($vv));
							  $counter_ ++;
						   }

						   if($kk == "Br"){
							  array_push($text, "\r\n");
							  $counter_ ++;
						   }

						}
					 }
					 $counter++;
				  }
				
				  $counter_paragraph ++;

          if(join($text) != '' ){
  				  array_push($paragraphs,join($text));

          }
			   }
      }
      
		}
  
    //echo join($paragraphs);
    return $paragraphs;
  
  }


}
