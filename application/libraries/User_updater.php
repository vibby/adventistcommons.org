<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class User_updater
 * @author    vibby
 * @copyright 2019
 */
class User_updater
{
	public function __construct()
	{
		$CI =& get_instance();
		$CI->load->model('ion_auth_model');
		$this->db = $CI->ion_auth_model->db;
	}

	/**
	 * @param int $user_id
	 * @param array $user
	 */
	public function updateUser(int $user_id, array $user): void
	{
		$user["pro_translator"] = isset($user["pro_translator"]);
		$user["username"] = $user["email"];
		$user["skills"] = serialize($user["skills"]);
		$user = $this->addOrUpdateLanguages($user_id, $user);
		$this->db->where( "id", $user_id );
		$this->db->update( "users", $user );
	}

	private function addOrUpdateLanguages(int $user_id, array $user): array
	{
		if (isset($user["languages"])) {
			$db = $this->db;
			array_walk(
				$user["languages"],
				function($language_id) use ($db, $user_id) {
					$db->query(str_replace(
						"INSERT INTO",
						"INSERT IGNORE INTO",
						$db->insert_string(
							"user_languages",
							["user_id" => $user_id, "language_id" => $language_id]
						)
					));
				}
			);
			unset($user["languages"]);
		}

		return $user;
	}
}
