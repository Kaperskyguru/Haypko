<?php
/**
 *
 */
class Partners
{

    function __construct()
    {
        $this->partnerModel = $this->model( 'partner' );
    }

    public function index() {
        $data = [
            'partner_name' => 'PMT001',
            'partner_location' => 'Ayobo',
            'partner_state' => 'Lagos',
            'partner_city' => 'Yaba',
            'partner_email' => 'solomoneseme@gmail.com',
            'partner_mobile' => '08145655380',
            'partner_rc_number' => 'rc334dhj33'
        ];
        $create = $this->partnerModel->createPartner($data);
        if($create) {
            echo "Partner Created";
        } else {
            echo "Partner Not Created";
        }
    }

    public function partner($id) {
        print_r($this->partnerModel->getPartner($id));
    }

    public function partners() {
        print_r($this->partnerModel->getPartners());
    }

    public function update() {
        $data = [
            'partner_name' => 'GENIUS002',
            'partner_location' => 'Ikeja'
        ];
        $update = $this->partnerModel->updatePartner(1, $data);
        if($update) {
            echo "Partner Updated";
        } else {
            echo "Partner Failed to Update";
        }
    }

    public function delete($id) {
        $delete = $this->partnerModel->deletePartner($id);
        if(!$delete) {
            echo "Partner Not Deleted";
        } else {
            echo "Partner Deleted";
        }
    }

}
