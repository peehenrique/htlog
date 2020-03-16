<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['full_tag_open']= "<ul class='pagination justify-content-center mt-2'>";
$config['full_tag_close']= "</ul>";

$config['first_tag_open']= "<li class='page-item'><a class='page-link'";
$config['first_tag_close']= "</a></li>";

$config['prev_tag_open']= "<li class='page-item'>";
$config['prev_tag_close']= "</li>";
$config['prev_tag_open']= "<li class='page-item prev'><a class='page-link'";
$config['prev_tag_close']= "</a></li>";

$config['cur_tag_open']= "<li class='page-item active'>
	<a href='javascript:null' class='page-link'>";
$config['cur_tag_close']= "</a></li>";

$config['num_tag_open']= "<li class='page-item'>
<a class='page-link'";
$config['num_tag_close']= "</a></li>";

$config['next_tag_open']= "<li class='page-item next'><a class='page-link'";
$config['next_tag_close']= "</a></li>";

$config['last_tag_open']= "<li class='page-item'>
<a class='page-link'";
$config['last_tag_close']= "</a></li>";

$config['first_link']='Primeiro';
$config['prev_link']='Anterior';
$config['next_link']='Próximo';
$config['last_link']='Ultimo';
