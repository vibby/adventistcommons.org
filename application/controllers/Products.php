<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library( [ "ion_auth", "form_validation", "upload", "twig", "container" ] );
		$this->load->helper( [ "url", "request_formatter" ] );
		$this->load->model( "product_model" );
		$user = $this->ion_auth->user()->row();
		if( $user ) {
			$user->image = md5( strtolower( trim( $this->ion_auth->user()->row()->email ) ) );
			$user->is_admin = $this->ion_auth->is_admin();
			$this->twig->addGlobal( "user",  $user );
		}
	}

	public $breadcrumbs = [
		[
			"label" => "Products",
			"url" => "/products",
		],
	];

	public function index()
	{
		/** @var \AdventistCommons\Domain\Repository\ProductRepository $productRepo */
		$productRepo = $this->container->get(\AdventistCommons\Domain\Repository\ProductRepository::class);
		/** @var \AdventistCommons\Domain\Repository\seriesRepository  $seriesRepo */
		$seriesRepo = $this->container->get(\AdventistCommons\Domain\Repository\SeriesRepository::class);
		$data = [
			"products" => $productRepo->findAll(),
			"audience_options" => \AdventistCommons\Domain\Entity\Product::AUDIENCES,
			"product_types" => \AdventistCommons\Domain\Entity\Product::TYPES,
			"product_binding" => \AdventistCommons\Domain\Entity\Product::BINDINGS,
			"series" => $seriesRepo->findAll(),
		];
		$this->breadcrumbs[] = [ "label" => "All Products"  ];
		$this->twig->addGlobal( "title", "Products" );
		$this->twig->addGlobal( "breadcrumbs", $this->breadcrumbs );
		$this->twig->display( "twigs/products", $data );
	}

	public function detail( $product_id ) {
		/** @var \AdventistCommons\Domain\Repository\ProductRepository $productRepo */
		$productRepo = $this->container->get(\AdventistCommons\Domain\Repository\ProductRepository::class);
		$product = $productRepo->findWithAttachmentsAndProjects($product_id);

		if( ! $product ) show_404();
		$data = [
			"product" => $product,
			"file_types" => \AdventistCommons\Domain\Entity\ProductAttachment::FILE_TYPES,
		];
		$this->breadcrumbs[] = [ "label" => $product->getName() ];
		$this->twig->addGlobal( "title", $product->getName() );
		$this->twig->addGlobal( "breadcrumbs", $this->breadcrumbs );
		$this->twig->display( "twigs/product", $data );
	}

	public function edit( $product_id ) {
		if( ! $this->ion_auth->is_admin() ) {
			show_404();
		}

		/** @var \AdventistCommons\Domain\Repository\ProductRepository */
		$productRepo = $this->container->get(\AdventistCommons\Domain\Repository\ProductRepository::class);
		$product = $productRepo->find($product_id);
		/** @var \AdventistCommons\Domain\Repository\SeriesRepository */
		$seriesRepo = $this->container->get(\AdventistCommons\Domain\Repository\SeriesRepository::class);
		$series = $seriesRepo->findAll();

		if( ! $product ) show_404();

		$data = [
			"product" => $product,
			"audience_options" => \AdventistCommons\Domain\Entity\Product::AUDIENCES,
			"product_types" => \AdventistCommons\Domain\Entity\Product::TYPES,
			"product_binding" => \AdventistCommons\Domain\Entity\Product::BINDINGS,
			"series" => $series,
		];
		$this->breadcrumbs[] = [
			"label" => sprintf("Product «%s»", $product->getName()),
			"url" => "/products/" . $product->getId(),
		];
		$this->breadcrumbs[] = [
			"label" => "Edit",
		];
		$this->twig->addGlobal( "title", "Edit Product" );
		$this->twig->addGlobal( "breadcrumbs", $this->breadcrumbs );
		$this->twig->display( "twigs/edit_product", $data );
	}

	public function save() {
		if( ! $this->ion_auth->is_admin() ) {
			show_404();
		}
		$this->output->set_content_type("application/json");

		$data = $this->input->post();
		if( !isset($data["series_id"]) || $data["series_id"] == "" ) {
			$data["series"] = null;
		} elseif( is_numeric( $data["series_id"] ) ) {
			$data["series"][][ "id" ] = $data["series_id"];
		} else {
			$data["series"][][ "name" ] = $data["series_id"];
		}
		if( isset($data["series_id"]) ) {
			unset($data["series_id"]);
		}
		if (!$product = $this->submit_entity(
			[
				'class' => \AdventistCommons\Domain\Entity\Product::class,
			],
			$data
		)) {
			return false;
		}
		/** @var \AdventistCommons\Domain\Action\StoreEntity $storeAction */
		$is_new = ($product->getId() === null);
		$storeAction = $this->container->get(\AdventistCommons\Domain\Action\StoreEntity::class);
		$product = $storeAction->act($product);
		
		if ($is_new) {
			$this->output->set_output( json_encode( [ "redirect" => sprintf( "/products/%d", $product->getId() ) ] ) );
		} elseif( isset($_FILES["cover_image"]) && $_FILES["cover_image"]["name"] ) {
			$this->output->set_output( json_encode( [ "redirect" => sprintf( "/products/edit/%d", $product->getId() ) ] ) );
		} else {
			$this->output->set_output( json_encode( [ "success" => "Product info updated" ] ) );
		}
	}

	public function save_xliff() {
		if( ! $this->ion_auth->is_admin() ) {
			show_404();
		}
		if (!$product = $this->submit_entity(\AdventistCommons\Domain\Entity\Product::class, $this->input->post())) {
			return false;
		}
		/** @var \AdventistCommons\Domain\Action\StoreEntity $storeAction */
		$storeAction = $this->container->get(\AdventistCommons\Domain\Action\StoreEntity::class);
		$storeAction->act($product);

		$this->output->set_content_type("application/json");
		$this->output->set_output( json_encode( [ "redirect" => "/products/edit/" . $product->getId() . "#advanced" ] ) );
	}

	public function save_specs() {
		if( ! $this->ion_auth->is_admin() ) {
			show_404();
		}
		if (!$product = $this->submit_entity(\AdventistCommons\Domain\Entity\Product::class, $this->input->post())) {
			return false;
		}
		$this->output->set_content_type("application/json");
		/** @var \AdventistCommons\Domain\Action\StoreEntity $storeAction */
		$storeAction = $this->container->get(\AdventistCommons\Domain\Action\StoreEntity::class);
		$storeAction->act($product);
		
		$this->output->set_output( json_encode( [ "success" => "Product info updated" ] ) );
	}

	public function add_file() {
		if( ! $this->ion_auth->is_admin() ) {
			show_404();
		}

		if (!$productAttachment = $this->submit_entity(
			\AdventistCommons\Domain\Entity\ProductAttachment::class,
			$this->input->post()
		)) {
			return false;
		}
		
		/** @var \AdventistCommons\Domain\Action\StoreEntity $storeAction */
		$storeAction = $this->container->get(\AdventistCommons\Domain\Action\StoreEntity::class);
		$storeAction->act($productAttachment);
		
		$this->output->set_content_type("application/json");
		$this->output->set_output( json_encode( [ "redirect" => "/products/" . $productAttachment->getProduct()->getId() ] ) );
	}

	public function delete( $product_id ) {
		if( ! $this->ion_auth->is_admin() ) {
			show_404();
		}
		$productRepo = $this->container->get(\AdventistCommons\Domain\Repository\ProductRepository::class);
		$product = $productRepo->find($product_id);
		if( ! $product ) show_404();
		$removeAction = $this->container->get(\AdventistCommons\Domain\Action\RemoveEntity::class);
		$removeAction->act($product);

		redirect( "/products", "refresh" );
	}
	
	private function submit_entity($actionMetadata, array $data) {
		
		if (!is_array($actionMetadata)) {
			$actionMetadata = ['class' => $actionMetadata];
		}
		
		/** @var \AdventistCommons\Domain\Action\SubmitEntity $submitAction */
		$submitAction = $this->container->get(\AdventistCommons\Domain\Action\SubmitEntity::class);
		try {
			$product = $submitAction->act(
				build_action_metadata($actionMetadata),
				build_entity_params_from_request($data),
				build_uploaded_files_from_request($_FILES)
			);
		} catch (\AdventistCommons\Domain\Validation\Violation\ViolationException $e) {
			/** @var \AdventistCommons\Domain\Validation\Violation\ViolationError $validationError */
			foreach ($e->getErrors() as $validationError) {
				$errorMessages[] = sprintf('<p>%s</p>', $validationError->getMessage());
			}
			$this->output->set_output( json_encode( [ "error" => implode('', $errorMessages) ] ) );
			return false;
		}
		
		return $product;
	}
}
