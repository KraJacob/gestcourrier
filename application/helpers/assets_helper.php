<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('css_url'))
{
	function css_url($nom)
	{
		return base_url() . 'assets/dist/css/' . $nom . '.css';
	}
}

/*if ( ! function_exists('bank_url'))
{
	function bank_url($nom)
	{
		return base_url() . 'assets/bank/' . $nom . '.png';
	}
} */

if ( ! function_exists('plugins_url'))
{
	function plugins_url($nom)
	{
		return base_url() . 'assets/plugins/' . $nom;
	}
}

if ( ! function_exists('js_url'))
{
	function js_url($nom)
	{
		return base_url() . 'assets/dist/js/' . $nom . '.js';
	}
}

if ( ! function_exists('img_url'))
{
	function img_url($nom)
	{
		return base_url() . 'assets/dist/img/' . $nom;
	}
}
/*
if ( ! function_exists('web_url'))
{
	function assets_url()
	{
		return base_url() . 'assets/';
	}
}  */

if ( ! function_exists('img'))
{
	function img($nom, $alt = '', $class = '', $width = '', $height = '')
	{
		return '<img src="' . img_url($nom) . '" alt="' . $alt .  '" class="' . $class . '"  />';
		
	}
}