<?php
  $argsRassegna = array(
  'post_type' => 'rassegna-stampa',
  'posts_per_page' => 1,
  'date_query' => array(
     array(
       'after' => '6 days ago',
     )
   )
  );

  $args = array(
  'post_type' => 'post',
  'posts_per_page' => 7,
  'tax_query' => array(
    array(
        'taxonomy'=> 'icc_altri_filtri',
        'field'   => 'slug',
        'terms'		=> 'InHome',
      ),
    ),
  );
$loopRassegna = new WP_Query( $argsRassegna );
$loopNewsbar = new WP_Query( $args );

if( $loopNewsbar->have_posts() || $loopRassegna->have_posts() ) : ?>
      <div class="row newsbar mx-0">
        <div class="time py-2 col-auto text-center">
          <div id="clockbox"></div>

          <script type="text/javascript">
            var tmonth=["Gen","Feb","Mar","Apr","Mag","Giu","Lug","Ago","Set","Ott","Nov","Dic"];

            function GetClock(){
            var d=new Date();
            var nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();

            var nhour=d.getHours(),nmin=d.getMinutes();
            if(nmin<=9) nmin="0"+nmin

            var clocktext=""+ndate+" "+tmonth[nmonth]+" "+nhour+":"+nmin+"";
            document.getElementById('clockbox').innerHTML=clocktext;
            }

            GetClock();
            setInterval(GetClock,1000);
          </script>



        </div>
        <?php //Thanks to https://www.quackit.com/css/codes/marquees/how_to_pause_a_marquee_on_hover.cfm ?>
        <div class="marquee py-2 col">
          <span>
          <?php while( $loopRassegna->have_posts() ) : $loopRassegna->the_post(); ?>
            <a href="<?php echo the_permalink(); ?>"><h3 class="m-0 d-inline"><?php the_title(); ?></h3></a>
            <?php if ($loopNewsbar->found_posts > 1){echo " | ";} ?>
          <?php endwhile; ?>
          <?php while( $loopNewsbar->have_posts() ) : $loopNewsbar->the_post(); ?>
            <a href="<?php echo the_permalink(); ?>"><h3 class="m-0 d-inline"><?php the_title(); ?></h3></a>
            <?php if (($loopNewsbar->current_post +1) != ($loopNewsbar->post_count)){echo " | ";} ?>
          <?php endwhile; ?>
        </span>
        </div>
      </div>
<?php endif; ?>
