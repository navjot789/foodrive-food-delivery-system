<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Authorization.php';

class Support extends Authorization
{
    
    // index function responsible for showing the index page.
    function index()
    {
        authorization(['admin'], true);
       
        $page_data['page_name'] = 'support/index';
        $page_data['support_type'] = 'pending';
        $page_data['page_title'] = get_phrase("Support_request");
        $page_data['support'] = $this->support_model->get_all_pending_ticket();
        $this->load->view('backend/index', $page_data);
    }
    
    function pending()
    {
        authorization(['admin'], true);

        $page_data['page_name'] = 'support/index';
        $page_data['support_type'] = 'pending';
        $page_data['page_title'] = get_phrase("Pending_support_request");
        $page_data['support'] = $this->support_model->get_all_pending_ticket();
        $this->load->view('backend/index', $page_data);
    }

    function approved()
    {
        authorization(['admin'], true);
       
        $page_data['page_name'] = 'support/approved';
        $page_data['support_type'] = 'approved';
        $page_data['page_title'] = get_phrase("Approved_support_requests");
        $page_data['support'] = $this->support_model->get_all_approved_ticket();
        $this->load->view('backend/index', $page_data);
    }

    function rejected()
    {
        authorization(['admin'], true);
       
        $page_data['page_name'] = 'support/rejected';
        $page_data['support_type'] = 'rejected';
        $page_data['page_title'] = get_phrase("Rejected_support_requests");
        $page_data['support'] = $this->support_model->get_all_rejected_ticket();
        $this->load->view('backend/index', $page_data);
    }

    //Submitting support requests
    public function request() 
    {
        authorization(['admin','customer'], true);
        $response = $this->support_model->support_request();
        if ($response) {
            success(get_phrase('Your request submit successfully, we`ll contact you shortly'), site_url('orders'));
        } else {
            error(get_phrase('an_error_occurred while submitting the request'), site_url('orders'));
        }

    }

    

    // PAY FUNCTION IS BEING USED FOR UPDATING THE TICKET
    function action()
    {
        authorization(['admin'], true);

        $response = $this->support_model->action();
        if ($response) {
            success(get_phrase('Support_ticked_updated'), site_url('support'));
        }
    }
  
   
}
