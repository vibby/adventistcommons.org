<?php

class IDMLcontentCollection
{
  private $rawXML;

  public function __construct($resource, $content)
  {
    $this->rawXML = $content;
  }


  public function getMyContent($name){
    $domXML = new DOMDocument();
    $domXML->loadXML($this->rawXML);

    // var_dump($this->strip_tags_content($domXML->textContent,"<rdf:li>"));
    return (simplexml_load_string($this->rawXML));
  }

  public function getContentByTagName($name)
  {
    $domXML = new DOMDocument();
    $domXML->loadXML($this->rawXML);

    // var_dump($this->strip_tags_content($domXML->textContent,"<rdf:li>"));
    var_dump(simplexml_load_string($this->rawXML));
    $elements = $domXML->getElementsByTagName('XMLElement');

    //var_dump($elements);
    /** @var DOMDocument $element */
    foreach($elements as $element)
    {
      /** @var DOMAttr $markupAttribute */
      $markupAttribute = $element->attributes->getNamedItem('MarkupTag');

      $arrTagName = explode('/',$markupAttribute->textContent);
      $tagName = $arrTagName[1];
      if($tagName == $name)
      {
        $content = new IDMLcontent($element);
        return $content->convertXMLtoHTML();
      }
    }
  }
  public function strip_tags_content($text, $tags = '', $invert = FALSE) 
    { 

        preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags); 
        $tags = array_unique($tags[1]); 
        
        if(is_array($tags) AND count($tags) > 0) 
        { 
            if($invert == FALSE) 
            { 
                return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text); 
            } 
            else 
            { 
                return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text); 
            } 
        } 
        elseif($invert == FALSE) 
        { 
            return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text); 
        } 
        return $text; 
    }
}

class IDMLcontent
{
  private $html;
  private $text;

  /** @var DOMDocument */
  private $rawXML;

  public function __construct($xmlElement)
  {
    $this->rawXML = $xmlElement;
  }

  public function convertXMLtoHTML()
  {
    $paragraphStyleRanges = $this->rawXML->getElementsByTagName('ParagraphStyleRange');

    $strContent = '';

    /** @var DOMDocument $paragraphStyleRange */
    foreach($paragraphStyleRanges as $paragraphStyleRange)
    {
      $style = '';
      $justification = $paragraphStyleRange->attributes->getNamedItem('Justification')->textContent;
      switch($justification)
      {
        case 'CenterAlign':
          $style .= ' style="text-align: center"';
          break;
      }
      $strContent .= '<p'.$style.'>';
      $characterStyleRanges = $paragraphStyleRange->getElementsByTagName('CharacterStyleRange');

      /** @var DOMDocument $characterStyleRange */
      foreach($characterStyleRanges as $characterStyleRange)
      {
        $style = '';
        $fontStyle = $characterStyleRange->attributes->getNamedItem('FontStyle');
        if(isset($fontStyle))
        {
          switch($characterStyleRange->attributes->getNamedItem('FontStyle')->textContent){
            case 'Bold':
              $style = ' style="font-weight:bold"';
              break;
          }
        }

        /** @var DOMNodeList $childeren */
        $childeren = $characterStyleRange->childNodes;

        foreach($childeren as $child)
        {
          switch($child->localName)
          {
            case 'Content':
              $strContent .= '<span'.$style.'>';
              $strContent .= $child->textContent;
              $strContent .= '</span>';
              break;
            case 'Br':
              $strContent .= '<br />';
              break;
          }
        }
      }
      $strContent .= '</p>';
    }

    return $strContent;
  }
}