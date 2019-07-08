<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model  implements \AdventistCommons\Domain\Repository\ProductFinderInterface
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public $file_types = [
		"pdf_printing" => "PDF (Production)",
		"pdf_personal" => "PDF (Personal)",
		"indd" => "InDesign",
		
	];
	
	public function getProducts()
	{
		$products = $this->db->select( "*" )
			->from( "products" )
			->get()
			->result_array();
		
		return array_map( function( $product ) {
			$product["languages"] = $this->db->select( "DISTINCT( language_id )" )
			->from( "product_attachments" )
			->where( "product_id", $product["id"] )
			->group_by( "language_id" )
			->get()
			->num_rows();
			return $product;
		}, $products );
	}
	
	public function getProduct( $product_id ) {
		return $this->db->select( "*" )
			->from( "products" )
			->where( "id", $product_id )
			->get()
			->row_array();
	}
	
	public function getAttachments( $product_id ) {
		$attachments = $this->db->select( "*" )
			->from( "product_attachments" )
			->where( "product_id", $product_id )
			->join( "languages", "product_attachments.language_id = languages.id" )
			->get()
			->result_array();
		
		return array_map( function( $attachment ) {
			$attachment["file_type"] = $this->file_types[$attachment["file_type"]];
			return $attachment;
		}, $attachments );
	}
	
	public function getSection( $section_id ) {
		return $this->db->select( "*" )
			->from( "product_sections" )
			->where( "id", $section_id )
			->get()
			->row_array();
	}
	
	public function getSectionContent( $project_id, $section_id, $user_id = null ) {
		$content = $this->db->select( "*, product_content.id as id" )
			->from( "product_content" )
			->where( "section_id", $section_id )
			->where( "is_hidden", false )
			->join( "project_content_status", "project_content_status.content_id = product_content.id AND project_content_status.project_id = " . $project_id, "left" )
			->get()
			->result_array();
		
		return array_map( function( $content ) use( $project_id, $user_id ) {
			$revisions = $this->db->select( "*" )
				->from( "product_content_revisions" )
				->where( "content_id", $content["id"] )
				->where( "project_id", $project_id )
				->order_by( "created_at", "desc" )
				->join( "users", "product_content_revisions.user_id = users.id" )
				->get()
				->result_array();
			
			foreach( $revisions as $key => $revision ) {
				$date = new DateTime( $revision["created_at"] );
				$revisions[$key]["created_at_formatted"] = $date->format( "Y-m-d H:i a" );
				$revisions[$key]["created_at"] = $date->format( "c" );
				$old_content = array_key_exists( $key+1, $revisions ) ? $revisions[$key+1]["content"] : "";
				$revisions[$key]["diff"] = $this->_htmlDiff( $old_content, $revision["content"] );
			}
			
			$approvals = $this->db->select( "*" )
				->from( "project_content_approval" )
				->where( "content_id", $content["id"] )
				->where( "project_id", $project_id )
				->join( "users", "project_content_approval.approved_by = users.id" )
				->get()
				->result_array();
			
			$content["revisions"] = $revisions;
			$content["total_revisions"] = count( $content["revisions"] );
			$content["latest_revision"] = $content["revisions"][0]["content"] ?? "";
			$content["approvals"] = $approvals;
			$content["total_approvals"] = count( $approvals );
			
			if( $user_id ) {
				$has_approved = $this->_user_has_approved_content( $content["id"], $project_id, $user_id );
			}
			
			$content["user_has_approved"] = $has_approved;
			
			$errors = $this->db->select( "*" )
				->from( "product_content_log" )
				->where( "content_id", $content["id"] )
				->where( "project_id", $project_id )
				->where( "type", "error" )
				->where( "is_resolved", false )
				->order_by( "created_at", "desc" )
				->get()
				->result_array();	
			
			$content["errors"] = $errors;
			
			$str_length = strlen( $content["content"] );
			$content["textarea_height"] = $str_length > 60 ? ( $str_length / 60 ) + 1 : 2;
			return $content;
		}, $content );
	}
	
	public function getSectionId( $content_id ) {
		$section = $this->db->select( "section_id" )
			->from( "product_content" )
			->where( "id", $content_id )
			->get()
			->row_array();
		return $section["section_id"];
	}
	
	public function getContentLog( $id ) {
		return $this->db->select( "*" )
			->from( "product_content_log" )
			->where( "id", $id )
			->get()
			->row_array();
	}
	
	public function getSeriesItems() {
		return $this->db->select( "*" )
			->from( "series" )
			->get()
			->result_array();
	}
	
	private function _user_has_approved_content( $content_id, $project_id, $user_id ) {
		return $this->db->select( "*" )
			->from( "project_content_approval" )
			->where( "content_id", $content_id )
			->where( "project_id", $project_id )
			->where( "approved_by", $user_id )
			->count_all_results() >= 1;
	}
	
	//https://github.com/paulgb/simplediff
	private function _diff($old, $new){
		$matrix = array();
		$maxlen = 0;
		foreach($old as $oindex => $ovalue){
			$nkeys = array_keys($new, $ovalue);
			foreach($nkeys as $nindex){
				$matrix[$oindex][$nindex] = isset($matrix[$oindex - 1][$nindex - 1]) ?
					$matrix[$oindex - 1][$nindex - 1] + 1 : 1;
				if($matrix[$oindex][$nindex] > $maxlen){
					$maxlen = $matrix[$oindex][$nindex];
					$omax = $oindex + 1 - $maxlen;
					$nmax = $nindex + 1 - $maxlen;
				}
			}   
		}
		if($maxlen == 0) return array(array('d'=>$old, 'i'=>$new));
		return array_merge(
			$this->_diff(array_slice($old, 0, $omax), array_slice($new, 0, $nmax)),
			array_slice($new, $nmax, $maxlen),
			$this->_diff(array_slice($old, $omax + $maxlen), array_slice($new, $nmax + $maxlen)));
	}
	private function _htmlDiff($old, $new){
		$ret = '';
		$diff = $this->_diff(preg_split("/[\s]+/", $old), preg_split("/[\s]+/", $new));
		foreach($diff as $k){
			if(is_array($k))
				$ret .= (!empty($k['d'])?"<del>".implode(' ',$k['d'])."</del> ":'').
					(!empty($k['i'])?"<ins>".implode(' ',$k['i'])."</ins> ":'');
			else $ret .= $k . ' ';
		}
		return $ret;
	}

	/**
	 * @inheritdoc
	 */
	public function getProductStructureWithAttachmentsAndProjects(int $product_id): array
	{
		$query = $this->db->select(
				$this->buildStructureSelect('products', 'product', 'product1').",".
				$this->buildStructureSelect('product_attachments', 'product_attachment','product_attachment1', 'product1').",".
				$this->buildStructureSelect('languages', 'language', 'l1', 'product_attachment1').",".
				$this->buildStructureSelect('projects', 'project', 'project1', 'product1').",".
				$this->buildStructureSelect('languages', 'language', 'l2', 'project1').","
			)
			->from( "products as product1" )
			->join( "product_attachments as product_attachment1", "product1.id = product_attachment1.product_id" )
			->join( "languages as l1", "product_attachment1.language_id = l1.id" )
			->join( "projects as project1", "product1.id = project1.product_id" )
			->join( "languages as l2", "project1.language_id = l2.id" )
			->where( "product1.id", $product_id )
			->get();

		return self::structureQueryResults($query->result_array());
	}

	/**
	 * Build the SQL select statement in order to build structure of it
	 *
	 * @param string $tableName
	 * @param string $structureType
	 * @param string|null $alias
	 * @param string|null $parentAlias
	 * @return string
	 */
	private function buildStructureSelect(string $tableName, string $structureType, string $alias = null, string $parentAlias = null): string
	{
		$alias = $alias ?? $tableName;
		return sprintf(
				'
				\'%1$s\' as %2$s___type_name,
				\'%3$s\' as %2$s___parent_alias,',
				$structureType,
				$alias,
				$parentAlias
			).$this->buildSelectForTable($tableName, $alias);
	}

	/**
	 * Build the SQL select statement to identify all fields, even if they have same name in different tables
	 *
	 * @param string $table
	 * @param string|null $alias
	 * @return string
	 */
	private function buildSelectForTable(string $tableName, string $alias = null): string
	{
		$alias = $alias ?? $tableName;
		$columns = $this->db->query("SHOW COLUMNS FROM $tableName")->result_array();

		$field_names = array();
		foreach ($columns as $column) {
			$field_names[] = $column["Field"];
		}
		$prefixed = array();
		foreach ($field_names as $field_name) {
			$prefixed[] = "`{$alias}`.`{$field_name}` AS `{$alias}__{$field_name}`";
		}

		return implode(", ", $prefixed);
	}

	/**
	 * ===================================================
	 * Turns SQL structure array results like this :
	 * ===================================================
	 * array(4) {
	 *	[0]=> array(47) {
	 *		["product1___type_name"] => string(7) "product"
	 *		["product1___parent_alias"] => string(0) ""
	 *		["product1__id"] => string(1) "2"
	 *		["product1__name"] => string(4) "test"
	 *      …
	 *		["product_attachment1___type_name"]=> string(18) "product_attachment"
	 *		["product_attachment1___parent_alias"] => string(8) "product1"
	 *		["product_attachment1__id"] => string(1) "3"
	 *		["product_attachment1__language_id"] => string(2) "41"
	 * 		…
	 * 		["language1___type_name"] => string(8) "language"
	 * 		["language1___parent_alias"] => string(19) "product_attachment1"
	 * 		["language1__id"] => string(2) "41"
	 * 		["language1__name"] => string(7) "English"
	 * 		…
	 * [1]=> array(47) {
	 *		["product1___type_name"] => string(7) "product"
	 *		["product1___parent_alias"] => string(0) ""
	 *		["product1__id"] => string(1) "2"
	 *		["product1__name"] => string(4) "test"
	 *      …
	 *
	 * ===================================================
	 * Into Structural data like that :
	 * ===================================================
	 * array(1) {
	 * 	['product]=> &array(1) {
	 *	 	[2]=> &array(27) {
	 * 			["id"] => string(1) "2"
	 * 			["name"] => string(4) "test"
	 *	 		…
	 * 			["product_attachment"] => &array(2) {
	 * 				[3] => &array(10) {
	 * 					["id"]=> string(1) "3"
 	 *					["product_id"]=> string(1) "2"
	 *	 				["language_id"]=> string(2) "48"
	 *		 			["status"]=> string(1) "0"
	 * 					["_children_types"]=> array(1) {
	 *						[0]=> string(8) "language"
	 * 					}
	 *		 			["language"]=> &array(1) {
	 * 						[41]=>&array(8) {*
	 * 							["id"]=> string(1) "41"
	 * 							…
	 *
	 * @param array $results
	 * @return array
	 */
	private static function structureQueryResults(array $results): array
	{
		// step 1 : flat data and enrich with data about parents
		$flat = [];
		foreach ($results as $row) {
			foreach ($row as $key => $value) {
				list($alias, $property) = explode('__', $key);
				$id = $row[sprintf('%s__id', $alias)];
				$flatKey = $alias.'_'.$id;
				if (!isset($flat[$flatKey])) {
					$parentAlias = $row[sprintf('%s___parent_alias', $alias)];
					$flat[$flatKey]['_parent_id'] = $parentAlias ? $row[sprintf('%s__id', $parentAlias)] : null;
					$flat[$flatKey]['_alias'] = $alias;
				}
				$flat[$flatKey][$property] = $value;
			}
		}

		// step 2 : build the structure
		return self::nestStructure($flat);
	}

	private static function nestStructure(array $flat, array $parent = [])
	{
		$children = array_filter(
			$flat,
			function ($row) use ($parent) {
				return $parent
					? $row['_parent_alias'] == $parent['_alias'] && $row['_parent_id'] == $parent['id']
					: !$row['_parent_alias']
					;
			}
		);

		foreach ($children as $child) {
			$child = self::nestStructure($flat, $child);
			$typeName = $child['_type_name'];
			unset($child['_type_name']);
			unset($child['_alias']);
			unset($child['_parent_alias']);
			unset($child['_parent_id']);
			$parent[$typeName][$child['id']] = $child;
		}

		return $parent;
	}
}
