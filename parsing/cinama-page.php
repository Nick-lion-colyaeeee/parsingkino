<?php
/*
Template Name: Cinema-page
*/
?>
<?php
setlocale(LC_ALL, "ru_RU.UTF-8");
mb_internal_encoding("UTF-8");
mb_regex_encoding("UTF-8");
$host = 'mistoev.mysql.ukraine.com.ua';
$user = 'mistoev_db';
$pass = 'wh7z5eyd';
$db_connect = mysqli_connect($host, $user, $pass);
mysqli_select_db($db_connect, 'mistoev_db');
mysqli_query($db_connect, "SET NAMES 'utf8'");
mysqli_query($db_connect, "SET CHARACTER SET 'utf8'");
if ($_POST['cinema_date']) {
    $date_today = $_POST['cinema_date'];
    $result = mysqli_query($db_connect, "SELECT * FROM films");
    while ($info = mysqli_fetch_array($result)) {
        $arrays_films[] = $info;
    }
    $f = 0;
    foreach ($arrays_films as $films) {
        $result1 = mysqli_query($db_connect, "SELECT sessions FROM cinema_karavan WHERE cinema_date = '" . $date_today . "' AND film_id = " . $films['id']);
        while ($info1 = mysqli_fetch_array($result1)) {
            $cinema_karavan[$films['id']][] = $info1;
        }
        $result2 = mysqli_query($db_connect, "SELECT sessions FROM cinema_dafi_imax WHERE cinema_date = '" . $date_today . "' AND film_id = " . $films['id']);
        while ($info2 = mysqli_fetch_array($result2)) {
            $cinema_dafi_imax[$films['id']][] = $info2;
        }
        $result3 = mysqli_query($db_connect, "SELECT sessions FROM cinema_materuk_kino WHERE cinema_date = '" . $date_today . "' AND film_id = " . $films['id']);
        while ($info3 = mysqli_fetch_array($result3)) {

            $cinema_materuk_kino[$films['id']][] = $info3;

        }
        $result4 = mysqli_query($db_connect, "SELECT sessions FROM cinema_most_kino WHERE cinema_date = '" . $date_today . "' AND film_id = " . $films['id']);
        while ($info4 = mysqli_fetch_array($result4)) {

            $cinema_most_kino[$films['id']][] = $info4;

        }
        $result5 = mysqli_query($db_connect, "SELECT sessions FROM cinema_pravda_kino WHERE cinema_date = '" . $date_today . "' AND film_id = " . $films['id']);
        while ($info5 = mysqli_fetch_array($result5)) {
            $cinema_pravda_kino[$films['id']][] = $info5;

        }
        if (isset($cinema_karavan[$films['id']]) || isset($cinema_dafi_imax[$films['id']]) || isset($cinema_materuk_kino[$films['id']]) || isset($cinema_most_kino[$films['id']]) || isset($cinema_pravda_kino[$films['id']])) {
            $films_vuvid[$f] = $films;
            if (isset($cinema_karavan[$films['id']])) {
                $films_vuvid[$f]['КАРАВАН'] = $cinema_karavan[$films['id']];
            }
            if (isset($cinema_dafi_imax[$films['id']])) {
                $films_vuvid[$f]['Dafi_IMAX'] = $cinema_dafi_imax[$films['id']];
            }
            if (isset($cinema_materuk_kino[$films['id']])) {
                $films_vuvid[$f]['МАТЕРИК-КИНО'] = $cinema_materuk_kino[$films['id']];
            }
            if (isset($cinema_most_kino[$films['id']])) {
                $films_vuvid[$f]['МОСТ-КИНО'] = $cinema_most_kino[$films['id']];
            }
            if (isset($cinema_pravda_kino[$films['id']])) {
                $films_vuvid[$f]['ПРАВДА-КИНО'] = $cinema_pravda_kino[$films['id']];
            }
        }
        $f++;
    }
    echo $cinema_films = json_encode($films_vuvid);
} else {
    $date_today = date('Y-m-d');
    $result = mysqli_query($db_connect, "SELECT * FROM films");
    while ($info = mysqli_fetch_array($result)) {
        $arrays_films[] = $info;
    }
    $f = 0;
    foreach ($arrays_films as $films) {
        $result1 = mysqli_query($db_connect, "SELECT sessions FROM cinema_karavan WHERE cinema_date = '" . $date_today . "' AND film_id = " . $films['id']);
        while ($info1 = mysqli_fetch_array($result1)) {
            $cinema_karavan[$films['id']][] = $info1;
        }
        $result2 = mysqli_query($db_connect, "SELECT sessions FROM cinema_dafi_imax WHERE cinema_date = '" . $date_today . "' AND film_id = " . $films['id']);
        while ($info2 = mysqli_fetch_array($result2)) {
            $cinema_dafi_imax[$films['id']][] = $info2;
        }
        $result3 = mysqli_query($db_connect, "SELECT sessions FROM cinema_materuk_kino WHERE cinema_date = '" . $date_today . "' AND film_id = " . $films['id']);
        while ($info3 = mysqli_fetch_array($result3)) {

            $cinema_materuk_kino[$films['id']][] = $info3;

        }
        $result4 = mysqli_query($db_connect, "SELECT sessions FROM cinema_most_kino WHERE cinema_date = '" . $date_today . "' AND film_id = " . $films['id']);
        while ($info4 = mysqli_fetch_array($result4)) {

            $cinema_most_kino[$films['id']][] = $info4;

        }
        $result5 = mysqli_query($db_connect, "SELECT sessions FROM cinema_pravda_kino WHERE cinema_date = '" . $date_today . "' AND film_id = " . $films['id']);
        while ($info5 = mysqli_fetch_array($result5)) {
            $cinema_pravda_kino[$films['id']][] = $info5;

        }
        if (isset($cinema_karavan[$films['id']]) || isset($cinema_dafi_imax[$films['id']]) || isset($cinema_materuk_kino[$films['id']]) || isset($cinema_most_kino[$films['id']]) || isset($cinema_pravda_kino[$films['id']])) {
            $films_vuvid[$f] = $films;
            if (isset($cinema_karavan[$films['id']])) {
                $films_vuvid[$f]['КАРАВАН'] = $cinema_karavan[$films['id']];
            }
            if (isset($cinema_dafi_imax[$films['id']])) {
                $films_vuvid[$f]['Dafi_IMAX'] = $cinema_dafi_imax[$films['id']];
            }
            if (isset($cinema_materuk_kino[$films['id']])) {
                $films_vuvid[$f]['МАТЕРИК-КИНО'] = $cinema_materuk_kino[$films['id']];
            }
            if (isset($cinema_most_kino[$films['id']])) {
                $films_vuvid[$f]['МОСТ-КИНО'] = $cinema_most_kino[$films['id']];
            }
            if (isset($cinema_pravda_kino[$films['id']])) {
                $films_vuvid[$f]['ПРАВДА-КИНО'] = $cinema_pravda_kino[$films['id']];
            }
        }
        $f++;
    }
}
?>


<?php if (function_exists('is_bbpress') && is_bbpress()) {
    if (function_exists('is_buddypress') && is_buddypress()) {
        get_template_part('buddypress', 'page');
    } else {
        get_template_part('bbpress', 'page');
    }
} elseif (function_exists('is_buddypress') && is_buddypress()) {
    get_template_part('buddypress', 'page');
}
else { ?>
<?php
//Page settings
$d_breacrumb = get_post_meta(get_the_ID(), 'mom_disbale_breadcrumb', true);
$hpt = get_post_meta(get_the_ID(), 'mom_hide_pagetitle', true);
$PS = get_post_meta(get_the_ID(), 'mom_page_share', true);
$PC = get_post_meta(get_the_ID(), 'mom_page_comments', true);
//Page Layout
$custom_page = get_post_meta(get_the_ID(), 'mom_custom_page', true);
$layout = get_post_meta(get_the_ID(), 'mom_page_layout', true);
$right_sidebar = get_post_meta(get_the_ID(), 'mom_right_sidebar', true);
$left_sidebars = get_post_meta(get_the_ID(), 'mom_left_sidebar', true);
/* ==========================================================================
 *                unique posts variable 
   ========================================================================== */
$unique_posts = '';
$unique_posts = get_post_meta(get_queried_object_id(), 'mom_unique_posts', true);

?>
<?php get_header(); ?>
<div class="inner">
    <?php if ($layout == 'fullwidth') { ?>
        <?php if ($d_breacrumb != true) { ?>
            <div class="category-title">
                <?php mom_breadcrumb(); ?>
            </div>
        <?php } ?>
        <?php if ($custom_page) { ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
                <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'theme'), 'after' => '</div>')); ?>
            <?php endwhile; // end of the loop. ?>
            <?php wp_reset_query(); ?>
        <?php } else { ?>
            <div class="base-box page-wrap">
                <?php if ($hpt != true) { ?><h1 class="page-title"><?php the_title(); ?></h1><?php } ?>
                <div class="entry-content">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                        <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'theme'), 'after' => '</div>')); ?>
                    <?php endwhile; // end of the loop. ?>
                    <?php wp_reset_query(); ?>
                    <?php if ($PS == true) mom_posts_share(get_the_ID(), get_permalink()); ?>
                </div> <!-- entry content -->
            </div> <!-- base box -->
            <?php if ($PC == true) comments_template(); ?>
        <?php } // end cutom page  ?>
    <?php } else { //if not full width ?>
    <div class="main_container">
        <div class="main-col">
            <?php if ($d_breacrumb != true) { ?>
                <div class="category-title">
                    <?php mom_breadcrumb(); ?>
                </div>
            <?php } ?>
            <?php if ($custom_page) { ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                    <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'theme'), 'after' => '</div>')); ?>
                <?php endwhile; // end of the loop. ?>
                <?php wp_reset_query(); ?>
            <?php } else { ?>
            <div class="base-box page-wrap">
                <?php if ($hpt != true) { ?><h1 class="page-title"><?php the_title(); ?></h1><?php } ?>
                <div class="entry-content">

                    <style>
                        .clndr {
                            font-family: 'Roboto Condensed';
                        }

                        .col-1-4 {
                            border: 1px solid hsl(0, 0%, 93%);
                        }

                        .col-1-4 img {
                            height: 170px;
                            width: 100%;
                        }

                        .row {
                            margin: 0 -10px;
                            margin-bottom: 20px;

                        }

                        .row:last-child {
                            margin-bottom: 0;
                        }

                        [class*="col-"] {
                            padding: 10px;
                        }

                        p.clip {
                            white-space: nowrap;
                            overflow: hidden;
                            /*padding: 5px;*/
                            text-overflow: ellipsis;
                            /*height: 55px;*/
                            border-bottom: 1px solid hsl(0, 0%, 93%);
                            font-size: 15px;
                            margin-bottom: 10px;
                            padding-bottom: 10px;
                            padding-top: 10px;
                        }

                        .fa {
                            display: inline-block;
                            font: normal normal normal 14px/1 FontAwesome;
                            font-size: inherit;
                            text-rendering: auto;
                            -webkit-font-smoothing: antialiased;
                            -moz-osx-font-smoothing: grayscale;
                        }

                        .event-item .fa {
                            color: hsl(0, 61%, 50%);
                        }

                        .event-item .e-time {
                            float: right;
                        }

                        .event-item .e-place-name {
                            clear: both;
                            font-size: 12px;
                            padding-top: 10px;
                        }

                        @media all and ( min-width: 600px ) {

                            .col-2-3 {
                                float: left;
                                width: 66.66%;
                            }

                            .col-1-2 {
                                float: left;
                                width: 50%;
                            }

                            .col-1-3 {
                                float: left;
                                width: 33.33%;
                            }

                            .col-1-4 {
                                float: left;
                                width: 25%;
                            }

                            .col-1-8 {
                                float: left;
                                width: 12.5%;
                            }

                        }

                        .hidden {
                            display: none;
                        }


                    </style>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
                    <script src="./wp-content/themes/goodnews5/js/all/moment.js"></script>
                    <script src="./wp-content/themes/goodnews5/js/all/clndr.js"></script>
                    <style>
                        .clndr-table tbody {
                            text-align: center;
                        }

                        .clndr-controls {
                            text-align: center;

                        }

                        .clndr-control-button {
                            float: left;
                            cursor: pointer;
                        }

                        .clndr-control-button:hover {
                            color: #cd3333;

                        }

                        .rightalign {
                            float: right;
                        }

                        .clndr-table, .clndr-table tr, .clndr-table td {
                            display: inline-block;
                        }

                        .header-days, .last-month, .next-month {
                            display: none !important;
                        }

                        .clndr-table .day {
                            padding-left: 20px;
                            padding-right: 20px;
                        }

                        .clndr-table td {
                            border: 1px #eee solid;
                        }

                        .clndr-table td:hover {
                            color: #cd3333;
                            cursor: pointer;
                        }
                    </style>

                    <script>
                        jQuery(document).ready(function ($) {
                            moment.locale('ru');
                            $('#events-calendar').clndr({
                                showAdjacentMonths: false,

                            });
                            $(document).on('click', '.clndr-table tbody td', function () {
                                var picked_date = $(this).attr("class").match(/calendar\-day\-(.*?)\s/i);
                                picked_date = picked_date[1];
                                cinemalist(picked_date);
                            });
                            function cinemalist(cinema_date) {
                                $.post('http://misto.news/wp-content/themes/goodnews5/cinama-page.php',
                                    {
                                        cinema_date: cinema_date
                                    },
                                    function (data) {
                                        var cinema_fils;
                                        cinema_fils = $.parseJSON(data);
                                        console.log(cinema_fils);
                                        if (!Array.isArray(cinema_fils)) {
                                            $('div#events-list').empty();
                                            for (key in cinema_fils) {
                                                $('#events-list').append("<div class='col-1-4'><br /><img id='images' src='" + cinema_fils[key].image + "' alt='Smiley face'><br /><h3>" + cinema_fils[key].title + "</h3><br /><p class='clip'>" + cinema_fils[key].description + "</p><br /><div class='e-date'><span class='start-time'>" + cinema_fils[key].genre + "</span></div></div>");
                                            }
                                        }
                                        if (Array.isArray(cinema_fils)) {
                                            $('div#events-list').empty();
                                            for (var i = 0; i < cinema_fils.length; i++) {
                                                //$('#chatlogs').append("<div class='log_b'><img src=" + postHistory[i].avatar + " width='30px'><span class='buyer'>" + postHistory[i].nickname + " : \n</span></br><span class='buyer_msg'>" + postHistory[i].message + "</span></br><span class='date'>" + postHistory[i].date_create_log + "</span><br></div>");
                                                $('#events-list').append("<div class='col-1-4'><br /><img id='images' src='" + cinema_fils[i].image + "' alt='Smiley face'><br /><h3>" + cinema_fils[i].title + "</h3><br /><p class='clip'>" + cinema_fils[i].description + "</p><br /><div class='e-date'><span class='start-time'>" + cinema_fils[i].genre + "</span></div></div>");
                                            }
                                        }
                                    })
                            }


                        });
                    </script>

                    <div id="events-calendar">


                    </div>
                    <div id="events-list">
                        <?php foreach ($films_vuvid as $film) { ?>
                        <div class="row">
                            <div class="col-1-4">
                                <img id="images" src="<?php echo $film['image']; ?>" alt="Smiley face">
                                <h3><?php echo $film['title']; ?></h3>
                                <p class="clip"><?php echo $film['description']; ?></p>
                                <div class="e-date">
                                    <span class="start-time"><?php echo $film['genre']; ?></span>
                                </div>
                            </div>
                            <div>
                                <?php } ?>
                            </div>


                            <script src="https://use.fontawesome.com/c5941aea66.js"></script>


                            <style>
                                .center {
                                    text-align: center;
                                    clear: both;
                                    float: none;
                                }

                                #get-more-events {
                                    cursor: pointer;

                                    background: #cd3333 none repeat scroll 0 0;
                                    margin-top: 17px !important;
                                    padding: 0 50px !important;

                                    border: 0 solid;
                                    color: #ffffff;
                                    display: inline-block;
                                    font-weight: 400;
                                    line-height: 36px;
                                    padding: 0 16px;
                                    text-transform: uppercase;

                                }
                            </style>
                            <link rel="stylesheet" type="text/css"
                                  href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
                            <script
                                src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

                            <?php if ((is_front_page())) {
                                // set up or arguments for our custom query
                                $paged = (get_query_var('page')) ? get_query_var('page') : 1;
                                $year = date('Y');
                                $week = date('W');
                                $query_args = array(
                                    'post_type' => 'post',
                                    'cat' => '-1338',
                                    'posts_per_page' => 15,
                                    'paged' => $paged,
                                    'orderby' => 'ASC',
                                    'year' => $year,
                                    '&w' => $week
                                );
                                // create a new instance of WP_Query
                                $the_query = new WP_Query($query_args);
                                ?>
                                <header class="nb-header blog-title">
                                    <h2 class="nb-title">Все новости</h2>
                                </header>
                                <div class="posts-grid clearfix cols-4 allnewposts">
                                <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); // run the loop ?>
                                    <div class="mom-grid-item">
                                        <div class="base-box blog-post">
                                            <div class="bp-entry">
                                                <?php if (mom_post_image() != false) { ?>
                                                    <div class="post-img">
                                                        <a href="<?php the_permalink(); ?>"></a>
                                                        <?php echo mom_post_image_full('news_in_pics_big', 'big-wide-img'); ?>
                                                    </div> <!--img-->
                                                <?php } ?>
                                                <div class="bp-head">
                                                    <?php mom_posts_meta('bp-meta'); ?>
                                                    <a href="<?php the_permalink(); ?>"><span><?php echo the_title(); ?></span></a>
                                                </div> <!--blog post head-->
                                            </div> <!--entry-->
                                        </div>
                                    </div> <!-- mom-grid -->
                                <?php endwhile; ?>
                                    <div class="mom-grid-item mom-grid-item-show-more">
                                        <a href="#" class="button medium full show-more-posts23"><i
                                                class="dashicons dashicons-update">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="36"
                                                     viewBox="0 0 40 36">
                                                    <path class="cls-1"
                                                          d="M859.926,1083a18,18,0,1,1,17.926-18,1.026,1.026,0,1,1-2.051,0,15.9,15.9,0,1,0-2.184,8.08,1.023,1.023,0,0,1,1.4-.37,1.036,1.036,0,0,1,.364,1.41A17.992,17.992,0,0,1,859.926,1083Zm16.9-16.97a1.084,1.084,0,0,1-.519-0.14l-6.419-3.81a1.034,1.034,0,0,1-.362-1.41,1.021,1.021,0,0,1,1.4-.36l5.6,3.32,3.605-5.18a1.023,1.023,0,1,1,1.679,1.17l-4.148,5.97A1.037,1.037,0,0,1,876.826,1066.03Z"
                                                          transform="translate(-842 -1047)"></path>
                                                </svg>
                                            </i>Показать еще</a>
                                    </div>
                                    </div>

                                    <?php //виджет последние новости ?>

                                <?php endif;
                            } ?>
                            <?php if ((is_front_page())) {
                                $paged = (get_query_var('page')) ? get_query_var('page') : 1;
                                if (!file_exists(dirname(__FILE__) . "/cache/main/mainpage-gallery-" . $paged . ".cache")) :
                                    ob_start();
                                    $query_args = array(
                                        'post_type' => 'post',
                                        'cat' => '1338',
                                        'posts_per_page' => 5,
                                        'paged' => $paged,
                                        'orderby' => 'ASC'
                                    );

                                    $the_query = new WP_Query($query_args);
                                    ?>
                                    <header class="nb-header blog-title">
                                        <h2 class="nb-title">Галерея</h2>
                                    </header>

                                    <div class="posts-grid clearfix cols-4 gallery-news">
                                        <?php if ($the_query->have_posts()) :
                                        while ($the_query->have_posts()) : $the_query->the_post(); // run the loop ?>
                                            <div class="mom-grid-item">
                                                <div class="base-box blog-post">
                                                    <div class="bp-entry">
                                                        <?php if (mom_post_image() != false) { ?>
                                                            <div class="post-img">
                                                                <a href="<?php the_permalink(); ?>"></a>
                                                                <?php echo mom_post_image_full('big-wide-img'); ?>
                                                            </div> <!--img-->
                                                        <?php } ?>
                                                        <div class="bp-head">
                                                            <?php mom_posts_meta('bp-meta'); ?>
                                                            <div class="count-gallery">
                                                                <?php
                                                                // Get all the galleries in the current post
                                                                $galleries = get_post_galleries(get_the_ID(), false);
                                                                $total_gal = count($galleries);


                                                                echo _get_total_images($galleries);
                                                                ?>
                                                            </div>
                                                            <a href="<?php the_permalink(); ?>"><span><?php echo the_title(); ?></span></a>
                                                        </div> <!--blog post head-->
                                                    </div> <!--entry-->
                                                </div>
                                            </div> <!-- mom-grid -->
                                        <?php endwhile; ?>
                                        <div class="mom-grid-item mom-grid-item-show-more">
                                            <a href="#" class="button medium full show-more-posts23"><i
                                                    class="dashicons dashicons-update">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="36"
                                                         viewBox="0 0 40 36">
                                                        <path class="cls-1"
                                                              d="M859.926,1083a18,18,0,1,1,17.926-18,1.026,1.026,0,1,1-2.051,0,15.9,15.9,0,1,0-2.184,8.08,1.023,1.023,0,0,1,1.4-.37,1.036,1.036,0,0,1,.364,1.41A17.992,17.992,0,0,1,859.926,1083Zm16.9-16.97a1.084,1.084,0,0,1-.519-0.14l-6.419-3.81a1.034,1.034,0,0,1-.362-1.41,1.021,1.021,0,0,1,1.4-.36l5.6,3.32,3.605-5.18a1.023,1.023,0,1,1,1.679,1.17l-4.148,5.97A1.037,1.037,0,0,1,876.826,1066.03Z"
                                                              transform="translate(-842 -1047)"></path>
                                                    </svg>
                                                </i>Показать еще</a>
                                        </div>
                                    </div>
                                    <script>
                                        jQuery(document).ready(function () {

                                            var page = 2;
                                            jQuery(".gallery-news .show-more-posts23").bind('click', function (e) {
                                                e.preventDefault();
                                                var search_val = window.location.pathname;
                                                var xhr = jQuery.ajax({
                                                    type: "POST",
                                                    url: "http://misto.news" + "/page/" + page + "/",
                                                    beforeSend: function () {
                                                        jQuery('.gallery-news .button.show-more-posts23 i').addClass('fa-spin');
                                                    },

                                                    complete: function () {
                                                        page++
                                                        jQuery('.gallery-news .button.show-more-posts23 i').removeClass('fa-spin');
                                                        jQuery('.gallery-news .mom-grid-item.mom-grid-item-show-more').last().remove();
                                                        jQuery('.gallery-news .mom-grid-item').last().after(jQuery('.gallery-news .mom-grid-item.mom-grid-item-show-more'));
                                                    },
                                                    cache: false,
                                                    success: function (data) {
                                                        var data = jQuery(data);
                                                        jQuery('.gallery-news').append(data.find('.gallery-news > .mom-grid-item'));
                                                    },
                                                    statusCode: {
                                                        404: function () {
                                                            jQuery(".gallery-news .show-more-posts23").unbind('click')
                                                            xhr.abort()
                                                        }
                                                    },
                                                    global: false
                                                });
                                            });

                                        });
                                    </script>
                                    <?php //виджет галереи ?>
                                    <?php
                                    file_put_contents(dirname(__FILE__) . "/cache/main/mainpage-gallery-" . $paged . ".cache", ob_get_contents());
                                    ob_end_flush();
                                endif;
                                else:
                                    echo file_get_contents(dirname(__FILE__) . "/cache/main/mainpage-gallery-" . $paged . ".cache");
                                    ?>
                                <?php endif;
                            } ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <?php the_content(); ?>
                                <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'theme'), 'after' => '</div>')); ?>
                            <?php endwhile; // end of the loop. ?>
                            <?php wp_reset_query(); ?>
                            <?php if ($PS == true) mom_posts_share(get_the_ID(), get_permalink()); ?>
                        </div> <!-- entry content -->
                    </div> <!-- base box -->


                    <?php if ($PC == true) comments_template(); ?>
                    <?php } ?>
                </div> <!--main column-->
                <?php get_sidebar('secondary'); ?>
                <div class="clear"></div>
            </div> <!--main container-->
            <?php get_sidebar(); ?>
            <?php }// end full width ?>
        </div> <!--main inner-->
        <?php get_footer(); ?>
 <?php } ?>

