<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/atofighi/phpquery/phpQuery/phpQuery.php';
header('Content-Type: text/html; charset=utf-8');
//header('Content-Type: image/jpeg');
use GuzzleHttp\Client as Client;
use GuzzleHttp\Cookie\FileCookieJar;
function karavandnepr()
{
    function newFormatDateDafimax($date)
    {
        $date = str_replace(
            array('января', 'февраля', 'мая', 'апреля', 'майа', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'),
            array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
            $date);
        return date("m-d", strtotime($date));
    }

    $array_mas_cinemas = array();
    $date = array();
    $date_sians = array();

    $name_cinima = "karavandnepr";
//$postfields = array('Username' => 'csYLisovskiy', 'pw' => 'BLueLake1027', 'Submit' => 'Login');
    $jar = new \GuzzleHttp\Cookie\CookieJar;
    $cookieFile = $_SERVER['DOCUMENT_ROOT'] . '/cookies/karavandnepr.txt';
    $cookieJar2 = new FileCookieJar($cookieFile);
    $http_client = new Client(['base_uri' => 'https://multiplex.ua/', 'cookies' => $cookieJar2]);

    $response = $http_client->request('GET', 'https://multiplex.ua/ua/cinema/karavandnepr');
//echo $body = $response->getBody(true);die(0);
    $body2 = $response->getBody(true);
    $d = phpQuery::newDocumentHTML($body2);
    $td = $d->find("div[class=film]");
//$td = $td->find(" a[class=title]")->attr('href');
//var_dump($td);
    foreach ($td as $key) {
        $pq = pq($key);
        $arr_href = "https://multiplex.ua" . $pq->find("a")->eq(1)->attr('href');
        $arrn[$arr_href] = $pq->find("a")->eq(1)->text();
//    foreach ($arr_films as )

    }
    $arr_films = array_unique($arrn);
var_dump($arr_films);die;
//$count_body4=count($arr_films);
//echo $arr_films[0];
    $n = 0;
    foreach ($arr_films as $k => $v) {
        $response2 = $http_client->request('GET', $k);
        $body3 = $response2->getBody(true);
        $d2 = phpQuery::newDocumentHTML($body3);

        $td8 = $d2->find("div[class=movie_info]");
        $pq8 = pq($td8);
        $title = $v;
        $duration = '';
        $genre = '';
        $actors = '';
        $premiere = '';
        $imbd = '';
        $productionCountry = '';
        $director = '';
        $writer = '';
        $image_movis = "https://multiplex.ua" . $pq8->find("img[class=poster]")->attr('src');
        $trailer = "https://www.youtube.com/watch?v=" . $pq8->find("div[class=trailerbut playtrailer]")->attr('data-trailerid');
        $long_description = $pq8->find("p[class=movie_description]")->text();
        $td3 = $d2->find("div[class=column3] div[class=date_select] ul li");

        $i = 0;
        $td9 = $d2->find("ul[class=movie_credentials] li");
        foreach ($td9 as $key_td9) {
            $pq9 = pq($key_td9)->find("p")->eq(0)->text();

//          $pq9=pq($key_td9)->find("p")->eq(1)->text();
            switch ($pq9) {
                case "Длительность:":
                    $duration = pq($key_td9)->find("p")->eq(1)->text();
                    break;
                case "Жанр:":
                    $genre = pq($key_td9)->find("p")->eq(1)->text();
                    break;
                case "В главных ролях:":
                    $actors = pq($key_td9)->find("p")->eq(1)->text();
                    break;
                case "Дата выхода:":
                    $premiere = pq($key_td9)->find("p")->eq(1)->text();
                    break;
                case "Рейтинг Imdb:":
                    $imbd = pq($key_td9)->find("p")->eq(1)->text();
                    break;
                case "Производство:":
                    $productionCountry = pq($key_td9)->find("p")->eq(1)->text();
                    break;
                case "Режиссер:":
                    $director = pq($key_td9)->find("p")->eq(1)->text();
                    break;
                case "Сценарий:":
                    $writer = pq($key_td9)->find("p")->eq(1)->text();
                    break;
            }

////        var_dump($pq9);
//        $title= explode(":",$pq9);
        }
//    $director=$pq8->find("ul[class=movie_credentials] li p")->eq(5)->text();
//     $writer=$pq8->find("ul[class=movie_credentials] li p")->eq(21)->text();
//    $id_muvis_cinemasp=$body2['events'][$i]['events'][0]['id'];

        foreach ($td3 as $keys) {
            $pq2 = pq($keys);
//       echo $arr_title[]=$pq2->find("img[class=poster]")->attr('src');
            $nn = $pq2->attr('data-selector');
            $str = $pq2->find("p")->text();
            $str = substr($str, stripos($str, ",") + 1);
            $dd= date('Y');
            $bb = trim($str);
            $bb_mous=explode(" ",$bb);
            if($bb_mous[1]=="января"and $dd==2016)
            {
                $dd++;
                $arr_title = $dd.'-'.newFormatDateDafimax($bb);
            }else{
                $arr_title = $dd.'-'.newFormatDateDafimax($bb);
            }

            if (isset($nn)) $enn[$nn] = $arr_title;
        }
        foreach ($enn as $key123 => $value123) {
            $td3 = $d2->find("div[data-selector={$key123}] div[class=cinema]")->eq(0);
            $pq3 = pq($td3);
            $pq4 = pq($td3);
            $str = $pq3->find("p[class=time] span")->text();
            $str_kind = $pq4->find("p[class=tag]")->text();
            $str=trim($str);
            $str_kind=trim($str_kind);
            $str_arr= explode("\n",$str);
            $str_kinds= explode("\n",$str_kind);
            foreach ($str_arr as $key =>$valnn) {
                if(isset($valnn) and !$str_kinds[$key]==='') {
                    echo $valnn."(".trim($str_kinds[$key]).")";
                    $sessions[$value123][] = $valnn."(".trim($str_kinds[$key]).")";
                }elseif($valnn){
                    $sessions[$value123][] = $valnn;
                }
            }
        }
        if($sessions) {
            $array_mas_cinemasp[$n] = [
                'title' => $title,
                'country' => $productionCountry,
                'genre' => $genre,
                'director' => $director,
                'writer' => $writer,
                'produser' => '',
                'actors' => $actors,
                'premiere' => $premiere,
                'imbd' => $imbd,
                'duration' => $duration,
                'description' => $long_description,
                'trailer' => $trailer,
                'images' => $image_movis,
                'sessions_cinemas' => $sessions,
            ];
        }
//        if($n == 4)die;

        $n++;

//    unset($rrrrr);
//    unset($jar);
        unset($sessions);
//    unset($cookieJar2);
//    unset($http_client);
//
    }
    return $array_mas_cinemasp;
}
//var_dump($array_mas_cinemasp[0]);
//var_dump($array_mas_cinemasp[1]);
$nn=karavandnepr();
var_dump($nn);