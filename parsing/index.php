<?php
require_once 'karavan.php';
//require_once 'materikkion.php';
//include 'karavan.php';
//include 'materikkion.php';
//include 'mostkino.php';
//include 'pravda_kino.php';
//require_once 'pravda_kino.php';
//require_once 'pravda_kino.php';
//$host = 'mistoev.mysql.ukraine.com.ua';
//$user = 'mistoev_db';
//$pass = 'wh7z5eyd';
//$db_connect = mysqli_connect($host, $user, $pass);
//mysqli_select_db($db_connect,'mistoev_db');
//$arrays_dafi_imax = dafi_imax();
//var_dump($arrays_dafi_imax);
//
$arrays_karavan = karavandnepr();
var_dump($arrays_karavan);
//$arrays_materuk_kino = materikkion();
//var_dump($arrays_materuk_kino);
//$arrays_most_kino = mostkino();
//var_dump($arrays_most_kino);
//$arrays_pravda_kino = getFilm();
//var_dump($arrays_pravda_kino);
//$arrays_most_kino;
//$arrays_events = getEvents();
/////////////////////////////////////Караван//////////////////////////////////////////////////////////
//$result = mysqli_query($db_connect, "SELECT director FROM films");
//$i=1;
//while($info = mysqli_fetch_array($result))
//{
//    $arrays_info_db[$i]=$info['director'];
//    $i++;
//}
//$result1 = mysqli_query($db_connect, "SELECT cinema_date FROM cinema_karavan");
//while($info1 = mysqli_fetch_array($result1))
//{
//    $arrays_cinema_dates[]=$info1['cinema_date'];
//}
//if(!isset($arrays_info_db)){
//    if(isset($arrays_karavan)) {
//        foreach ($arrays_karavan as $karavan) {
//            $str = strpos($karavan['director'], ',');
//            if($str != 0) {
//                $karavan['director'] = substr($karavan['director'], 0, $str);
//            }
//            $str1 = str_replace(Chr(194) . Chr(160), Chr(32), $karavan['director']);
//            $karavan['director'] = trim($str1);
//            $r = preg_replace("/[a-zA-Z']/", "", $karavan['actors']);
//            $karavan['actors']=$r;
//            mysqli_query($db_connect, "INSERT INTO films (title, country, genre, director, writer, producer, actors, premiere, rating_imdb, duration, description, trailer, image) VALUES ('" . iconv('utf-8','windows-1251',$karavan['title']) . "', '" . iconv('utf-8','windows-1251',$karavan['country']) . "', '" . iconv('utf-8','windows-1251',$karavan['genre']) . "', '" . iconv('utf-8','windows-1251',$karavan['director']) . "', '" . iconv('utf-8','windows-1251',$karavan['writer']) . "', '" . iconv('utf-8','windows-1251',$karavan['producer']) . "', '" . iconv('utf-8','windows-1251',$karavan['actors']) . "', '" . iconv('utf-8','windows-1251',$karavan['premiere']) . "', '" . $karavan['imbd'] . "', '" . $karavan['duration'] . "', '" . iconv('utf-8','windows-1251',$karavan['description']) . "', '" . $karavan['trailer'] . "', '" . $karavan['images'] . "')");
//            $result = mysqli_query($db_connect, "SELECT MAX(id) FROM films");
//            $film_id= mysqli_fetch_array($result);
//            if(isset($karavan['sessions_cinemas'])) {
//                foreach ($karavan['sessions_cinemas'] as $date => $sessions) {
//                    if (isset($sessions)) {
//                        foreach ($sessions as $session) {
//                            mysqli_query($db_connect, "INSERT INTO cinema_karavan (film_id, cinema_date, sessions) VALUES ('" . $film_id['MAX(id)'] . "', '" . $date . "', '" . $session . "')");
//                        }
//                    }
//                }
//            }
//        }
//    }else{
//
//    }
//}else {
//
//    if (isset($arrays_karavan)) {
//        foreach ($arrays_karavan as $karavan) {
//            $str = strpos($karavan['director'], ',');
//            if($str != 0) {
//                $karavan['director'] = substr($karavan['director'], 0, $str);
//            }
//            $str1 = str_replace(Chr(194) . Chr(160), Chr(32), $karavan['director']);
//            $karavan['director'] = trim($str1);
//            if (in_array(iconv('utf-8', 'windows-1251', $karavan['director']), $arrays_info_db)) {
//                $film_id = array_search(iconv('utf-8', 'windows-1251', $karavan['director']), $arrays_info_db);
//                if(isset($karavan['sessions_cinemas'])) {
//                    foreach ($karavan['sessions_cinemas'] as $date => $sessions) {
//                        if (isset($sessions)) {
//                            foreach ($sessions as $session) {
//                                if(!isset($arrays_cinema_dates)){
//                                    mysqli_query($db_connect, "INSERT INTO cinema_karavan (film_id, cinema_date, sessions) VALUES ('" . $film_id . "', '" . $date . "', '" . $session . "')");
//                                }else {
//                                    if (in_array($date, $arrays_cinema_dates)) {
//                                        mysqli_query($db_connect, "DELETE FROM cinema_karavan WHERE cinema_date='" . $date . "'");
//                                        mysqli_query($db_connect, "INSERT INTO cinema_karavan (film_id, cinema_date, sessions) VALUES ('" . $film_id . "', '" . $date . "', '" . $session . "')");
//                                        $array=array_flip($arrays_cinema_dates);
//                                        unset($array[$date]);
//                                        $arrays_cinema_dates=array_flip($array);
//                                    }else{
//                                        mysqli_query($db_connect, "INSERT INTO cinema_karavan (film_id, cinema_date, sessions) VALUES ('" . $film_id . "', '" . $date . "', '" . $session . "')");
//                                    }
//                                }
//                            }
//                        }
//                    }
//                }
//            } else {
//                $str = strpos($karavan['director'], ',');
//                if($str != 0) {
//                    $karavan['director'] = substr($karavan['director'], 0, $str);
//                }
//                $str1 = str_replace(Chr(194) . Chr(160), Chr(32), $karavan['director']);
//                $karavan['director'] = trim($str1);
//                mysqli_query($db_connect, "INSERT INTO films (title, country, genre, director, writer, producer, actors, premiere, rating_imdb, duration, description, trailer, image) VALUES ('" . iconv('utf-8', 'windows-1251', $karavan['title']) . "', '" . iconv('utf-8', 'windows-1251', $karavan['country']) . "', '" . iconv('utf-8', 'windows-1251', $karavan['genre']) . "', '" . iconv('utf-8', 'windows-1251', $karavan['director']) . "', '" . iconv('utf-8', 'windows-1251', $karavan['writer']) . "', '" . iconv('utf-8', 'windows-1251', $karavan['producer']) . "', '" . iconv('utf-8', 'windows-1251', $karavan['actors']) . "', '" . iconv('utf-8', 'windows-1251', $karavan['premiere']) . "', '" . $karavan['imbd'] . "', '" . $karavan['duration'] . "', '" . iconv('utf-8', 'windows-1251', $karavan['description']) . "', '" . $karavan['trailer'] . "', '" . $karavan['images'] . "')");
//                $result = mysqli_query($db_connect, "SELECT MAX(id) FROM films");
//                $film_id = mysqli_fetch_array($result);
//                if(isset($karavan['sessions_cinemas'])) {
//                    foreach ($karavan['sessions_cinemas'] as $date => $sessions) {
//                        if (isset($sessions)) {
//                            foreach ($sessions as $session) {
//                                mysqli_query($db_connect, "INSERT INTO cinema_karavan (film_id, cinema_date, sessions) VALUES ('" . $film_id['MAX(id)'] . "', '" . $date . "', '" . $session . "')");
//                            }
//                        }
//                    }
//                }
//            }
//        }
//    }else{
//    }
//}
//
///////////////////////////////////////Дафі Макс//////////////////////////////////////////////////////
//$result = mysqli_query($db_connect, "SELECT director FROM films");
//$i=1;
//while($info = mysqli_fetch_array($result))
//{
//    $arrays_info_db[$i]=$info['director'];
//    $i++;
//}
//$result1 = mysqli_query($db_connect, "SELECT cinema_date FROM cinema_dafi_imax");
//while($info1 = mysqli_fetch_array($result1))
//{
//    $arrays_cinema_dates[]=$info1['cinema_date'];
//}
//if(!isset($arrays_info_db)){
//    if(isset($arrays_dafi_imax)) {
//        foreach ($arrays_dafi_imax as $dafi_imax) {
//            $str = strpos($dafi_imax['director'], ',');
//            if($str != 0) {
//                $dafi_imax['director'] = substr($dafi_imax['director'], 0, $str);
//            }
//            $str1 = str_replace(Chr(194) . Chr(160), Chr(32), $dafi_imax['director']);
//            $dafi_imax['director'] = trim($str1);
//            mysqli_query($db_connect, "INSERT INTO films (title, country, genre, director, writer, producer, actors, premiere, rating_imdb, duration, description, trailer, image) VALUES ('" . iconv('utf-8','windows-1251',$dafi_imax['title']) . "', '" . iconv('utf-8','windows-1251',$dafi_imax['country']) . "', '" . iconv('utf-8','windows-1251',$dafi_imax['genre']) . "', '" . iconv('utf-8','windows-1251',$dafi_imax['director']) . "', '" . iconv('utf-8','windows-1251',$dafi_imax['writer']) . "', '" . iconv('utf-8','windows-1251',$dafi_imax['producer']) . "', '" . iconv('utf-8','windows-1251',$dafi_imax['actors']) . "', '" . iconv('utf-8','windows-1251',$dafi_imax['premiere']) . "', '" . $dafi_imax['imbd'] . "', '" . $dafi_imax['duration'] . "', '" . iconv('utf-8','windows-1251',$dafi_imax['description']) . "', '" . $dafi_imax['trailer'] . "', '" . $dafi_imax['images'] . "')");
//            $result = mysqli_query($db_connect, "SELECT MAX(id) FROM films");
//            $film_id = mysqli_fetch_array($result);
//            if(isset($dafi_imax['sessions_cinemas'])) {
//                foreach ($dafi_imax['sessions_cinemas'] as $date => $sessions) {
//                    if (isset($sessions)) {
//                        foreach ($sessions as $session) {
//                            mysqli_query($db_connect, "INSERT INTO cinema_dafi_imax (film_id, cinema_date, sessions) VALUES ('" . $film_id['MAX(id)'] . "', '" . $date . "', '" . $session . "')");
//                        }
//                    }
//                }
//            }
//        }
//    }else{
//
//    }
//}else {
//    if (isset($arrays_dafi_imax)) {
//        foreach ($arrays_dafi_imax as $dafi_imax) {
//            $str = strpos($dafi_imax['director'], ',');
//            if($str != 0) {
//                $dafi_imax['director'] = substr($dafi_imax['director'], 0, $str);
//            }
//            $str1 = str_replace(Chr(194) . Chr(160), Chr(32), $dafi_imax['director']);
//            $dafi_imax['director'] = trim($str1);
//            if (in_array(iconv('utf-8', 'windows-1251', $dafi_imax['director']), $arrays_info_db)) {
//                $film_id = array_search(iconv('utf-8', 'windows-1251', $dafi_imax['director']), $arrays_info_db);
//                if(isset($dafi_imax['sessions_cinemas'])) {
//                    foreach ($dafi_imax['sessions_cinemas'] as $date => $sessions) {
//                        if (isset($sessions)) {
//                            foreach ($sessions as $session) {
//                                if(!isset($arrays_cinema_dates)){
//                                    mysqli_query($db_connect, "INSERT INTO cinema_dafi_imax (film_id, cinema_date, sessions) VALUES ('" . $film_id . "', '" . $date . "', '" . $session . "')");
//                                }else {
//                                    if (in_array($date, $arrays_cinema_dates)) {
//                                        mysqli_query($db_connect, "DELETE FROM cinema_dafi_imax WHERE cinema_date='" . $date . "'");
//                                        mysqli_query($db_connect, "INSERT INTO cinema_dafi_imax (film_id, cinema_date, sessions) VALUES ('" . $film_id . "', '" . $date . "', '" . $session . "')");
//                                        $array=array_flip($arrays_cinema_dates);
//                                        unset($array[$date]);
//                                        $arrays_cinema_dates=array_flip($array);
//                                    }else{
//                                        mysqli_query($db_connect, "INSERT INTO cinema_dafi_imax (film_id, cinema_date, sessions) VALUES ('" . $film_id . "', '" . $date . "', '" . $session . "')");
//                                    }
//                                }
//                            }
//                        }
//                    }
//                }
//            } else {
//                $str = strpos($dafi_imax['director'], ',');
//                if($str != 0) {
//                    $dafi_imax['director'] = substr($dafi_imax['director'], 0, $str);
//                }
//                $str1 = str_replace(Chr(194) . Chr(160), Chr(32), $dafi_imax['director']);
//                $dafi_imax['director'] = trim($str1);
//                mysqli_query($db_connect, "INSERT INTO films (title, country, genre, director, writer, producer, actors, premiere, rating_imdb, duration, description, trailer, image) VALUES ('" . iconv('utf-8', 'windows-1251', $dafi_imax['title']) . "', '" . iconv('utf-8', 'windows-1251', $dafi_imax['country']) . "', '" . iconv('utf-8', 'windows-1251', $dafi_imax['genre']) . "', '" . iconv('utf-8', 'windows-1251', $dafi_imax['director']) . "', '" . iconv('utf-8', 'windows-1251', $dafi_imax['writer']) . "', '" . iconv('utf-8', 'windows-1251', $dafi_imax['producer']) . "', '" . iconv('utf-8', 'windows-1251', $dafi_imax['actors']) . "', '" . iconv('utf-8', 'windows-1251', $dafi_imax['premiere']) . "', '" . $dafi_imax['imbd'] . "', '" . $dafi_imax['duration'] . "', '" . iconv('utf-8', 'windows-1251', $dafi_imax['description']) . "', '" . $dafi_imax['trailer'] . "', '" . $dafi_imax['images'] . "')");
//                $result = mysqli_query($db_connect, "SELECT MAX(id) FROM films");
//                $film_id = mysqli_fetch_array($result);
//                if(isset($dafi_imax['sessions_cinemas'])) {
//                    foreach ($dafi_imax['sessions_cinemas'] as $date => $sessions) {
//                        if (isset($sessions)) {
//                            foreach ($sessions as $session) {
//                                mysqli_query($db_connect, "INSERT INTO cinema_dafi_imax (film_id, cinema_date, sessions) VALUES ('" . $film_id['MAX(id)'] . "', '" . $date . "', '" . $session . "')");
//                            }
//                        }
//                    }
//                }
//            }
//        }
//    }else{
//
//    }
//}
//
//
///////////////////////////////////////////////////Материк Кіно////////////////////////////////////////////////
//$result = mysqli_query($db_connect, "SELECT director FROM films");
//$i=1;
//while($info = mysqli_fetch_array($result))
//{
//    $arrays_info_db[$i]=$info['director'];
//    $i++;
//}
//$result1 = mysqli_query($db_connect, "SELECT cinema_date FROM cinema_materuk_kino");
//while($info1 = mysqli_fetch_array($result1))
//{
//    $arrays_cinema_dates[]=$info1['cinema_date'];
//}
//if(!isset($arrays_info_db)){
//    if(isset($arrays_materuk_kino)) {
//        foreach ($arrays_materuk_kino as $materuk_kino) {
//            if (isset($materuk_kino['director'])) {
//                $str = strpos($materuk_kino['director'], ',');
//                if ($str != 0) {
//                    $materuk_kino['director'] = substr($materuk_kino['director'], 0, $str);
//                }
//                $str1 = str_replace(Chr(194) . Chr(160), Chr(32), $materuk_kino['director']);
//                $materuk_kino['director'] = trim($str1);
//                mysqli_query($db_connect, "INSERT INTO films (title, country, genre, director, writer, producer, actors, premiere, rating_imdb, duration, description, trailer, image) VALUES ('" . iconv('utf-8', 'windows-1251', $materuk_kino['title']) . "', '" . iconv('utf-8', 'windows-1251', $materuk_kino['country']) . "', '" . iconv('utf-8', 'windows-1251', $materuk_kino['genre']) . "', '" . iconv('utf-8', 'windows-1251', $materuk_kino['director']) . "', '" . iconv('utf-8', 'windows-1251', $materuk_kino['writer']) . "', '" . iconv('utf-8', 'windows-1251', $materuk_kino['producer']) . "', '" . iconv('utf-8', 'windows-1251', $materuk_kino['actors']) . "', '" . iconv('utf-8', 'windows-1251', $materuk_kino['premiere']) . "', '" . $materuk_kino['imbd'] . "', '" . $materuk_kino['duration'] . "', '" . iconv('utf-8', 'windows-1251', $materuk_kino['description']) . "', '" . $materuk_kino['trailer'] . "', '" . $materuk_kino['image'] . "')");
//                $result = mysqli_query($db_connect, "SELECT MAX(id) FROM films");
//                $film_id = mysqli_fetch_array($result);
//                foreach ($materuk_kino['sessions_cinemas'] as $date => $sessions) {
//                    foreach ($sessions as $session) {
//                        mysqli_query($db_connect, "INSERT INTO cinema_materuk_kino (film_id, cinema_date, sessions) VALUES ('" . $film_id['MAX(id)'] . "', '" . $date . "', '" . $session . "')");
//                    }
//                }
//            }
//        }
//    }else{
//}
//}else {
//    if (isset($arrays_materuk_kino)) {
//            foreach ($arrays_materuk_kino as $materuk_kino) {
//                if(isset($materuk_kino['director'])) {
//                    $str = strpos($materuk_kino['director'], ',');
//                    if ($str != 0) {
//                        $materuk_kino['director'] = substr($materuk_kino['director'], 0, $str);
//                    }
//                    $str1 = str_replace(Chr(194) . Chr(160), Chr(32), $materuk_kino['director']);
//                    $materuk_kino['director'] = trim($str1);
//                    if (in_array(iconv('utf-8', 'windows-1251', $materuk_kino['director']), $arrays_info_db)) {
//                        $film_id = array_search(iconv('utf-8', 'windows-1251', $materuk_kino['director']), $arrays_info_db);
//                        if(isset($materuk_kino['sessions_cinemas'])) {
//                            foreach ($materuk_kino['sessions_cinemas'] as $date => $sessions) {
//                                foreach ($sessions as $session) {
//                                    if (!isset($arrays_cinema_dates)) {
//                                        mysqli_query($db_connect, "INSERT INTO cinema_materuk_kino (film_id, cinema_date, sessions) VALUES ('" . $film_id . "', '" . $date . "', '" . $session . "')");
//                                    } else {
//                                        if (in_array($date, $arrays_cinema_dates)) {
//                                            mysqli_query($db_connect, "DELETE FROM cinema_materuk_kino WHERE cinema_date='" . $date . "'");
//                                            mysqli_query($db_connect, "INSERT INTO cinema_materuk_kino (film_id, cinema_date, sessions) VALUES ('" . $film_id . "', '" . $date . "', '" . $session . "')");
//                                            $array = array_flip($arrays_cinema_dates);
//                                            unset($array[$date]);
//                                            $arrays_cinema_dates = array_flip($array);
//                                        } else {
//                                            mysqli_query($db_connect, "INSERT INTO cinema_materuk_kino (film_id, cinema_date, sessions) VALUES ('" . $film_id . "', '" . $date . "', '" . $session . "')");
//                                        }
//                                    }
//                                }
//                            }
//                        }
//                    } else {
//                        $str = strpos($materuk_kino['director'], ',');
//                        if ($str != 0) {
//                            $materuk_kino['director'] = substr($materuk_kino['director'], 0, $str);
//                        }
//                        $str1 = str_replace(Chr(194) . Chr(160), Chr(32), $materuk_kino['director']);
//                        $materuk_kino['director'] = trim($str1);
//                        mysqli_query($db_connect, "INSERT INTO films (title, country, genre, director, writer, producer, actors, premiere, rating_imdb, duration, description, trailer, image) VALUES ('" . iconv('utf-8', 'windows-1251', $materuk_kino['title']) . "', '" . iconv('utf-8', 'windows-1251', $materuk_kino['country']) . "', '" . iconv('utf-8', 'windows-1251', $materuk_kino['genre']) . "', '" . iconv('utf-8', 'windows-1251', $materuk_kino['director']) . "', '" . iconv('utf-8', 'windows-1251', $materuk_kino['writer']) . "', '" . iconv('utf-8', 'windows-1251', $materuk_kino['producer']) . "', '" . iconv('utf-8', 'windows-1251', $materuk_kino['actors']) . "', '" . iconv('utf-8', 'windows-1251', $materuk_kino['premiere']) . "', '" . $materuk_kino['imbd'] . "', '" . $materuk_kino['duration'] . "', '" . iconv('utf-8', 'windows-1251', $materuk_kino['description']) . "', '" . $materuk_kino['trailer'] . "', '" . $materuk_kino['image'] . "')");
//                        $result = mysqli_query($db_connect, "SELECT MAX(id) FROM films");
//                        $film_id = mysqli_fetch_array($result);
//                        if(isset($materuk_kino['sessions_cinemas'])) {
//                            foreach ($materuk_kino['sessions_cinemas'] as $date => $sessions) {
//                                foreach ($sessions as $session) {
//                                    mysqli_query($db_connect, "INSERT INTO cinema_materuk_kino (film_id, cinema_date, sessions) VALUES ('" . $film_id['MAX(id)'] . "', '" . $date . "', '" . $session . "')");
//                                }
//                            }
//                        }
//                    }
//                }
//            }
//    }else{
//
//    }
//}
//
//
//////////////////////////////////////////////Мост Кіно///////////////////////////////////////////////////////////
//$result = mysqli_query($db_connect, "SELECT director FROM films");
//$i=1;
//while($info = mysqli_fetch_array($result))
//{
//    $arrays_info_db[$i]=$info['director'];
//    $i++;
//}
//$result1 = mysqli_query($db_connect, "SELECT cinema_date FROM cinema_most_kino");
//while($info1 = mysqli_fetch_array($result1))
//{
//    $arrays_cinema_dates[]=$info1['cinema_date'];
//}
//if(!isset($arrays_info_db)){
//    if(isset($arrays_most_kino)) {
//        foreach ($arrays_most_kino as $most_kino) {
//            if(isset($most_kino['director'])) {
//                $str = strpos($most_kino['director'], ',');
//                if ($str != 0) {
//                    $most_kino['director'] = substr($most_kino['director'], 0, $str);
//                }
//                $str1 = str_replace(Chr(194) . Chr(160), Chr(32), $most_kino['director']);
//                $most_kino['director'] = trim($str1);
//                mysqli_query($db_connect, "INSERT INTO films (title, country, genre, director, writer, producer, actors, premiere, rating_imdb, duration, description, trailer, image) VALUES ('" . iconv('utf-8', 'windows-1251', $most_kino['title']) . "', '" . iconv('utf-8', 'windows-1251', $most_kino['country']) . "', '" . iconv('utf-8', 'windows-1251', $most_kino['genre']) . "', '" . iconv('utf-8', 'windows-1251', $most_kino['director']) . "', '" . iconv('utf-8', 'windows-1251', $most_kino['writer']) . "', '" . iconv('utf-8', 'windows-1251', $most_kino['producer']) . "', '" . iconv('utf-8', 'windows-1251', $most_kino['actors']) . "', '" . iconv('utf-8', 'windows-1251', $most_kino['premiere']) . "', '" . $most_kino['imbd'] . "', '" . $most_kino['duration'] . "', '" . iconv('utf-8', 'windows-1251', $most_kino['description']) . "', '" . $most_kino['trailer'] . "', '" . $most_kino['image'] . "')");
//                $result = mysqli_query($db_connect, "SELECT MAX(id) FROM films");
//                $film_id = mysqli_fetch_array($result);
//                foreach ($most_kino['sessions_cinemas'] as $date => $sessions) {
//                    foreach ($sessions as $session) {
//                        mysqli_query($db_connect, "INSERT INTO cinema_most_kino (film_id, cinema_date, sessions) VALUES ('" . $film_id['MAX(id)'] . "', '" . $date . "', '" . $session . "')");
//                    }
//                }
//            }
//        }
//    }else{
//
//    }
//}else {
//    if (isset($arrays_most_kino)) {
//        foreach ($arrays_most_kino as $most_kino) {
//            if(isset($most_kino['director'])) {
//                $str = strpos($most_kino['director'], ',');
//                if ($str != 0) {
//                    $most_kino['director'] = substr($most_kino['director'], 0, $str);
//                }
//                $str1 = str_replace(Chr(194) . Chr(160), Chr(32), $most_kino['director']);
//                $most_kino['director'] = trim($str1);
//                if (in_array(iconv('utf-8', 'windows-1251', $most_kino['director']), $arrays_info_db)) {
//                    $film_id = array_search(iconv('utf-8', 'windows-1251', $most_kino['director']), $arrays_info_db);
//                    if(isset($most_kino['sessions_cinemas'])) {
//                        foreach ($most_kino['sessions_cinemas'] as $date => $sessions) {
//                            foreach ($sessions as $session) {
//                                if (!isset($arrays_cinema_dates)) {
//                                    mysqli_query($db_connect, "INSERT INTO cinema_most_kino (film_id, cinema_date, sessions) VALUES ('" . $film_id . "', '" . $date . "', '" . $session . "')");
//                                } else {
//                                    if (in_array($date, $arrays_cinema_dates)) {
//                                        mysqli_query($db_connect, "DELETE FROM cinema_most_kino WHERE cinema_date='" . $date . "'");
//                                        mysqli_query($db_connect, "INSERT INTO cinema_most_kino (film_id, cinema_date, sessions) VALUES ('" . $film_id . "', '" . $date . "', '" . $session . "')");
//                                        $array = array_flip($arrays_cinema_dates);
//                                        unset($array[$date]);
//                                        $arrays_cinema_dates = array_flip($array);
//                                    } else {
//                                        mysqli_query($db_connect, "INSERT INTO cinema_most_kino (film_id, cinema_date, sessions) VALUES ('" . $film_id . "', '" . $date . "', '" . $session . "')");
//                                    }
//                                }
//                            }
//                        }
//                    }
//                } else {
//                    $str = strpos($most_kino['director'], ',');
//                    if ($str != 0) {
//                        $most_kino['director'] = substr($most_kino['director'], 0, $str);
//                    }
//                    $str1 = str_replace(Chr(194) . Chr(160), Chr(32), $most_kino['director']);
//                    $most_kino['director'] = trim($str1);
//                    mysqli_query($db_connect, "INSERT INTO films (title, country, genre, director, writer, producer, actors, premiere, rating_imdb, duration, description, trailer, image) VALUES ('" . iconv('utf-8', 'windows-1251', $most_kino['title']) . "', '" . iconv('utf-8', 'windows-1251', $most_kino['country']) . "', '" . iconv('utf-8', 'windows-1251', $most_kino['genre']) . "', '" . iconv('utf-8', 'windows-1251', $most_kino['director']) . "', '" . iconv('utf-8', 'windows-1251', $most_kino['writer']) . "', '" . iconv('utf-8', 'windows-1251', $most_kino['producer']) . "', '" . iconv('utf-8', 'windows-1251', $most_kino['actors']) . "', '" . iconv('utf-8', 'windows-1251', $most_kino['premiere']) . "', '" . $most_kino['imbd'] . "', '" . $most_kino['duration'] . "', '" . iconv('utf-8', 'windows-1251', $most_kino['description']) . "', '" . $most_kino['trailer'] . "', '" . $most_kino['image'] . "')");
//                    $result = mysqli_query($db_connect, "SELECT MAX(id) FROM films");
//                    $film_id = mysqli_fetch_array($result);
//                    foreach ($most_kino['sessions_cinemas'] as $date => $sessions) {
//                        foreach ($sessions as $session) {
//                            mysqli_query($db_connect, "INSERT INTO cinema_most_kino (film_id, cinema_date, sessions) VALUES ('" . $film_id['MAX(id)'] . "', '" . $date . "', '" . $session . "')");
//                        }
//                    }
//                }
//            }
//        }
//    }else{
//
//    }
//}
//
//
///////////////////////////////////////////////////Правда Кіно//////////////////////////////////////////////////////////////////////////////////////////////////
//$result = mysqli_query($db_connect, "SELECT director FROM films");
//$i=1;
//while($info = mysqli_fetch_array($result))
//{
//    $arrays_info_db[$i]=$info['director'];
//    $i++;
//}
//$result1 = mysqli_query($db_connect, "SELECT cinema_date FROM cinema_pravda_kino");
//while($info1 = mysqli_fetch_array($result1))
//{
//    $arrays_cinema_dates[]=$info1['cinema_date'];
//}
//if(!isset($arrays_info_db)){
//    if(isset($arrays_pravda_kino)) {
//        foreach ($arrays_pravda_kino as $pravda_kino) {
//            $str = strpos($pravda_kino['director'], ',');
//            if($str != 0) {
//                $pravda_kino['director'] = substr($pravda_kino['director'], 0, $str);
//            }
//            $str1 = str_replace(Chr(194) . Chr(160), Chr(32), $pravda_kino['director']);
//            $pravda_kino['director'] = trim($str1);
//            mysqli_query($db_connect, "INSERT INTO films (title, country, genre, director, writer, producer, actors, premiere, rating_imdb, duration, description, trailer, image) VALUES ('" . iconv('utf-8','windows-1251',$pravda_kino['title']) . "', '" . iconv('utf-8','windows-1251',$pravda_kino['country']) . "', '" . iconv('utf-8','windows-1251',$pravda_kino['genre']) . "', '" . iconv('utf-8','windows-1251',trim($pravda_kino['director'])) . "', '" . iconv('utf-8','windows-1251',$pravda_kino['writer']) . "', '" . iconv('utf-8','windows-1251',$pravda_kino['producer']) . "', '" . iconv('utf-8','windows-1251',$pravda_kino['actors']) . "', '" . iconv('utf-8','windows-1251',$pravda_kino['premiere']) . "', '" . $pravda_kino['imbd'] . "', '" . $pravda_kino['duration'] . "', '" . iconv('utf-8','windows-1251',$pravda_kino['description']) . "', '" . $pravda_kino['trailer'] . "', '" . $pravda_kino['images'] . "')");
//            $result = mysqli_query($db_connect, "SELECT MAX(id) FROM films");
//            $film_id = mysqli_fetch_array($result);
//            if(isset($pravda_kino['sessions_cinemas'])) {
//                foreach ($pravda_kino['sessions_cinemas'] as $date => $sessions) {
//                    if (isset($sessions)) {
//                        foreach ($sessions as $session) {
//                            mysqli_query($db_connect, "INSERT INTO cinema_pravda_kino (film_id, cinema_date, sessions) VALUES ('" . $film_id['MAX(id)'] . "', '" . $date . "', '" . $session . "')");
//                        }
//                    }
//                }
//            }
//        }
//    }else{
//
//    }
//}else {
//    if (isset($arrays_pravda_kino)) {
//            foreach ($arrays_pravda_kino as $pravda_kino) {
//                $str1 = str_replace(Chr(194) . Chr(160), Chr(32), $pravda_kino['director']);
//                $pravda_kino['director'] = trim($str1);
//                if (strlen($pravda_kino['director'])!=0) {
//                    $str = strpos($pravda_kino['director'], ',');
//                    if ($str != 0) {
//                        $pravda_kino['director'] = substr($pravda_kino['director'], 0, $str);
//                    }
//                    var_dump(iconv('utf-8', 'windows-1251', trim($pravda_kino['director'])));
//                    var_dump($arrays_info_db);
//                    if (in_array(iconv('utf-8', 'windows-1251', trim($pravda_kino['director'])), $arrays_info_db)) {
//                        $film_id = array_search(iconv('utf-8', 'windows-1251', trim($pravda_kino['director'])), $arrays_info_db);
//                        if (isset($pravda_kino['sessions_cinemas'])) {
//                            foreach ($pravda_kino['sessions_cinemas'] as $date => $sessions) {
//                                if (isset($sessions)) {
//                                    foreach ($sessions as $session) {
//                                        if (!isset($arrays_cinema_dates)) {
//                                            mysqli_query($db_connect, "INSERT INTO cinema_pravda_kino (film_id, cinema_date, sessions) VALUES ('" . $film_id . "', '" . $date . "', '" . $session . "')");
//                                        } else {
//                                            if (in_array($date, $arrays_cinema_dates)) {
//                                                mysqli_query($db_connect, "DELETE FROM cinema_pravda_kino WHERE cinema_date='" . $date . "'");
//                                                mysqli_query($db_connect, "INSERT INTO cinema_pravda_kino (film_id, cinema_date, sessions) VALUES ('" . $film_id . "', '" . $date . "', '" . $session . "')");
//                                                $array=array_flip($arrays_cinema_dates);
//                                                unset($array[$date]);
//                                                $arrays_cinema_dates=array_flip($array);
//                                            }else{
//                                                mysqli_query($db_connect, "INSERT INTO cinema_pravda_kino (film_id, cinema_date, sessions) VALUES ('" . $film_id . "', '" . $date . "', '" . $session . "')");
//                                            }
//                                        }
//                                    }
//                                }
//                            }
//                        }
//                    } else {
//                        $str = strpos($pravda_kino['director'], ',');
//                        if ($str != 0) {
//                            $pravda_kino['director'] = substr($pravda_kino['director'], 0, $str);
//                        }
//                        $str1 = str_replace(Chr(194) . Chr(160), Chr(32), $pravda_kino['director']);
//                        $pravda_kino['director'] = trim($str1);
//                        mysqli_query($db_connect, "INSERT INTO films (title, country, genre, director, writer, producer, actors, premiere, rating_imdb, duration, description, trailer, image) VALUES ('" . iconv('utf-8', 'windows-1251', $pravda_kino['title']) . "', '" . iconv('utf-8', 'windows-1251', $pravda_kino['country']) . "', '" . iconv('utf-8', 'windows-1251', $pravda_kino['genre']) . "', '" . iconv('utf-8', 'windows-1251', trim($pravda_kino['director'])) . "', '" . iconv('utf-8', 'windows-1251', $pravda_kino['writer']) . "', '" . iconv('utf-8', 'windows-1251', $pravda_kino['producer']) . "', '" . iconv('utf-8', 'windows-1251', $pravda_kino['actors']) . "', '" . iconv('utf-8', 'windows-1251', $pravda_kino['premiere']) . "', '" . $pravda_kino['imbd'] . "', '" . $pravda_kino['duration'] . "', '" . iconv('utf-8', 'windows-1251', $pravda_kino['description']) . "', '" . $pravda_kino['trailer'] . "', '" . $pravda_kino['images'] . "')");
//                        $result = mysqli_query($db_connect, "SELECT MAX(id) FROM films");
//                        $film_id = mysqli_fetch_array($result);
//                        if (isset($pravda_kino['sessions_cinemas'])) {
//                            foreach ($pravda_kino['sessions_cinemas'] as $date => $sessions) {
//                                if (isset($sessions)) {
//                                    foreach ($sessions as $session) {
//                                        mysqli_query($db_connect, "INSERT INTO cinema_pravda_kino (film_id, cinema_date, sessions) VALUES ('" . $film_id['MAX(id)'] . "', '" . $date . "', '" . $session . "')");
//                                    }
//                                }
//                            }
//                        }
//                    }
//                }
//            }
//    }else{
//
//    }
//}


/////////////////////////////////////Події/////////////////////////////////////////////////////////////////////
//$result_e = mysqli_query($db_connect, "SELECT event_id FROM events");
//while($info_e = mysqli_fetch_array($result_e))
//{
//    $arrays_info_events[]=$info_e['event_id'];
//}
//if(!isset($arrays_info_events)){
//    l:
//    if(isset($arrays_events)) {
//        foreach ($arrays_events as $event) {
//            mysqli_query($db_connect, "INSERT INTO events (event_id, title, photo, description, event_date, name_institution, country, city, street, latitude, longitude) VALUES ('" . $event['id'] . "', '" . $event['name'] . "', '" . $event['cover']['source'] . "', '" . $event['description'] . "', '" . $event['start_time'] . "', '" . $event['place']['name'] . "', '" . $event['place']['location']['country'] . "', '" . $event['place']['location']['city'] . "', '" . $event['place']['location']['street'] . "', '" . $event['place']['location']['latitude'] . "', '" . $event['place']['location']['longitude'] . "')");
//        }
//    }else{
//        goto l;
//    }
//}else{
//    j:
//    if(isset($arrays_events)){
//            foreach ($arrays_events as $event){
//                if(!in_array($event['event_id'], $arrays_info_events)){
//                    mysqli_query($db_connect, "INSERT INTO events (event_id, title, photo, description, event_date, name_institution, country, city, street, latitude, longitude) VALUES ('" . $event['id'] . "', '" . $event['name'] . "', '" . $event['cover']['source'] . "', '" . $event['description'] . "', '" . $event['start_time'] . "', '" . $event['place']['name'] . "', '" . $event['place']['location']['country'] . "', '" . $event['place']['location']['city'] . "', '" . $event['place']['location']['street'] . "', '" . $event['place']['location']['latitude'] . "', '" . $event['place']['location']['longitude'] . "')");
//                }
//            }
//    }else{
//        goto j;
//    }
//}

//mysqli_close($db_connect);