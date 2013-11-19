<?php get_header(); ?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>    
		<!-- do stuff ... -->
		<?php 
			//titulo
			$post = get_post(get_the_ID());
			//todo lo demas
			$metas = get_post_meta(get_the_ID());
			$marca = get_term_by( 'slug', $metas['marca'][0], 'used_car_brand' );
			$fotosDisponibles = unserialize($metas["fotos_galeria"][0]);
			/*
			$coloresDisponibles = unserialize($metas["fotos_color"][0]);
			
			//Load the father model
			$model_terms = wp_get_post_terms($post->ID,"Modelo");
			$model_terms = $model_terms[0];
			$args = array(
					'tax_query' => array(
							array(
									'taxonomy' => 'Modelo',
									'field' => 'id',
									'terms' => $model_terms->term_id
							)
					)
			);
			$query = new WP_Query( $args );
			$autos = $query->posts;
			*/		
		?>
<!-- contenido post -->	
<style type="text/css">
h2 {
	margin: 0;
}
.infoAU {
	border: 1px solid #F0F0F0;
}
/*galeria*/
.pika-stage, .pika-textnav {
  width: 450px;
}
/*galeria*/
</style>
<div class="wrapper clearfix">
	<h3 class="custom_titu_page"><?php echo $post->post_title; ?></h3>
	<div class="grid-box grid-h width100">
		<div class="module mod-box widget_text deepest" style="min-height: 53px;">
			<img src="<?php echo get_template_directory_uri(); ?>/custom/images/banner-pagina-versiones.png" alt="" />
		</div>
	</div>
	<section class="grid-block" id="top-a">
		<div class="grid-box grid-h" style="width: 474px;">
			<div class="module mod-box widget_text deepest" style="min-height: 53px;">
<!-- galeria -->			
<!-- not really needed, i'm using it to center the gallery. -->
			<div class="pikachoose">
				<h4>Galeria</h4>
				<ul id="pikame" >
					<?php for ($i = 0; $i < count($fotosDisponibles); $i++) : ?>
					<li><a href="javascript:void(0);"><img src="<?php echo site_url(); ?>/wp-content/uploads<?php echo $fotosDisponibles[$i]; ?>" /></a><span>This is an example of the basic theme.</span></li>
					<?php endfor;?>
				</ul>
			</div>		
<!-- galeria -->	
			</div>
		</div>
		<div class="grid-box grid-h" style="width: 516px;">
			<div class="module mod-box widget_text deepest" style="min-height: 53px;">
				<div class="grid-box grid-h width100">
					<div class="grid-box grid-h width50">
						<p>Precio $<span><?php echo $metas['price'][0]; ?></span></p>
					</div>
					<div class="grid-box grid-h width50">
						<img src="http://placehold.it/250x46" alt="" />
					</div>
				</div>
				<div class="grid-box grid-h width100">
					<div class="grid-box grid-h width50">
						<img src="http://placehold.it/250x65" alt="" />
					</div>
					<div class="grid-box grid-h width50">
						<img src="http://placehold.it/250x65" alt="" />
					</div>
				</div>
				<div class="grid-box grid-h width100 infoAU" style="height: 204px;">
					<h2 style="text-align: left;">Información General</h2>
					<div style="text-align: center;">
					    <table align="center" width="460">
						    <tbody>
							    <tr>
								    <td>Marca</td>
								    <td><?php echo $marca->name; ?></td>
							    </tr>
							    <tr>
								    <td>Versión</td>
								    <td><?php echo $metas['version'][0]; ?></td>
							    </tr>
							    <tr>
								    <td>Año</td>
								    <td><?php echo $metas['anio'][0]; ?></td>
							    </tr>
							    <tr>
								    <td>Kilometros</td>
								    <td><?php echo $metas['kilometros'][0]; ?></td>
							    </tr>
							    <tr>
								    <td>Color</td>
								    <td><?php echo $metas['color'][0]; ?></td>
							    </tr>
						    </tbody>
					    </table>
					</div>
				</div>
				<div class="grid-box grid-h width100 infoAU" style="height: 145px;">
					<h2 style="text-align: left;">Datos técnicos</h2>
					<div style="text-align: center;">
					    <table align="center" width="460">
						    <tbody>
							    <tr>
								    <td>Motor</td>
								    <td><?php echo $metas['motor'][0]; ?></td>
							    </tr>
							    <tr>
								    <td>Transmision</td>
								    <td><?php echo $metas['transmision'][0]; ?></td>
							    </tr>
							    <tr>
								    <td>Combustible</td>
								    <td><?php echo $metas['combustible'][0]; ?></td>
							    </tr>
						    </tbody>
					    </table>
					</div>
				</div>
				<div class="grid-box grid-h width100 infoAU" style="height: 382px;">
					<h2 style="text-align: left;">Equipamiento</h2>
					<div style="text-align: center;">
					    <table align="center" width="460">
						    <tbody>
							    <tr>
								    <td>ABS</td>
								    <td><?php if ($metas['abs'][0]) { echo 'Si'; } else { echo 'No'; }?></td>
							    </tr>
							    <tr>
								    <td>Airbag</td>
								    <td><?php if ($metas['airbag'][0]) { echo 'Si'; } else { echo 'No'; }?></td>
							    </tr>
							    <tr>
								    <td>Aire Acondicionado</td>
								    <td><?php if ($metas['aire'][0]) { echo 'Si'; } else { echo 'No'; }?></td>
							    </tr>
							    <tr>
								    <td>Alzavidrios Electricost</td>
								    <td><?php if ($metas['alzavidrios'][0]) { echo 'Si'; } else { echo 'No'; }?></td>
							    </tr>
							    <tr>
								    <td>Cuero</td>
								    <td><?php if ($metas['cuero'][0]) { echo 'Si'; } else { echo 'No'; }?></td>
							    </tr>
							    <tr>
								    <td>Cierre Centralizado</td>
								    <td><?php if ($metas['cierre'][0]) { echo 'Si'; } else { echo 'No'; }?></td>
							    </tr>
							    <tr>
								    <td>Dirección Asistida</td>
								    <td><?php if ($metas['direccion'][0]) { echo 'Si'; } else { echo 'No'; }?></td>
							    </tr>
							    <tr>
								    <td>Llantas</td>
								    <td><?php if ($metas['llantas'][0]) { echo 'Si'; } else { echo 'No'; }?></td>
							    </tr>
							    <tr>
								    <td>Neblineros</td>
								    <td><?php if ($metas['neblineros'][0]) { echo 'Si'; } else { echo 'No'; }?></td>
							    </tr>
							    <tr>
								    <td>Sunroof</td>
								    <td><?php if ($metas['techo'][0]) { echo 'Si'; } else { echo 'No'; }?></td>
							    </tr>
							    <tr>
								    <td>Tracción</td>
								    <td><?php if ($metas['traccion'][0]) { echo 'Si'; } else { echo 'No'; }?></td>
							    </tr>
						    </tbody>
					    </table>						
					</div>
				</div>
			</div>
		</div>
	</section>
</div>			
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("#pikame").PikaChoose({
		autoPlay:false,
		transition:[0],
		IESafe:true,
		showTooltips:false,
		showCaption:false,
		text: {previous: "", next: "" },
		startOn:0
	});
}); //fin document ready
</script>
<!-- contenido post -->		
	<?php endwhile; ?>
<?php endif; ?>
			
<?php get_footer(); ?>	