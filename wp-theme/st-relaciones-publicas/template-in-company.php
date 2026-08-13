<?php
/**
 * Template Name: In Company
 *
 * Ficha de capacitación in company — los 8 bloques de la maqueta
 * /maqueta-in-company.html: hero, para qué empresas es, qué incluye,
 * modalidades, proceso, casos, formulario de cotización, FAQ.
 * Asignar este template a la página "Capacitaciones In Company" desde
 * Editar página > Atributos de página > Plantilla.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$sent   = isset( $_GET['st_quote'] ) && 'sent' === $_GET['st_quote'];
$error  = isset( $_GET['st_quote'] ) && 'error' === $_GET['st_quote'];
?>

<div class="container breadcrumb">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Inicio', 'st-rrpp' ); ?></a> /
	<?php the_title(); ?>
</div>

<!-- 1. Hero -->
<section class="ic-hero">
	<div class="container">
		<div class="ic-hero-eyebrow"><?php esc_html_e( 'Capacitaciones para empresas', 'st-rrpp' ); ?></div>
		<h1><?php esc_html_e( 'Equipos de comunicación que responden con criterio, no con improvisación', 'st-rrpp' ); ?></h1>
		<p class="lead"><?php esc_html_e( 'Capacitamos a tu equipo completo en Relaciones Públicas y comunicación estratégica, con un programa a medida de tu empresa.', 'st-rrpp' ); ?></p>
		<a href="#cotizar" class="btn btn-coral"><?php esc_html_e( 'Solicitar cotización', 'st-rrpp' ); ?></a>
	</div>
</section>

<!-- 2. Para qué empresas es -->
<section class="perfiles-section">
	<div class="container">
		<div class="section-eyebrow"><?php esc_html_e( '¿Para qué empresas es?', 'st-rrpp' ); ?></div>
		<h2><?php esc_html_e( 'Trabajamos con equipos que necesitan', 'st-rrpp' ); ?></h2>
		<div class="perfiles-grid">
			<div class="perfil-card">
				<h3><?php esc_html_e( 'Unificar criterio de comunicación', 'st-rrpp' ); ?></h3>
				<p><?php esc_html_e( 'Varias personas responden prensa o redes sin un protocolo común y eso genera inconsistencias.', 'st-rrpp' ); ?></p>
			</div>
			<div class="perfil-card">
				<h3><?php esc_html_e( 'Prepararse para una crisis', 'st-rrpp' ); ?></h3>
				<p><?php esc_html_e( 'La empresa creció y todavía no tiene un protocolo de comunicación de crisis definido.', 'st-rrpp' ); ?></p>
			</div>
			<div class="perfil-card">
				<h3><?php esc_html_e( 'Profesionalizar el área de comunicación', 'st-rrpp' ); ?></h3>
				<p><?php esc_html_e( 'El equipo de comunicación es nuevo o mixto y necesita una base sólida en RRPP.', 'st-rrpp' ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- 3. Qué incluye -->
<section class="incluye-section">
	<div class="container">
		<div class="section-eyebrow"><?php esc_html_e( 'Qué incluye', 'st-rrpp' ); ?></div>
		<h2><?php esc_html_e( 'Todo lo que recibe tu equipo', 'st-rrpp' ); ?></h2>
		<div class="check-grid">
			<div class="check-item"><span class="tick">✓</span> <?php esc_html_e( 'Diagnóstico previo sin costo', 'st-rrpp' ); ?></div>
			<div class="check-item"><span class="tick">✓</span> <?php esc_html_e( 'Programa 100% adaptado a tu industria', 'st-rrpp' ); ?></div>
			<div class="check-item"><span class="tick">✓</span> <?php esc_html_e( 'Certificado individual por participante', 'st-rrpp' ); ?></div>
			<div class="check-item"><span class="tick">✓</span> <?php esc_html_e( 'Material y plantillas de trabajo', 'st-rrpp' ); ?></div>
			<div class="check-item"><span class="tick">✓</span> <?php esc_html_e( 'Seguimiento post-capacitación', 'st-rrpp' ); ?></div>
			<div class="check-item"><span class="tick">✓</span> <?php esc_html_e( 'Factura A para la empresa', 'st-rrpp' ); ?></div>
		</div>
	</div>
</section>

<!-- 4. Modalidades -->
<section class="modalidades-section">
	<div class="container">
		<div class="section-eyebrow" style="text-align:center;"><?php esc_html_e( 'Modalidades', 'st-rrpp' ); ?></div>
		<h2 style="text-align:center;"><?php esc_html_e( 'Elegí cómo capacitar a tu equipo', 'st-rrpp' ); ?></h2>
		<div class="modalidades-grid">
			<div class="modalidad-card">
				<div class="icon">💻</div>
				<h3><?php esc_html_e( 'Virtual', 'st-rrpp' ); ?></h3>
				<ul>
					<li><?php esc_html_e( 'En vivo por videollamada', 'st-rrpp' ); ?></li>
					<li><?php esc_html_e( 'Ideal para equipos remotos o distribuidos', 'st-rrpp' ); ?></li>
					<li><?php esc_html_e( 'Grabación disponible', 'st-rrpp' ); ?></li>
				</ul>
			</div>
			<div class="modalidad-card destacada">
				<span class="tag"><?php esc_html_e( 'La más elegida', 'st-rrpp' ); ?></span>
				<div class="icon">🤝</div>
				<h3><?php esc_html_e( 'Híbrida', 'st-rrpp' ); ?></h3>
				<ul>
					<li><?php esc_html_e( 'Encuentros presenciales + seguimiento virtual', 'st-rrpp' ); ?></li>
					<li><?php esc_html_e( 'Combina cercanía con flexibilidad', 'st-rrpp' ); ?></li>
					<li><?php esc_html_e( 'Recomendada para equipos de 10 a 40 personas', 'st-rrpp' ); ?></li>
				</ul>
			</div>
			<div class="modalidad-card">
				<div class="icon">🏢</div>
				<h3><?php esc_html_e( 'Presencial', 'st-rrpp' ); ?></h3>
				<ul>
					<li><?php esc_html_e( 'En las oficinas de tu empresa', 'st-rrpp' ); ?></li>
					<li><?php esc_html_e( 'Dinámicas grupales y simulacros en vivo', 'st-rrpp' ); ?></li>
					<li><?php esc_html_e( 'Mayor interacción con el equipo', 'st-rrpp' ); ?></li>
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- 5. Proceso -->
<section class="proceso-section">
	<div class="container">
		<div class="section-eyebrow"><?php esc_html_e( 'Cómo funciona', 'st-rrpp' ); ?></div>
		<h2><?php esc_html_e( 'El proceso, paso a paso', 'st-rrpp' ); ?></h2>
		<div class="proceso-steps">
			<?php
			$pasos = array(
				array( __( 'Formulario', 'st-rrpp' ), __( 'Nos contás qué necesita tu equipo', 'st-rrpp' ) ),
				array( __( 'Diagnóstico', 'st-rrpp' ), __( 'Analizamos tu situación actual sin costo', 'st-rrpp' ) ),
				array( __( 'Propuesta', 'st-rrpp' ), __( 'Te enviamos un programa a medida y presupuesto', 'st-rrpp' ) ),
				array( __( 'Coordinación', 'st-rrpp' ), __( 'Definimos fechas, modalidad y logística', 'st-rrpp' ) ),
				array( __( 'Capacitación', 'st-rrpp' ), __( 'Dictamos el programa y entregamos certificados', 'st-rrpp' ) ),
			);
			foreach ( $pasos as $i => $paso ) :
				?>
				<div class="proceso-step">
					<div class="num data"><?php echo esc_html( $i + 1 ); ?></div>
					<h4><?php echo esc_html( $paso[0] ); ?></h4>
					<p><?php echo esc_html( $paso[1] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- 6. Casos/testimonios (placeholder) -->
<section class="casos-section">
	<div class="container">
		<div class="section-eyebrow"><?php esc_html_e( 'Casos', 'st-rrpp' ); ?></div>
		<h2><?php esc_html_e( 'Empresas que ya capacitaron a su equipo', 'st-rrpp' ); ?></h2>
		<div class="casos-grid">
			<div class="caso-card">
				<p class="quote">&ldquo;<?php esc_html_e( 'El equipo salió con un protocolo de crisis concreto, no solo con teoría.', 'st-rrpp' ); ?>&rdquo;</p>
				<div class="autor">
					<div class="avatar"></div>
					<div><strong>[ <?php esc_html_e( 'Nombre, cargo', 'st-rrpp' ); ?> ]</strong><span>[ <?php esc_html_e( 'Empresa', 'st-rrpp' ); ?> ]</span></div>
				</div>
			</div>
			<div class="caso-card">
				<p class="quote">&ldquo;<?php esc_html_e( 'Unificamos criterio entre marketing y prensa, algo que veníamos posponiendo hace tiempo.', 'st-rrpp' ); ?>&rdquo;</p>
				<div class="autor">
					<div class="avatar"></div>
					<div><strong>[ <?php esc_html_e( 'Nombre, cargo', 'st-rrpp' ); ?> ]</strong><span>[ <?php esc_html_e( 'Empresa', 'st-rrpp' ); ?> ]</span></div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- 7. Formulario de cotización -->
<section class="form-section" id="cotizar">
	<div class="container">
		<div class="section-eyebrow" style="text-align:center;"><?php esc_html_e( 'Cotización', 'st-rrpp' ); ?></div>
		<h2 style="text-align:center;"><?php esc_html_e( 'Solicitá tu propuesta a medida', 'st-rrpp' ); ?></h2>

		<?php if ( $sent ) : ?>
			<div class="form-card" style="text-align:center;">
				<p style="margin:0;"><?php esc_html_e( '¡Gracias! Recibimos tu solicitud y te vamos a contactar a la brevedad.', 'st-rrpp' ); ?></p>
			</div>
		<?php else : ?>
			<form class="form-card" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="strrpp_in_company_quote">
				<?php wp_nonce_field( 'strrpp_in_company_quote', 'strrpp_quote_nonce' ); ?>
				<input type="text" name="website" value="" style="position:absolute;left:-9999px;" tabindex="-1" autocomplete="off" aria-hidden="true">

				<?php if ( $error ) : ?>
					<p style="color:var(--color-coral);"><?php esc_html_e( 'Hubo un problema al enviar el formulario. Probá de nuevo.', 'st-rrpp' ); ?></p>
				<?php endif; ?>

				<div class="form-grid">
					<div class="form-field">
						<label for="st-nombre"><?php esc_html_e( 'Nombre y apellido', 'st-rrpp' ); ?></label>
						<input type="text" id="st-nombre" name="nombre" required>
					</div>
					<div class="form-field">
						<label for="st-empresa"><?php esc_html_e( 'Empresa', 'st-rrpp' ); ?></label>
						<input type="text" id="st-empresa" name="empresa" required>
					</div>
					<div class="form-field">
						<label for="st-email"><?php esc_html_e( 'Email', 'st-rrpp' ); ?></label>
						<input type="email" id="st-email" name="email" required>
					</div>
					<div class="form-field">
						<label for="st-telefono"><?php esc_html_e( 'Teléfono', 'st-rrpp' ); ?></label>
						<input type="tel" id="st-telefono" name="telefono" required>
					</div>
					<div class="form-field">
						<label for="st-participantes"><?php esc_html_e( 'Cantidad de participantes', 'st-rrpp' ); ?></label>
						<input type="number" id="st-participantes" name="participantes" min="1">
					</div>
					<div class="form-field">
						<label for="st-modalidad"><?php esc_html_e( 'Modalidad preferida', 'st-rrpp' ); ?></label>
						<select id="st-modalidad" name="modalidad">
							<option>Virtual</option>
							<option>Híbrida</option>
							<option>Presencial</option>
							<option><?php esc_html_e( 'No estoy seguro/a todavía', 'st-rrpp' ); ?></option>
						</select>
					</div>
					<div class="form-field full">
						<label for="st-mensaje"><?php esc_html_e( 'Contanos qué necesita tu equipo', 'st-rrpp' ); ?></label>
						<textarea id="st-mensaje" name="mensaje"></textarea>
					</div>
				</div>
				<button type="submit" class="btn btn-coral btn-block"><?php esc_html_e( 'Enviar solicitud', 'st-rrpp' ); ?></button>
			</form>
		<?php endif; ?>
	</div>
</section>

<!-- 8. FAQ decisores -->
<section class="faq-section">
	<div class="container">
		<div class="section-eyebrow" style="text-align:center;"><?php esc_html_e( 'Preguntas frecuentes', 'st-rrpp' ); ?></div>
		<h2 style="text-align:center;"><?php esc_html_e( 'FAQ para quien decide', 'st-rrpp' ); ?></h2>
		<div class="faq-list">
			<details class="faq-item" open>
				<summary><?php esc_html_e( '¿Emiten factura a la empresa?', 'st-rrpp' ); ?> <span class="caret">▾</span></summary>
				<p><?php esc_html_e( 'Sí, emitimos factura A a nombre de la empresa contratante.', 'st-rrpp' ); ?></p>
			</details>
			<details class="faq-item">
				<summary><?php esc_html_e( '¿Cada participante recibe su certificado?', 'st-rrpp' ); ?> <span class="caret">▾</span></summary>
				<p><?php esc_html_e( 'Sí, cada persona que complete la capacitación recibe un certificado individual con su nombre.', 'st-rrpp' ); ?></p>
			</details>
			<details class="faq-item">
				<summary><?php esc_html_e( '¿Se puede personalizar el contenido a nuestra industria?', 'st-rrpp' ); ?> <span class="caret">▾</span></summary>
				<p><?php esc_html_e( 'Sí, el diagnóstico previo sirve justamente para adaptar el programa a tu sector.', 'st-rrpp' ); ?></p>
			</details>
			<details class="faq-item">
				<summary><?php esc_html_e( '¿Con cuánta anticipación hay que coordinar?', 'st-rrpp' ); ?> <span class="caret">▾</span></summary>
				<p><?php esc_html_e( 'Recomendamos al menos 3 semanas entre la propuesta aprobada y la primera fecha de capacitación.', 'st-rrpp' ); ?></p>
			</details>
		</div>
	</div>
</section>

<?php get_footer(); ?>
