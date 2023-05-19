<?php
/**
 * The template to display the team member's page
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.2
 */

global $TRX_ADDONS_STORAGE;

get_header();

while ( have_posts() ) { the_post();
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'team_member_page itemscope' ); ?>
		itemscope itemtype="http://schema.org/Article">
		
		<section class="team_member_header">	

			<?php
			$meta = get_post_meta(get_the_ID(), 'trx_addons_options', true);

			// Image
			if ( !trx_addons_sc_layouts_showed('featured') && has_post_thumbnail() ) {
				?><div class="team_member_featured">
					<div class="team_member_avatar">
						<?php
						the_post_thumbnail( trx_addons_get_thumb_size('masonry'), array(
									'alt' => get_the_title(),
									'itemprop' => 'image'
									)
								);
						?>
					</div>
				</div>
				<?php
			}
			
			// Title and Description
			?><div class="team_member_description"><?php
				if ( !trx_addons_sc_layouts_showed('title') ) {
					?><h2 class="team_member_title"><?php the_title(); ?></h2><?php
				}
				?>
					<div class="team_member_brief_info">
						<h5 class="team_member_brief_info_title"><?php esc_attr_e('Brief info', 'trx_addons'); ?></h5>
						<div class="team_member_brief_info_text"><?php	the_content( );		?></div>
					</div>
            <?php
                $studiMedici = get_post_meta(get_the_ID(), 'sedi_medico', true);
				if (!empty($studiMedici)) {
					?>
					<div class="team_member_brief_info">
						<h5 class="team_member_brief_info_title">Puoi trovare il medico nelle sedi:</h5>
						<div class="team_member_brief_info_text">
        <?php
            
            $i=1;
            foreach ($studiMedici as $studioMedico){
                switch ($studioMedico){
                    case "1":
                        echo "<a href='/larc-corso-venezia-10/'>CORSO VENEZIA 10 – TORINO</a><br>";
                    break;
                    case 2:
                        echo "<a href='/via-mombarcaro/'>VIA MOMBARCARO 80 – TORINO</a><br>";
                    break;
                    case "3":
                        echo "<a href='/via-don-murialdo/'>VIA DON MURIALDO 37/C - TORINO</a><br>";
                    break;
                    case "4":
                        echo "<a href='/via-freidour/'>VIA FREIDOUR, 1  – TORINO</a><br>";
                    break;
                    case "5":
                        echo "<a href='/larc-giordana2/'>VIA GIORDANA 2 ANG. C.SO RE UMBERTO 64 – TORINO</a><br>";
                    break;
                    case "6":
                        echo "<a href='/cirie/'>VIA D’ORIA, 14/14 – CIRIÈ (TO)</a><br>";
                    break;
                    case "7":
                        echo "<a href='/larc-pinerolo/'>VIA GATTO, 28 – PINEROLO (TO)</a><br>";
                    break;
                    case "8":
                        echo "<a href='/larc-corso-venezia-10/'>ODONTOLARC CORSO VENEZIA 10 – TORINO</a><br>";
                    break;
                    case "9":
                        echo "<a href='/via-mombarcaro/'>ODONTOLARC VIA MOMBARCARO 80 – TORINO</a>";
                    break;
                }
            }
            
        ?>
                        </div>
					</div>
					<?php
				}
				?>
			</div>

		</section>
		</article><?php

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
}

get_footer();
?>