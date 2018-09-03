<?php

    class Products extends Controller
    {
        private $productModel;

        public function __construct(    )
        {
            $this->productModel = $this->model(  'product'  );
        }

        public function update($id = 0)
        {
            if ("POST" == $_SERVER['REQUEST_METHOD']) {
                $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
                $data = [
                     1 => $_POST['petrolprice'],
                     2 => $_POST['dieselprice'],
                     3 => $_POST['gasprice'],
                ];
                if ( $this->productModel->updateAll($data) ) {
                    echo "Updated Successfully";
                } else {
                    echo "Error occurred";
                }
            } else {
                redirector( '' );
            }

        }
    }
