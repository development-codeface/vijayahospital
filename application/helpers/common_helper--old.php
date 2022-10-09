
<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
/*

|--------------------------------------------------------------------------

| Helper Files: Flashdata Message helper

|--------------------------------------------------------------------------

|created at : 07 06 2015

|created by : Anju

|

*/

if (!function_exists('printr'))
{
	function printr($result)
	{
		if (count((array)$result) > 0)
		{
			echo '<pre>';
			print_r($result);

			// exit;

		}
	}
}

/**
 * asset_url
 */

if (!function_exists('asset_path_dashboard'))
{
	function asset_path_dashboard($path = '')
	{
		$CI = & get_instance();
		$asset_path = $CI->config->item('asset_path_dashboard');
		return site_url($asset_path . $path);
	}
}

if (!function_exists('asset_path_web'))
{
	function asset_path_web($path = '')
	{
		$CI = & get_instance();
		$asset_path = $CI->config->item('asset_path_web');
		return site_url($asset_path . $path);
	}
}

if (!function_exists('randomString'))
{
	function randomString($limit)
	{
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randstring = '';
		for ($i = 0; $i < $limit; $i++)
		{
			$randstring.= $characters[rand(0, (strlen($characters) - 1)) ];
		}

		return $randstring;
	}
}

if (!function_exists('getKeywords'))
{
	function getKeywords()
	{
		$CI = & get_instance();
		$CI->load->model('Common_model');
		$fields = 'keywords.*';
		$c = array(
			'products.status' => 'Active'
		);
		$keywords = $CI->Common_model->findAllWithJoin('', 'keywords', $fields);
		return $keywords;
	}
}

if (!function_exists('urlSafeString'))
{
	function urlSafeString($value)
	{
		$CI = & get_instance();
		$str = preg_replace("/[^A-Za-z0-9-]/", '-', $value);
		return $str;
	}
}

if (!function_exists('encodeurlSafeString'))
{
	function encodeurlSafeString($value)
	{
		$CI = & get_instance();
		$str = preg_replace('/[^A-Za-z0-9-]/', '', $value);
		return $str;
	}
}

if (!function_exists('subdescription'))
{
	function subdescription($value, $limit = '')
	{
		$CI = & get_instance();
		$max_char = ($limit != '') ? $limit : 200;
		$text = $value;
		$cut_text = substr($text, 0, $max_char);
		if ($text
		{
			$max_char - 1} != ' ')
			{ // if the 45th character not a space
				$new_pos = strrpos($cut_text, ' '); // find the space from the last character
				$cut_text = substr($text, 0, $new_pos);
			}

			return $cut_text;
		}
	}

	if (!function_exists('getCms'))
	{
		function getCms($id)
		{
			$CI = & get_instance();
			$cn = array(
				'id' => $id
			);
			$cms = $CI->Web_model->findAllWithJoin($cn, 'cms', '*', '', 'single');
			return $cms;
		}
	}

	if (!function_exists('getAd'))
	{
		function getAd($position, $where)
		{
			$CI = & get_instance();
			$cn = array(
				'post' => $where,
				'position' => $position
			);
			$ad = $CI->Web_model->findAllWithJoin($cn, 'advertisement', 'advertisement.*', '', 'single');
			return $ad;
		}
	}

	if (!function_exists('add_seo_url_slug'))
	{
		function add_seo_url_slug($value, $update = '')
		{
			$CI = & get_instance();
			if ($update != '')
			{
				$module = $value['module'];
				$product_id = $value['product_id'];
				$condition = array(
					'product_id' => $product_id,
					'module' => $module
				);
				$del = $CI->Common_model->delete($condition, 'seo_keywords');
			}

			$value['URL_slug'] = urlSafeString($value['URL_slug']);
			$CI->Common_model->add($value, 'seo_keywords');
		}
	}

	if (!function_exists('getDataFromSub'))
	{
		function getDataFromSub($cat_id)
		{
			$CI = & get_instance();
			$conds = array(
				'category' => $cat_id
			);
			$review = $CI->Web_model->findAllWithJoin($conds, 'posts', 'posts.*', '', '', '', '', 'id', 'desc');
			if (!empty($review))
			{
				$review_sub = $review[0]['subcategory'];
				$cond = array(
					'subcategory' => $review_sub,
					'category' => $cat_id
				);
				$join = array(
					'category' => 'category.id = posts.category',
					'subcategory' => 'subcategory.id = posts.subcategory',
					'seo_keywords' => 'seo_keywords.product_id = posts.id'
				);
				$review_sub_list = $CI->Web_model->findAllWithJoin($cond, 'posts', 'posts.*,,category.title as cat_title,subcategory.title as sub_title,seo_keywords.URL_slug', $join, '', '', '', '', 'id', 'desc');
				return $review_sub_list;
			}
		}
	}

	if (!function_exists('getMenus'))
	{
		function getMenus()
		{
			$CI = & get_instance();
			$category = $CI->Web_model->findAllWithJoin('', 'category', '*', '', '', '', '', '', '');
			$new_arr = array();
			foreach($category as $keys => $cat)
			{
				$cond = array(
					'category' => $cat['id']
				);
				$subarray = array();
				$join = array(
					'category' => 'category.id = posts.category',
					'seo_keywords' => 'seo_keywords.product_id = posts.id',
					'subcategory' => 'subcategory.id = posts.subcategory'
				);
				$menu1 = $CI->Web_model->findAllWithJoin($cond, 'posts', 'posts.*,seo_keywords.URL_slug,category.title as cat_title,category.id as cat_id,subcategory.title as subtitle,subcategory.id as subid,subcategory.seo_url as seo_url', $join, '', '', '', 'id', 'desc');
				foreach($menu1 as $key => $men)
				{
					if (!empty($men['subid']))
					{
						$subarray[$key]['id'] = $men['subid'];
						$subarray[$key]['title'] = $men['subtitle'];
						$subarray[$key]['seo_url'] = $men['seo_url'];
					}
				}

				$subarray = array_map("unserialize", array_unique(array_map("serialize", $subarray)));
				$new_arr[$cat['title']] = $subarray;
			}

			return $new_arr;
		}
	}
