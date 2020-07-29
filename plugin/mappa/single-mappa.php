<?php get_header();?>
<?php
  if(have_posts()) : while(have_posts()) : the_post();
  $icc_article_ID = get_the_ID();

  $term1 = "mapparegione";
  $terms = get_the_terms( $post->ID , $term1 );
  foreach ( $terms as $term ) {
    if($term->slug == "liguria")
     $menuLiguria = 1;
    elseif ($term->slug == "piemonte")
     $menuPiemonte = 1;
  }
  if ($menuLiguria == 1)
    get_template_part('liguria/menu','liguria');
  if ($menuPiemonte == 1)
    get_template_part('piemonte/menu','piemonte');
  wp_reset_postdata();
?>

<div class="single mappa">
  <h1 class="mb-4">La mappa dell'Italia che Cambia</h1>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="row">
				<div class="col-12 col-md-10 order-md-2">
					<div class="container clearfix"><!-- SINGLE -->
						<div class="row">
							<div class="col-12 col-md-6 offset-md-3">
								<?php dynamic_sidebar('singlestart'); ?>
							</div>
						</div>

      			<!-- Categorie -->
      			<div class='single__nav__category'>
      				<a href="/mappa/" class="single__torna__contenuti p-2 mr-3"><i class="fas fa-chevron-left"></i>Vai alla mappa nazionale</a>
      			  <?php

              $term1 = "mapparegione";
              $terms = get_the_terms( $post->ID , $term1 );
              if ($terms != ""){
                //echo "Regione: ";
                foreach ( $terms as $term ) {
                  echo '<form class="d-inline" action="/mappa/" method="post">';
                  if($term->parent == 0){
                    echo '<input type="hidden" name="regione-dropdown" value="'.$term->slug.'">';
                  } else{
                    echo '<input type="hidden" name="regione-dropdown" value="'.get_term($term->parent, $term1)->slug.'">';
                    echo '<input type="hidden" name="provincia-dropdown" value="'.$term->slug.'">';
                  }
                  echo '<input type="submit" name="submit_button" class="btn btn-link text-wrap" value="'.$term->name.'">';
                  echo '</form>';
                }
              }

              echo "<br>";

              $term1 = "mappacategoria";
              $terms = get_the_terms( $post->ID , $term1 );
              $i = 0;
              if ($terms != ""){
                //echo "Categoria: ";
                foreach ( $terms as $term ) {
                  if($i > 0){
                     echo "<span class=''> - </span>";
                  }
                  echo '<form class="d-inline" action="/mappa/" method="post">';
                  echo '<input type="hidden" name="categoria-dropdown" value="'.$term->slug.'">';
                  echo '<input type="submit" name="submit_button" class="btn btn-link text-wrap font-weight-normal" value="'.$term->name.'">';
                  echo '</form>';
                  $i++;
                }
              }

              $term1 = "mapparete";
              $terms = get_the_terms( $post->ID , $term1 );
              if ($terms != ""){
                //echo "Rete: ";
                foreach ( $terms as $term ) {
                  if($i > 0){
                    echo "<span class=''> - </span>";
                  }
                  echo '<form class="d-inline" action="/mappa/" method="post">';
                  echo '<input type="hidden" name="rete-dropdown" value="'.$term->slug.'">';

                  if (substr_count(strtolower($term->name), 'rete') != 0){
                    $nomeRete = $term->name;
                  } else{
                    $nomeRete = "Rete ".$term->name;
                  }
                  echo '<input type="submit" name="submit_button" class="btn btn-link text-wrap font-weight-normal" value="'.$nomeRete.'">';
                  echo '</form>';
                  $i++;
                }
              }

              /*$term1 = "mappatipologia";
              $terms = get_the_terms( $post->ID , $term1 );
              if ($terms != ""){
                echo "Tipologia: ";
                foreach ( $terms as $term ) {
                  echo '<a href="' . get_term_link( $term, $term1 ) . '">' . $term->name . ' </a> ';
                }
              }*/
              ?>
      				<br />
      			</div>

            <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_Chiuso_Motivazione',true))|| !empty (get_post_meta( $icc_article_ID, 'Mappa_Chiuso_Data',true))){ ?>
              <div class="alert alert-danger mt-2" role="alert">
                <?php if(!empty (get_post_meta( $icc_article_ID, 'Mappa_Chiuso_Data',true))) { ?>
                  Data chiusura progetto: <?php echo get_post_meta( $icc_article_ID, 'Mappa_Chiuso_Data',true); ?> <br>
                <?php } ?>
                <?php if(!empty (get_post_meta( $icc_article_ID, 'Mappa_Chiuso_Motivazione',true))){ ?>
                  Motivazione chiusura: <?php echo get_post_meta( $icc_article_ID, 'Mappa_Chiuso_Motivazione',true); ?>
                <?php } ?>
                <p><em>Abbiamo deciso di mostrarti anche le realtà concluse in modo che il loro sapere ed esperienza non vada perduto e possa continuare ad essere di ispirazione</em></p>
              </div>
            <?php } ?>
            <div class="single__head">
              <?php
              if(has_post_thumbnail())
                the_post_thumbnail("",array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
              ?>

      				<!-- Title -->
      				<h1 class="single__title">
      					<?php the_title(); ?>
      				</h1>

      				<!-- Meta Description -->
              <?php if(has_excerpt()){ ?>
        				<h2 class="single__metaDescription">
        					<?php the_excerpt();?>
        				</h2>
              <?php } ?>
            </div>
        			<!-- Share with -->
        			<div class="single__share">
        				<?php
        				if ( function_exists( 'sharing_display' ) ) {
        					sharing_display( '', true );
        				}

        				if ( class_exists( 'Jetpack_Likes' ) ) {
        					$custom_likes = new Jetpack_Likes;
        				echo $custom_likes->post_likes( '' );
        				}
        				 ?>
        			</div>
        			<!-- Content -->
        			<div class="single__articolo">
        				<?php the_content();?>
        			</div>

              <!-- Thumbnail o video youtube -->
                <?php
                if( !empty (get_post_meta( get_the_ID(), 'Mappa_VideoYT',true))){
                  ?>
                  <div class="single__thumbnail">
                    <figure class="embed-responsive embed-responsive-16by9">
                      <iframe width="800" height="480" src="https://www.youtube.com/embed/<?php echo linkifyYouTubeURLs(get_post_meta( get_the_ID(), 'Mappa_VideoYT',true));?>?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                    </figure>
                  </div>
                  <?php
                }
                ?>

              <div class="">
                <?php  include ('single-correlati.php');?>
              </div>



              <!-- Mappa -->
              <?php if(get_post_meta( get_the_ID(), 'Mappa_Latitudine',true) && get_post_meta( get_the_ID(), 'Mappa_Longitudine',true)){ ?>
                <div id="mappa" class="my-3"></div>
                <script>
                    var map = L.map('mappa',{gestureHandling: true}).setView([42.088, 12.564], 6);

                    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                      //attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                      maxZoom: 18,
                      id: 'mapbox/outdoors-v11',
                      tileSize: 512,
                      zoomOffset: -1,
                      accessToken: 'pk.eyJ1IjoiaWNjLW1hcHBhIiwiYSI6ImNrYmpzNWZkcTByeXAzMXBqaGRzM2dmaWoifQ.TYuCegt1hW_2z5qyjDBZkg'
                    }).addTo(map);
                    var markers = L.markerClusterGroup({
                      showCoverageOnHover: false,
                    });

                    var redIcon = L.icon({
                      iconUrl: '<?php echo get_template_directory_uri();?>/plugin/mappa/asset/leaflet/images/marker-icon-red.png',
                      shadowUrl: 'marker-shadow.png',

                      iconSize:     [25, 41], // size of the icon
                      iconAnchor:   [25, 41], // point of the icon which will correspond to marker's location
                      popupAnchor:  [-13, -40] // point from which the popup should open relative to the iconAnchor
                    });
                </script>
                <?php
                  $tuttiIPuntini = "[[".get_post_meta( $icc_article_ID, 'Mappa_Latitudine',true).", ".get_post_meta( $icc_article_ID, 'Mappa_Longitudine',true)."]]";
                ?>
                <script>

                  var title = "<?php echo $popupMappa; ?>";
                  var puntino = L.marker([<?php echo get_post_meta( $icc_article_ID, 'Mappa_Latitudine',true) ?>, <?php echo get_post_meta( $icc_article_ID, 'Mappa_Longitudine',true) ?>],{title: title,<?php if(get_the_terms( $icc_article_ID , 'mappastato' )[0]->slug == "utente" ){echo "icon: redIcon";}?>});
                  puntino.bindPopup(title);
                  markers.addLayer(puntino);

                  map.addLayer(markers);
                  map.fitBounds(<?php echo $tuttiIPuntini; ?>);
                </script>
              <?php } ?>
        			<!-- Box contribuisci fondo articolo -->
        			<?php get_template_part('contribuisci/article','contribuisci'); ?>
        		</div>
        		</div>
        		<div class="col-12 col-md-1 col_single_action">
        			<?php  include("single-action.php"); ?>
        		</div>
		       </article>
	        </div>
	       <?php endwhile; else : ?>

    	  <h3> <?php esc_html_e('Sorry, no posts matched your criteria.', 'icc'); ?> </h3>

	     <?php endif; ?>
	    <div class="row">
		<div class="col-12">

		</div>
		<div class="col-12 col-md-6 offset-md-3">
			<?php dynamic_sidebar('singleend'); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
