
<?php
require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
use Bariew\phpQuery;
function getFilm(){
    $client = new Client();
    $urls = getFilms($client);
    foreach ($urls as $u){
        $url = $client->request('GET', 'http://pravda-kino.dp.ua/'.$u);
        $body = $url->getBody();
        $document = \phpQuery::newDocumentHTML($body);
        $image_movis = pq($document)->find('#div_4 > div:nth-child(2) > p > a > img')->attr('src');
        $image = 'http://pravda-kino.dp.ua/'.$image_movis;
        $links = pq($document)->find('#div_3 > div.div_col.dc_1');
        $titles = pq($links)->find('#table_6 > tr:nth-child(2) > td:nth-child(2) > p ')->text();


        $title_text = str_replace(array(' в 3D',' в 3Д',' 3D',' 3Д',' 3d',' 3д'), '', $titles);
        $title=trim($title_text);
        $titles_oll_name=explode(" ",$titles);
        $productionCountrytext = pq($links)->find('#table_6 > tr:nth-child(6) > td:nth-child(2) > p')->text();
        $productionCountry=trim($productionCountrytext);
        $genre = pq($links)->find('#table_6 > tr:nth-child(3) > td:nth-child(2) > p')->text();
        $directortext= pq($links)->find('#table_6 > tr:nth-child(4) > td:nth-child(2) > p')->text();
        $director=trim($directortext);
        $actors = pq($links)->find('#table_6 > tr:nth-child(5) > td:nth-child(2) > p')->text();
        $premiere = pq($links)->find('#table_6 > tr:nth-child(10) > td:nth-child(2) > p')->text();
        $duration_text = pq($links)->find('#table_6 > tr:nth-child(12) > td:nth-child(2) > p')->text();
        $duration_text=explode(" / ",$duration_text);
        $duration=$duration_text[1];
        $long_description = pq($links)->find('div:nth-child(7) > div.add-paddings > div')->text();
        $long_description = preg_replace("/[^ ,.:;()a-zа-яё\d]+/iu", '',$long_description);
        $trailer = pq($links)->find('div:nth-child(7) > div.add-paddings > div  iframe')->attr('src');
        $session = pq($links)->find('#film_dates ')->text();
        $ses = preg_replace("/[^0-9.;: ]/", '', $session);
        $sesia = explode(" ;",$ses);
        array_pop($sesia);
        $rrrrr=array();
        foreach($sesia as $b){
            $array_date_seans = explode(" ", $b);
            $date_sians = $array_date_seans[0];
            $date_sians = date('Y-m-d',strtotime($date_sians));
            $time_sians = $array_date_seans[1];
            if (array_key_exists($date_sians, $rrrrr)) {
                in_array("3D",$titles_oll_name)? $rrrrr[$date_sians][] = $time_sians."(3D)":$rrrrr[$date_sians][] = $time_sians;

                unset($date_sians);
                unset($time_sians);
            } else {
                in_array("3D",$titles_oll_name)? $rrrrr[$date_sians][] = $time_sians."(3D)":$rrrrr[$date_sians][] = $time_sians;
                unset($date_sians);
                unset($time_sians);
            }
        }
        $array_mas_cinemasp[]=[
            'title'=>$title,
            'country'=>$productionCountry,
            'genre'=>$genre,
            'director'=>$director,
            'writer'=>'',
            'produser'=>'',
            'actors'=>$actors,
            'premiere'=>$premiere,
            'imbd'=>'',
            'duration'=>$duration,
            'description'=>$long_description,
            'trailer'=>$trailer,
            'images'=>$image,
            'sessions_cinemas'=>$rrrrr,
        ];
    }
    return $array_mas_cinemasp;
}
function getFilms($cl){
    $ra = array();
    $ury = $cl->request('GET', 'http://pravda-kino.dp.ua/raspfilms.php');
    $body = $ury->getBody();
    $doc = \phpQuery::newDocumentHTML($body);
    $lin = pq($doc)->find('.rasp_info,.rasp_info bg_rasp');
    foreach ($lin as $r){
        $ra[] = pq($r)->find('a')->attr('href');
    }
    $films=array_unique($ra);
    return $films;
}

        
