<?php
namespace AdventistCommons\Import\Idml;
class IDMLtagCollection
{
  private $rawXML;

  public function __construct($resource, $content)
  {
    $this->rawXML = $content;
  }

  public function getTags()
  {
    $arr = array();

    $numberItems = count($this->rawXML[0]->XMLTag);

    for($i=0; $i < $numberItems; $i++)
    {
      $item = new IDMLtag($this->rawXML[0]->XMLTag[$i]);
      $arr[] = $item;
    }

    return $arr;
  }


}
