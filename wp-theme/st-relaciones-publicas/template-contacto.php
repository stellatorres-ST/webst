<?php
/**
 * Template Name: Contacto
 *
 * Fuente de referencia: /maqueta-contacto.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$sent  = isset( $_GET['st_contact'] ) && 'sent' === $_GET['st_contact'];
$error = isset( $_GET['st_contact'] ) && 'error' === $_GET['st_contact'];
?>

<div class="container breadcrumb">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Inicio', 'st-rrpp' ); ?></a> /
	<?php the_title(); ?>
</div>

<section class="contacto-hero">
	<div class="container">
		<h1><?php esc_html_e( 'Hablemos', 'st-rrpp' ); ?></h1>
		<p><?php esc_html_e( 'Contanos qué necesitás y te respondemos a la brevedad.', 'st-rrpp' ); ?></p>
	</div>
</section>

<section>
	<div class="container contacto-inner">
		<div class="contacto-info">
			<div class="info-item">
				<div class="icon">✉️</div>
				<div><h4><?php esc_html_e( 'Email', 'st-rrpp' ); ?></h4><p><?php echo esc_html( get_option( 'admin_email' ) ); ?></p></div>
			</div>
			<div class="info-item">
				<div class="icon">📱</div>
				<div><h4>WhatsApp</h4><p>+54 9 11 [ <?php esc_html_e( 'número', 'st-rrpp' ); ?> ]</p></div>
			</div>
			<div class="info-item">
				<div class="icon">📍</div>
				<div><h4><?php esc_html_e( 'Ubicación', 'st-rrpp' ); ?></h4><p><?php esc_html_e( 'Buenos Aires, Argentina — atención a todo LatAm', 'st-rrpp' ); ?></p></div>
			</div>
			<div>
				<h4 style="font-size:14px;"><?php esc_html_e( 'Redes', 'st-rrpp' ); ?></h4>
				<div class="redes">
					<a href="#" aria-label="Instagram">IG</a>
					<a href="#" aria-label="LinkedIn">in</a>
				</div>
			</div>
		</div>

		<?php if ( $sent ) : ?>
			<div class="form-card" style="text-align:center;">
				<p style="margin:0;"><?php esc_html_e( '¡Gracias! Recibimos tu mensaje y te vamos a responder a la brevedad.', 'st-rrpp' ); ?></p>
			</div>
		<?php else : ?>
			<form class="form-card" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="strrpp_contact">
				<?php wp_nonce_field( 'strrpp_contact', 'strrpp_contact_nonce' ); ?>
				<input type="text" name="website" value="" style="position:absolute;left:-9999px;" tabindex="-1" autocomplete="off" aria-hidden="true">

				<?php if ( $error ) : ?>
					<p style="color:var(--color-coral);"><?php esc_html_e( 'Hubo un problema al enviar el formulario. Probá de nuevo.', 'st-rrpp' ); ?></p>
				<?php endif; ?>

				<div class="form-grid">
					<div class="form-field">
						<label for="c-nombre"><?php esc_html_e( 'Nombre', 'st-rrpp' ); ?></label>
						<input type="text" id="c-nombre" name="nombre" required>
					</div>
					<div class="form-field">
						<label for="c-email"><?php esc_html_e( 'Email', 'st-rrpp' ); ?></label>
						<input type="email" id="c-email" name="email" required>
					</div>
					<div class="form-field full">
						<label for="c-asunto"><?php esc_html_e( 'Asunto', 'st-rrpp' ); ?></label>
						<select id="c-asunto" name="asunto">
							<option><?php esc_html_e( 'Consulta sobre un curso', 'st-rrpp' ); ?></option>
							<option><?php esc_html_e( 'Capacitación in company', 'st-rrpp' ); ?></option>
							<option><?php esc_html_e( 'Consultoría', 'st-rrpp' ); ?></option>
							<option><?php esc_html_e( 'Prensa / speaking', 'st-rrpp' ); ?></option>
							<option><?php esc_html_e( 'Otro', 'st-rrpp' ); ?></option>
						</select>
					</div>
					<div class="form-field full">
						<label for="c-mensaje"><?php esc_html_e( 'Mensaje', 'st-rrpp' ); ?></label>
						<textarea id="c-mensaje" name="mensaje" required></textarea>
					</div>
				</div>
				<button type="submit" class="btn btn-coral btn-block"><?php esc_html_e( 'Enviar mensaje', 'st-rrpp' ); ?></button>
			</form>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
