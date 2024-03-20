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
