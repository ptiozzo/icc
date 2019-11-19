<?php
  $args = array(
  'post_type' => 'post',
  'posts_per_page' => 10,
  'tax_query' => array(
    array(
        'taxonomy'=> 'icc_altri_filtri',
        'field'   => 'slug',
        'terms'		=> 'NewsBar',
    ),
  ),
);
$loopNewsbar = new WP_Query( $args );

if( $loopNewsbar->have_posts() ) : ?>
  <?php
    $i = $loopNewsbar->found_posts;
    $count = 0;
  ?>
  <div class="col-12 order-last newsbar">
    <div class="row">
      <div class="time py-2 col-2 text-center">
        <div id="clockbox"></div>

        <script type="text/javascript">
          var tmonth=["Gen","Feb","Mar","Apr","Mag","Giu","Lug","Ago","Set","Ott","Nov","Dic"];

          function GetClock(){
          var d=new Date();
          var nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();

          var nhour=d.getHours(),nmin=d.getMinutes();
          if(nmin<=9) nmin="0"+nmin

          var clocktext=""+ndate+" "+tmonth[nmonth]+" "+nyear+" "+nhour+":"+nmin+"";
          document.getElementById('clockbox').innerHTML=clocktext;
          }

          GetClock();
          setInterval(GetClock,1000);
        </script>



      </div>
      <?php //Thanks to https://www.quackit.com/css/codes/marquees/how_to_pause_a_marquee_on_hover.cfm ?>
      <div class="marquee py-2 col-10">
        <span>
        <?php while( $loopNewsbar->have_posts() ) : $loopNewsbar->the_post(); $count++; ?>
          <a href="<?php echo the_permalink(); ?>"><h3 class="m-0 d-inline"><?php the_title(); ?></h3></a>
          <?php if ($i > 1 && $count < $i){echo " | ";} ?>
        <?php endwhile; ?>
        <span>
      </div>
    </div>
  </div>
<?php endif; ?>
