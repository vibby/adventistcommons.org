<?php

namespace spec;

use AdventistCommons\Domain\Repository\ProductRepository;
use Product_model;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Product_modelSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
		$this->shouldHaveType(ProductRepository::class);
    }

    function it_format_query_results()
	{
		$input = [
			0 => [
				"product1___type_name" => "product",
				"product1___parent_alias" => "",
				"product1__id" => "2",
				"product1__name" => "test",
				"project1___type_name" => "project",
				"project1___parent_alias" => "product1",
				"project1__id" => "3",
				"project1__name" => "project1",
				"language1___type_name" => "language",
				"language1___parent_alias" =>  "project1",
				"language1__id" => "41",
				"language1__name" => "English",
			],
			1 => [
				"product1___type_name" => "product",
				"product1___parent_alias" => "",
				"product1__id" => "2",
				"product1__name" => "test",
				"project1___type_name" => "project",
				"project1___parent_alias" => "product1",
				"project1__id" => "3",
				"project1__name" => "project1",
				"language1___type_name" => "language",
				"language1___parent_alias" =>  "project1",
				"language1__id" => "40",
				"language1__name" => "French",
			],
			2 => [
				"product1___type_name" => "product",
				"product1___parent_alias" => "",
				"product1__id" => "2",
				"product1__name" => "test",
				"project1___type_name" => "project",
				"project1___parent_alias" => "product1",
				"project1__id" => "5",
				"project1__name" => "project2",
				"language1___type_name" => "language",
				"language1___parent_alias" =>  "project1",
				"language1__id" => "39",
				"language1__name" => "German",
			],
			3 => [
				"product1___type_name" => "product",
				"product1___parent_alias" => "",
				"product1__id" => "2",
				"product1__name" => "test",
				"project1___type_name" => "project",
				"project1___parent_alias" => "product1",
				"project1__id" => "5",
				"project1__name" => "project2",
				"language1___type_name" => "language",
				"language1___parent_alias" =>  "project1",
				"language1__id" => "40",
				"language1__name" => "French",
			],
		];

		$output = [
			"product" => [
			 	2 => [
					"id" => "2",
					"name" => "test",
					"project" => [
						3 => [
							"id"=> "3",
							"name" => "project1",
							"language"=> [
								41 => [
									"id"=> "41",
									"name" => "English",
								],
								40 => [
									"id"=> "40",
									"name" => "French",
								],
							],
						],
						5 => [
							"id"=> "5",
							"name" => "project2",
							"language"=> [
								41 => [
									"id"=> "39",
									"name" => "German",
								],
								40 => [
									"id"=> "40",
									"name" => "French",
								],
							],
						],
					],
				],
			],
		];

		self::structureQueryResults($input)->shouldReturn($output);
	}
}
