<?php
/**
 * Template Name: Escritorio del Alumno
 *
 * Fuente de referencia: /maqueta-escritorio-alumno.html
 * Vista logueada de LearnDash: continuar donde quedé, mis cursos,
 * certificados, historial de compras. Requiere estar logueado — si no,
 * redirige al login de WordPress con retorno a esta misma página.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_user_logged_in() ) {
	auth_redirect();
	exit;
}

$user       = wp_get_current_user();
$courses    = strrpp_get_user_courses( $user->ID );
$continuar  = strrpp_get_continue_course( $user->ID );
$certs      = strrpp_get_user_certificates( $user->ID );
$orders     = strrpp_get_user_orders( $user->ID );
$new_cert   = strrpp_pop_new_certificate_notice( $user->ID );

$en_curso    = count( array_filter( $courses, fn( $c ) => 'en-curso' === $c['status'] ) );
$completados = count( array_filter( $courses, fn( $c ) => 'completado' === $c['status'] ) );

get_header();
?>

<header class="dash-header">
	<div class="container">
		<h1><?php echo esc_html( sprintf( __( 'Hola, %s 👋', 'st-rrpp' ), $user->first_name ? $user->first_name : $user->display_name ) ); ?></h1>
		<p>
			<?php
			echo esc_html( sprintf(
				/* translators: 1: cursos en curso, 2: cursos completados */
				__( 'Tenés %1$d cursos en curso y %2$d completados.', 'st-rrpp' ),
				$en_curso,
				$completados
			) );
			?>
		</p>
	</div>
</header>

<nav class="dash-nav">
	<div class="container">
		<a href="#" class="active"><?php esc_html_e( 'Mi escritorio', 'st-rrpp' ); ?></a>
		<a href="#mis-cursos"><?php esc_html_e( 'Mis cursos', 'st-rrpp' ); ?></a>
		<a href="#certificados"><?php esc_html_e( 'Certificados', 'st-rrpp' ); ?></a>
		<a href="#compras"><?php esc_html_e( 'Compras', 'st-rrpp' ); ?></a>
	</div>
</nav>

<?php if ( $new_cert ) : ?>
	<div class="container">
		<div class="dash-notice">
			🎉 <?php echo esc_html( sprintf( __( '¡Felicitaciones! Completaste "%s". Tu certificado ya está disponible más abajo y te lo enviamos por mail.', 'st-rrpp' ), $new_cert ) ); ?>
		</div>
	</div>
<?php endif; ?>

<?php if ( ! strrpp_ld_active() ) : ?>
	<div class="container">
		<div class="dash-notice dash-notice-warning">
			<?php esc_html_e( 'LearnDash todavía no está activo — este escritorio se completa automáticamente en cuanto se activan LearnDash y WooCommerce.', 'st-rrpp' ); ?>
		</div>
	</div>
<?php endif; ?>

<?php if ( $continuar ) : ?>
	<section class="dash-section">
		<div class="container">
			<h2><?php esc_html_e( 'Continuar donde quedé', 'st-rrpp' ); ?></h2>
			<div class="continuar-card">
				<div class="continuar-thumb" <?php echo $continuar['thumbnail'] ? 'style="background-image:url(' . esc_url( $continuar['thumbnail'] ) . ');background-size:cover;background-position:center;"' : ''; ?>></div>
				<div class="continuar-body">
					<span class="eyebrow"><?php esc_html_e( 'En curso', 'st-rrpp' ); ?></span>
					<h3><?php echo esc_html( $continuar['title'] ); ?></h3>
					<div class="continuar-progress-row">
						<div class="progress-bar"><span style="width:<?php echo (int) $continuar['percentage']; ?>%"></span></div>
						<span class="pct data"><?php echo (int) $continuar['percentage']; ?>%</span>
					</div>
					<a href="<?php echo esc_url( $continuar['permalink'] ); ?>" class="btn btn-coral" style="align-self:flex-start;"><?php esc_html_e( 'Continuar curso', 'st-rrpp' ); ?></a>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<section class="dash-section" id="mis-cursos">
	<div class="container">
		<h2><?php esc_html_e( 'Mis cursos', 'st-rrpp' ); ?></h2>

		<?php if ( ! empty( $courses ) ) : ?>
			<div class="cursos-filtros" data-dash-filtros>
				<button class="active" data-filter="todos"><?php esc_html_e( 'Todos', 'st-rrpp' ); ?></button>
				<button data-filter="en-curso"><?php esc_html_e( 'En curso', 'st-rrpp' ); ?></button>
				<button data-filter="completado"><?php esc_html_e( 'Completados', 'st-rrpp' ); ?></button>
				<button data-filter="sin-empezar"><?php esc_html_e( 'Sin empezar', 'st-rrpp' ); ?></button>
			</div>
			<div class="mis-cursos-grid" data-dash-cursos>
				<?php foreach ( $courses as $course ) : ?>
					<a href="<?php echo esc_url( $course['permalink'] ); ?>" class="mi-curso-card" data-status="<?php echo esc_attr( $course['status'] ); ?>">
						<div class="mi-curso-thumb" <?php echo $course['thumbnail'] ? 'style="background-image:url(' . esc_url( $course['thumbnail'] ) . ');background-size:cover;background-position:center;"' : ''; ?>>
							<span class="badge badge-<?php echo esc_attr( str_replace( '-', '', $course['status'] ) ); ?>">
								<?php
								$labels = array( 'en-curso' => __( 'En curso', 'st-rrpp' ), 'completado' => __( 'Completado', 'st-rrpp' ), 'sin-empezar' => __( 'Sin empezar', 'st-rrpp' ) );
								echo esc_html( $labels[ $course['status'] ] );
								?>
							</span>
						</div>
						<div class="mi-curso-body">
							<h4><?php echo esc_html( $course['title'] ); ?></h4>
							<div class="mi-curso-progress-row">
								<div class="progress-bar" style="flex:1;"><span style="width:<?php echo (int) $course['percentage']; ?>%"></span></div>
								<span class="pct data"><?php echo (int) $course['percentage']; ?>%</span>
							</div>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<div class="cert-empty">
				<p><?php esc_html_e( 'Todavía no estás inscripto/a en ningún curso.', 'st-rrpp' ); ?></p>
				<a href="<?php echo esc_url( home_url( '/cursos' ) ); ?>" class="btn btn-coral" style="margin-top:12px;"><?php esc_html_e( 'Ver catálogo de cursos', 'st-rrpp' ); ?></a>
			</div>
		<?php endif; ?>
	</div>
</section>

<section class="dash-section" id="certificados">
	<div class="container">
		<h2><?php esc_html_e( 'Mis certificados', 'st-rrpp' ); ?></h2>
		<?php if ( ! empty( $certs ) ) : ?>
			<div class="cert-list">
				<?php foreach ( $certs as $cert ) : ?>
					<div class="cert-item">
						<div class="info">
							<div class="icon">🎓</div>
							<div>
								<h4><?php echo esc_html( $cert['title'] ); ?></h4>
								<?php if ( $cert['date'] ) : ?>
									<span class="date data"><?php echo esc_html( sprintf( __( 'Emitido el %s', 'st-rrpp' ), $cert['date'] ) ); ?></span>
								<?php endif; ?>
							</div>
						</div>
						<a href="<?php echo esc_url( $cert['url'] ); ?>" class="btn btn-outline-navy btn-sm" target="_blank" rel="noopener"><?php esc_html_e( 'Descargar PDF', 'st-rrpp' ); ?></a>
					</div>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<div class="cert-empty">
				<p><?php esc_html_e( 'Todavía no tenés certificados. En cuanto completes tu primer curso, va a aparecer acá.', 'st-rrpp' ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</section>

<section class="dash-section" id="compras">
	<div class="container">
		<h2><?php esc_html_e( 'Historial de compras', 'st-rrpp' ); ?></h2>
		<?php if ( ! empty( $orders ) ) : ?>
			<div style="overflow-x:auto;">
				<table class="historial-table">
					<thead>
						<tr>
							<th><?php esc_html_e( 'Curso', 'st-rrpp' ); ?></th>
							<th><?php esc_html_e( 'Fecha', 'st-rrpp' ); ?></th>
							<th><?php esc_html_e( 'Monto', 'st-rrpp' ); ?></th>
							<th><?php esc_html_e( 'Estado', 'st-rrpp' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $orders as $order ) : ?>
							<tr>
								<td><?php echo esc_html( $order['items'] ); ?></td>
								<td class="data"><?php echo esc_html( $order['date'] ); ?></td>
								<td class="data"><?php echo wp_kses_post( $order['total'] ); ?></td>
								<td class="status-pagado"><?php echo esc_html( $order['status'] ); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php else : ?>
			<div class="cert-empty">
				<p><?php esc_html_e( 'Todavía no registrás compras.', 'st-rrpp' ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
