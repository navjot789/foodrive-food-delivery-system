<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 7 or newer
 *
 * @package CodeIgniter
 * @author ExpressionEngine Dev Team
 * @copyright Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license http://codeigniter.com/user_guide/license.html
 * @link http://codeigniter.com
 * @since Version 1.0
 * @filesource
 */

if (!function_exists('pagination')) {
    function pagintaion($total_rows, $per_page_item, $base_url)
    {
        $config['base_url']  = $base_url;
        $config['attributes'] = array('class' => 'page-link');
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['per_page']        = $per_page_item;
        $config['num_links']       = 2;
        $config['total_rows']      = $total_rows;
        $config['full_tag_open']   = '<ul class="pagination justify-content-center">';
        $config['full_tag_close']  = '</ul>';
        $config['prev_link']       = '<i class="fas fa-chevron-left"></i>';
        $config['prev_tag_open']   = '<li class="page-item">';
        $config['prev_tag_close']  = '</li>';
        $config['next_link']       = '<i class="fas fa-chevron-right"></i>';
        $config['next_tag_open']   = '<li class="page-item">';
        $config['next_tag_close']  = '</li>';
        $config['cur_tag_open']    = '<li class="page-item active"> <a class="page-link">';
        $config['cur_tag_close']   = '</a></li>';
        $config['num_tag_open']    = '<li class="page-item">';
        $config['num_tag_close']   = '</li>';
        $config['first_tag_open']  = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open']   = '<li class="page-item">';
        $config['last_tag_close']  = '</li>';
        return $config;
    }
}

// ------------------------------------------------------------------------
/* End of file pagination_helper.php */
/* Location: ./system/helpers/pagination_helper.php */