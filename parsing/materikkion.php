<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/atofighi/phpquery/phpQuery/phpQuery.php';
require_once 'Classes/PHPExcel.php'; // Подключаем библиотеку PHPExcel
header('Content-Type: text/html; charset=utf-8');
//header('Content-Type: image/jpeg');
use GuzzleHttp\Client as Client;
use GuzzleHttp\Cookie\FileCookieJar;
function materikkion()
{
    $array_mas_cinemas = array();
    $date = array();
    $date_sians = array();

    $name_cinima = "МАТЕРИК-КИНО, Днепр";
//$postfields = array('Username' => 'csYLisovskiy', 'pw' => 'BLueLake1027', 'Submit' => 'Login');
    $jar = new \GuzzleHttp\Cookie\CookieJar;
    $cookieFile = $_SERVER['DOCUMENT_ROOT'] . '/cookies/materikkion.txt';
    $cookieJar2 = new FileCookieJar($cookieFile);
    $http_client = new Client(['base_uri' => 'http://parsing/', 'cookies' => $cookieJar2]);


    $response = $http_client->request('GET', 'https://bilet.privatbank.ua/ec/cinema/tickets-session/?broker_id=KinoTema');
//echo $body = $response->getBody(true);die(0);
    $n = json_decode($response->getBody(true), true);


    $responses2 = $http_client->request('GET', 'https://bilet.privatbank.ua/ec/cinema/main?broker_id=KinoTema&city_id=21&lang=ru&ts={$n[\'ts\']}');
    $responses2->getBody(true);
    $body2 = json_decode($responses2->getBody(true), true);
    $count_body2 = count($body2['events']);
    $count_places_body1 = count($body2['places']);
    $count_places_body2 = $body2['places'];
    for ($i = 0; $i < $count_body2; $i++) {
        $rrrrr = array();
        $rrrrr_clone = array();
//    echo count($body2['events']);
        $image_movis = $body2['events'][$i]['image'];
        $long_description = $body2['events'][$i]['long_description'];
        $actors = $body2['events'][$i]['additional_info']['actors'];
        $genre = $body2['events'][$i]['additional_info']['genres'];
        $releaseyear = $body2['events'][$i]['additional_info']['releaseYear'];
        $productionCountry = $body2['events'][$i]['additional_info']['productionCountry'];
        $director = $body2['events'][$i]['additional_info']['director'];
        $titl = $body2['events'][$i]['events'][0]['name'];
//        $arrName[]=$titl;
         $title=trim(str_replace(array('[2D]','[3D]'),'',$titl));
//    $id_muvis_cinemasp=$body2['events'][$i]['events'][0]['id'];
        $duration = $body2['events'][$i]['additional_info']['duration'];
        foreach ($count_places_body2 as $key) {
        $key2=trim(str_replace(array('[2D]','[3D]'),'',$key['name']));
//             echo $key2;if($key2===$title )echo 2 ;
            if ($key2 === $title and mb_strtolower($key['structure']['name'],'UTF-8') === mb_strtolower($name_cinima,'UTF-8')) {
                if(@in_array($key2,$name_all_film))
                {
                    $array_date_seans = explode(" ", $key['start_date']);
                    $date_sians0 = $array_date_seans[0];
                    $time_sians0 = $array_date_seans[1];
                    $key_3 = array_search($key2, $name_all_film);
//                    echo $key_3;
                    if(array_key_exists($date_sians0,$rrrrr_clone)){
                        $rrrrr_clone[$date_sians0][] = $time_sians0;
                        unset($date_sians0);
                        unset($time_sians0);
                    }else{
                        $rrrrr_clone[$date_sians0][] = $time_sians0;
                        unset($date_sians0);
                        unset($time_sians0);
                    }
                }else {
                    $array_date_seans = explode(" ", $key['start_date']);
                    $date_sians = $array_date_seans[0];
                    $time_sians = $array_date_seans[1];
                    if (array_key_exists($date_sians, $rrrrr)) {
                        $rrrrr[$date_sians][] = $time_sians;
                        unset($date_sians);
                        unset($time_sians);
                    } else {
                        $rrrrr[$date_sians][] = $time_sians;
                        unset($date_sians);
                        unset($time_sians);
                    }
                }
            }

        }
        if(@!in_array($title,$name_all_film)){  $name_all_film[]=$title;};
//if($i==11)
//{  echo
//    var_dump($arrName);die;
//}
        if ($rrrrr) {
            $array_mas_cinemasp[$i] = [
                'title' => $title,
                'country' => $productionCountry,
                'genre' => $genre,
                'director' => $director,
                'writer' => '',
                'produser' => '',
                'actors' => $actors,
                'premiere' => $releaseyear,
                'imbd' => '',
                'duration' => $duration,
                'description' => $long_description,
                'trailer' => '',
                'images' => $image_movis ,
                'sessions_cinemas' => $rrrrr,
            ];
        }elseif($rrrrr_clone)
        {
//            echo $title;
//            echo $key_3;
            $rrrrr_clone0=$array_mas_cinemasp[$key_3]['sessions_cinemas'];
//            var_dump($rrrrr_clone);
//            var_dump($rrrrr_clone0);
            if(isset($rrrrr_clone0)){
            $array_mas_cinemasp[$key_3]['sessions_cinemas']=@ array_merge($rrrrr_clone,$rrrrr_clone0);

//            var_dump($array_mas_cinemasp[$key_3]['title']);
              }
            unset($key_3);
        }
        unset($rrrrr);
        unset($rrrrr_clone);
        unset($rrrrr_clone0);

        unset($jar);
        unset($cookieFile);
        unset($cookieJar2);
        unset($http_client);

    }
//    var_dump($array_mas_cinemasp);
//    var_dump($arrName);die;
    return $array_mas_cinemasp;
    unset($name_all_film);
}
