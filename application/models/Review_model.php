<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Product name : FoodMob
 * Date : 21 - August - 2020
 * Author : TheDevs
 * Review model handles all the database queries of Reviewing
 */

class Review_model extends Base_model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "reviews";
    }

    /**
     * GET ALL THE REVIEWS WITHOUT ANY CONDITIONS
     *
     */
    public function get_all()
    {
        $this->db->order_by("id", "desc");
        $obj = $this->db->get($this->table);
        return $this->merger($obj);
    }

    /**
     * GET REVIEWS BASED ON ID
     *
     * @param [type] $id
     */
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        $obj = $this->db->get($this->table);
        return $this->merger($obj, true);
    }

    /**
     * GET REVIEWS BY CUSTOMER ID
     *
     * @param [type] $id
     */
    public function get_by_customer_id($id)
    {
        $this->db->where('customer_id', $id);
        $obj = $this->db->get($this->table);
        return $this->merger($obj);
    }

    /**
     * MERGER IS RESPONSIBLE FOR MERGING DATA
     *
     * @param [type] $query_obj
     * @param boolean $is_single_row
     */
    public function merger($query_obj, $is_single_row = false)
    {
        if (!$is_single_row) {
            $reviews = $query_obj->result_array();
            foreach ($reviews as $key => $review) {
                $customer_details = !empty($review['customer_id']) ? $this->customer_model->get_by_id($review['customer_id']) : array();
                $restaurant_details = !empty($review['restaurant_id']) ? $this->restaurant_model->get_by_id($review['restaurant_id']) : array();

                $reviews[$key]['customer_name']  = isset($customer_details['name']) ? $customer_details['name'] : "";
                $reviews[$key]['customer_email']  = isset($customer_details['email']) ? $customer_details['email'] : "";
                $reviews[$key]['restaurant_name']  = isset($restaurant_details['name']) ? $restaurant_details['name'] : "";
            }
            return $reviews;
        } else {
            $review = $query_obj->row_array();
            $customer_details = !empty($review['customer_id']) ? $this->customer_model->get_by_id($review['customer_id']) : array();
            $restaurant_details = !empty($review['restaurant_id']) ? $this->restaurant_model->get_by_id($review['restaurant_id']) : array();
            $review['customer_name']  = isset($customer_details['name']) ? $customer_details['name'] : "";
            $review['customer_email']  = isset($customer_details['email']) ? $customer_details['email'] : "";
            $review['restaurant_name']  = isset($restaurant_details['name']) ? $restaurant_details['name'] : "";
            return $review;
        }
    }

    // GET DATA BY A CONDITION ARRAY
    public function get_by_condition($conditions = [])
    {
        foreach ($conditions as $key => $value) {
            if (!is_null($value)) {
                if (is_array($value)) {
                    $this->db->where_in($key, $value);
                } else {
                    $this->db->where($key, $value);
                }
            }
        }
        $obj = $this->db->get($this->table);
        return $this->merger($obj);
    }

    // UPDATE A REVIEW
    public function update()
    {
        $data['restaurant_id'] = required(sanitize($this->input->post('restaurant_id')));
        $data['order_code'] = required(sanitize($this->input->post('order_code')));
        $data['customer_id'] = $this->logged_in_user_id;
        $rating = required(sanitize($this->input->post('rating_' . $data['restaurant_id'])));
        $data['rating'] = ($rating > 0 && $rating < 6) ? $rating : 5;
        $data['review'] = required(sanitize($this->input->post('review_' . $data['restaurant_id'])));
        $data['timestamp'] = strtotime(date('D, d-M-Y'));

        $order_checker = $this->db->get_where('orders', ['customer_id' => $data['customer_id'], 'code' => $data['order_code']])->num_rows();
        if ($order_checker > 0) {
            $restaurant_checker = $this->db->get_where('order_details', ['order_code' => $data['order_code'], 'restaurant_id' => $data['restaurant_id']])->num_rows();
            if ($restaurant_checker > 0) {
                $checker = array(
                    'order_code' => $data['order_code'],
                    'customer_id' => $data['customer_id'],
                    'restaurant_id' => $data['restaurant_id']
                );
                $this->db->where($checker);
                $previous_data = $this->db->get('reviews');
                if ($previous_data->num_rows() > 0) {
                    $this->db->where($checker);
                    $this->db->update($this->table, $data);

                    // UPDATE RESTAURANT RATING ALSO
                    $this->update_restaurant_rating($data['restaurant_id']);
                    return $data;
                } else {
                    $this->db->insert($this->table, $data);

                    // UPDATE RESTAURANT RATING ALSO
                    $this->update_restaurant_rating($data['restaurant_id']);
                    return $data;
                }
            }
        }

        return false;
    }

    // UPDATE THE RATING FIELD ON RESTAURANT TABLE ALSO
    public function update_restaurant_rating($restaurant_id)
    {
        $restaurant_total_rating = get_restaurant_rating($restaurant_id);
        $rating_updater['rating'] = $restaurant_total_rating;
        $this->db->where('id', $restaurant_id);
        $this->db->update('restaurants', $rating_updater);
    }

    // GET SINGLE REVIEW AND RATINGS
    public function get_a_review($conditions = [])
    {
        foreach ($conditions as $key => $value) {
            if ($value && $value != null) {
                if (is_array($value)) {
                    $this->db->where_in($key, $value);
                } else {
                    $this->db->where($key, $value);
                }
            }
        }
        $obj = $this->db->get($this->table);
        return $this->merger($obj, true);
    }

    // DASHBOARD TILE DATA USER WISE
    public function get_number_of_review_pending()
    {
        $number_of_pending_reviews = 0;
        $conditions = array(
            'customer_id' => $this->logged_in_user_id,
            'order_status' => 'delivered'
        );
        $orders = $this->order_model->get_by_condition($conditions);

        foreach ($orders as $order) {
            $order_details = $this->order_model->details($order['code']);
            $condition_one = [];
            foreach ($order_details as $order_detail) {
                $condition_two = ['customer_id' => $this->logged_in_user_id, 'order_code' => $order['code'], 'restaurant_id' => $order_detail['restaurant_id']];
                if ($condition_one === $condition_two) continue;
                $condition_one = $condition_two;
                $reviews = $this->db->get_where($this->table, $condition_one)->row_array();
                $number_of_pending_reviews = empty($reviews['review']) ? $number_of_pending_reviews + 1 : $number_of_pending_reviews;
            }
        }

        return $number_of_pending_reviews;
    }


     // Update restaurant reply on reviews
     public function update_restaurant_reply()
     {
        $data['restaurant_id'] = required(sanitize($this->input->post('restaurant_id')));
        $data['order_code'] = required(sanitize($this->input->post('order_code')));
        $data['res_reply'] = required(sanitize($this->input->post('reply')));
        $this->db->where('restaurant_id', $data['restaurant_id']);
        $this->db->where('order_code', $data['order_code']);
        $this->db->update($this->table, $data);

         $restaurant_details = $this->restaurant_model->get_by_id($data['restaurant_id']);
         $return_data = array("response"=> true, "slug" => $restaurant_details['slug'], "id" => $restaurant_details['id'].'/#review-portion');
         return $return_data;
     }
}
