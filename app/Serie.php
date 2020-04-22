<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = 'Series'; //связка с таблицей

    public static function search_IMDB($title){
        $query = preg_replace('/\s+/', '+', $title);
        $html = file_get_html('https://www.imdb.com/find?q=' . $query);
    
        $url = 'https://www.imdb.com';

        if(!$html->find('div[class="findNoResults"]', 0)){
            $url .= $html->find('table[class="findList"]', 0)->find('tr', 0)->find('td[class="result_text"] a', 0)->href;

            // clean up memory
            $html->clear();
            unset($html);
        } else{
            $url = null;
        }

	    return $url;
    }
    
    public static function scraping_IMDB($url){
        if($url !== null){
            $html = file_get_html($url);
    
            //$title = $html->find('div[class="title_wrapper"] h1', 0)->innertext;
            //$data['title'] = trim(str_replace("&nbsp;", '', $title));
            if($html->find('.imdbRating')){
                $data['rating'] = $html->find('div[class="ratingValue"] strong span', 0)->innertext;
                $data['ratingCount'] = $html->find('div[class="imdbRating"] a span[itemprop="ratingCount"]', 0)->innertext;
            } else {
                $data['rating'] = 0;
                $data['ratingCount'] = 0;
            }
    
            // clean up memory
            $html->clear();
            unset($html);
           } else {
               $data['rating'] = 0;
               $data['ratingCount'] = 0;
           }
    
        return $data;
    }

}
