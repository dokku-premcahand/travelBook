<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['per_page'] = 20;
$config['full_tag_open'] = '<nav aria-label="Page navigation"><ul class="pagination">';
$config['full_tag_close'] = '</ul></nav>';
$config['first_link'] = FALSE;
$config['last_link'] = FALSE;
$config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
$config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';