<?php
namespace AdventistCommons\Eloquent;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class ProductContent extends Eloquent
{

    protected $table = "product_content"; // table name

    protected $fillable = array('product_id', 'content', 'section_id');

    public $timestamps = false;
}
