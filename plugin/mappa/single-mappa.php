<?php get_header();?>
<?php
  if(have_posts()) : while(have_posts()) : the_post();
  $icc_article_ID = get_the_ID();

  $term1 = "regionemappa";
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

<div class="single">
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
				<?php
				if( strpos($_SERVER["HTTP_REFERER"],"mappa")) { ?>
				<a href="<?php echo home_url(); ?>/mappa/" class="single__torna__contenuti p-2 mr-3"><i class="fas fa-chevron-left"></i> Torna alle mappa</a>
			<?php }

        $term1 = "regionemappa";
        $terms = get_the_terms( $post->ID , $term1 );
        if ($terms != ""){
          echo "Regione: ";
          foreach ( $terms as $term ) {
            echo '<a href="' . get_term_link( $term, $term1 ) . '">' . $term->name . ' </a> ';
          }
        }

        $term1 = "categoria";
        $terms = get_the_terms( $post->ID , $term1 );
        if ($terms != ""){
          echo "Categoria: ";
          foreach ( $terms as $term ) {
            echo '<a href="' . get_term_link( $term, $term1 ) . '">' . $term->name . ' </a> ';
          }
        }

        $term1 = "rete";
        $terms = get_the_terms( $post->ID , $term1 );
        if ($terms != ""){
          echo "Rete: ";
          foreach ( $terms as $term ) {
            echo '<a href="' . get_term_link( $term, $term1 ) . '">' . $term->name . ' </a> ';
          }
        }

        $term1 = "tipologia";
        $terms = get_the_terms( $post->ID , $term1 );
        if ($terms != ""){
          echo "Tipologia: ";
          foreach ( $terms as $term ) {
            echo '<a href="' . get_term_link( $term, $term1 ) . '">' . $term->name . ' </a> ';
          }
        }
        ?>
				<br />
			</div>

      <?php if( !empty (get_post_meta( $icc_article_ID, 'Mappa_Chiuso_Motivazione',true))){ ?>
        <div class="alert alert-danger mt-2" role="alert">
          Il progetto/realtà ha chiuso in data <?php echo get_post_meta( $icc_article_ID, 'Mappa_Chiuso_Data',true); ?> a causa di <?php echo get_post_meta( $icc_article_ID, 'Mappa_Chiuso_Motivazione',true); ?>
        </div>
      <?php } ?>


			<!-- TAG -->
			<div class="single__head">
				<div class="single__tag">
					<?php $post_tags = wp_get_post_tags($post->ID);
					if(!empty($post_tags)) {?>
						<p class="tag"><?php the_tags('', ' ', ''); ?></p>
					<?php } ?>
				</div>
				<!-- Title -->
				<h1 class="single__title">
					<?php the_title(); ?>
				</h1>

				<!-- Meta Description -->
				<h2 class="single__metaDescription">
					<?php the_excerpt();?>
				</h2>
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
      <!-- Mappa -->
      <div id="mappa" class=""></div>
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
        $tuttiIPuntini = "[[".get_post_meta( get_the_ID(), 'Mappa_Latitudine',true).", ".get_post_meta( get_the_ID(), 'Mappa_Longitudine',true)."],"; 
      ?>
      <script>

        var title = "<?php echo $popupMappa; ?>";
        var puntino = L.marker([<?php echo get_post_meta( get_the_ID(), 'Mappa_Latitudine',true) ?>, <?php echo get_post_meta( get_the_ID(), 'Mappa_Longitudine',true) ?>],{title: title,<?php if(get_the_terms( get_the_ID() , 'stato' )[0]->slug == "utente" ){echo "icon: redIcon";}?>});
        puntino.bindPopup(title);
        markers.addLayer(puntino);

      </script>
      <?php
      $tuttiIPuntini .= "]";
      ?>
      <script>
        map.addLayer(markers);
        map.fitBounds(<?php echo $tuttiIPuntini; ?>);
      </script>
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
