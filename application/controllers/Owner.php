<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 20 - July - 2020
 * Author : TheDevs
 * Owner Controller controlls all the Restaurant Owners
 */

include 'Authorization.php';

class Owner extends Authorization
{
    /**
     * CONSTRUCTOR CHECKS IF REQUIRED USER IS LOGGED IN
     */
    public function __construct()
    {
        parent::__construct();
        authorization(['admin'], true);
    }

    // index function responsible for showing the index page.
    function index()
    {
        $page_data['status'] = isset($_GET['status']) ? sanitize($_GET['status']) : "approved";
        $page_data['page_name'] = 'owner/index';
        $page_data['page_title'] = get_phrase("restaurant_owners");

        /**PAGINATION STARTS**/
        $owners = ($page_data['status'] == 'approved') ? $this->owner_model->get_approved_owners() : $this->owner_model->get_pending_owners();
        $total_rows = count($owners);
        $page_size = 12;
        $config = pagintaion($total_rows, $page_size, site_url('owner'));
        $current_page = sanitize($this->input->get('page', 0));
        $this->pagination->initialize($config);
        $conditions = array(
            'role_id' => 3,
            'status'  => ($page_data['status'] == 'approved') ? 1 : 0
        );
        $page_data['owners'] = $this->owner_model->owner_merger($this->owner_model->paginate($page_size, $current_page, $conditions, "id", "asc"));
        /**PAGINATION ENDS**/

        $this->load->view('backend/index', $page_data);
    }

    // profile function is responsible for showing the profile page of a owner
    function profile($id, $active_tab = "activity")
    {
        $page_data['page_name'] = 'owner/profile';
        $page_data['tab'] = $active_tab;
        $page_data['page_title'] = get_phrase("restaurant_owner_profile");
        $page_data['owner'] = $this->owner_model->get_owner_by_id($id);
        $this->load->view('backend/index', $page_data);
    }

    // Update function is responsible for updating the profile data of a owner
    function update($updater)
    {
        if ($updater=='profile') {
             $response = $this->owner_model->update_owner();

               if ($response) {
                    $this->session->set_flashdata('flash_message', get_phrase('owner_profile_updated_successfully'));
                } else {
                    $this->session->set_flashdata('error_message', get_phrase('an_error_occurred'));
                }

        }
        else if ($updater=='phone') {
        //phone
               $response = $this->owner_model->update_owner_phone();

               if ($response) {
                    $this->session->set_flashdata('flash_message', get_phrase('customer_profile_updated_successfully'));
                } else {
                    $this->session->set_flashdata('error_message', get_phrase('an_error_occurred'));
                }

        }
        else{
            //address

             $response = $this->owner_model->update_owner_address();

               if ($response) {
                  echo '200';
                    $this->session->set_flashdata('flash_message', get_phrase('owner_address_updated_successfully'));
                } else {
                    $this->session->set_flashdata('error_message', get_phrase('an_error_occurred'));
                }

        }   
      
        redirect(site_url('owner'), 'refresh');
    }

    // Delete function is responsible for deleting the profile data of a owner
    function delete($id)
    {
        $response = $this->owner_model->delete_owner($id);
        if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('owner_delete_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('an_error_occurred'));
        }
        redirect(site_url('owner'), 'refresh');
    }

    // UPDATE owner STATUS
    function update_status($id)
    {
        $response = $this->owner_model->update_owner_status($id);
        if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('owner_updated_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('an_error_occurred'));
        }
        redirect(site_url('owner/profile/' . $id), 'refresh');
    }

    // MARK THIS RESTAURANT OWNER AS CUSTOMER ONLY
    function become_customer($user_id)
    {
        $response = $this->owner_model->become_customer($user_id);
        if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('updated_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('an_error_occurred'));
        }
        redirect(site_url('owner'), 'refresh');
    }
}

/* End of file owner.php */
