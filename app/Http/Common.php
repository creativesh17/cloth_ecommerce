<?php

use App\Models\WebsiteUrl;
use Illuminate\Support\Str;

function save_website_url($url, $table_name, $table_id) {
    $url = make_unique_url($url, $table_name, $table_id);
    $url = WebsiteUrl::create([
        'table_id' => $table_id,
        'table_name' => $table_name,
        'url' => Str::slug($url),
    ]);

    return $url->url;
    
}

function make_unique_url($url, $table_name, $table_id) {

    $check_url = WebsiteUrl::where('url',$url)->first();

    if($check_url){
        $url = $url.$table_id.rand(1000,9000);
        make_unique_url($url, $table_name, $table_id);
    }

    return $url;

}


function numbers_to_text($number, $numbers_array = null, $powers = null)
{
    // dd($number);
   if (!is_array($numbers_array)) {
      $numbers_array = array('zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen', 'twenty', 30 => 'thirty', 40 => 'forty', 50 => 'fifty', 60 => 'sixty', 70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
   }

   if (!is_array($powers)) {
      $powers = array(2 => 'hundred', 3 => 'thousand', 6 => 'million', 9 => 'billion', 12 => 'trillion', 15=>'quadrillion', 18=>'quintillion');
   }

   $output = false;
   
   if ($number < 21) {
      // Returns the value of the numbers array if less than 21
        $output = $numbers_array[$number];
        // $output = $number;
   } elseif ($number < pow(10, 2)) {
      $output = $numbers_array[10 * floor($number/10)];
		$remainder = $number%10;
		if ($remainder > 0) {
			$output .= '-'. numbers_to_text($remainder);
		}
   } else {
      $power = 2;
      $place = 0;
      foreach ($powers as $pow => $text)
      {
         $place_value = pow(10, intval($pow));
         $tmp_place = $number/$place_value;
         if ($tmp_place < 1)
         {
            break;
         }
         
         $place = $tmp_place;
         $power = $pow;
         $words = $powers[$pow];
      }
      
      if ($power > 0)
      {
         $output = numbers_to_text($place) . ' ' . $words;
         $remainder = $number % pow(10,$power);
         if ($remainder > 0)
         {
            $output .= ' ' . numbers_to_text($remainder);
         }
      }
   }
   
   return $output;
}
