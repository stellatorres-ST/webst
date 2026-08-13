<?php
/**
 * Integración con LearnDash + WooCommerce para el escritorio del alumno.
 *
 * Todas las funciones son "safe": si LearnDash o WooCommerce no están
 * activos, devuelven arrays vacíos en vez de fatal error, para que el
 * theme funcione durante la instalación antes de activar los plugins.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function strrpp_ld_active() {
	return function_exists( 'learndash_user_get_enrolled_courses' ) && function_exists( 'learndash_course_progress' );
}

/**
 * Todos los cursos del alumno con % de avance y estado.
 * Devuelve: array de ['id','title','permalink','thumbnail','percentage','status'].
 */
function strrpp_get_user_courses( $user_id ) {
	if ( ! strrpp_ld_active() ) {
		return array();
	}

	$course_ids = learndash_user_get_enrolled_courses( $user_id, array(), true );
	$courses    = array();

	foreach ( $course_ids as $course_id ) {
		$progress = learndash_course_progress( array(
			'user_id'   => $user_id,
			'course_id' => $course_id,
			'array'     => true,
		) );

		$percentage = isset( $progress['percentage'] ) ? (int) $progress['percentage'] : 0;
		$status     = 'sin-empezar';
		if ( $percentage >= 100 ) {
			$status = 'completado';
		} elseif ( $percentage > 0 ) {
			$status = 'en-curso';
		}

		$courses[] = array(
			'id'         => $course_id,
			'title'      => get_the_title( $course_id ),
			'permalink'  => get_permalink( $course_id ),
			'thumbnail'  => get_the_post_thumbnail_url( $course_id, 'medium' ),
			'percentage' => $percentage,
			'status'     => $status,
		);
	}

	return $courses;
}

/**
 * El curso "en curso" con actividad más reciente, para el bloque
 * "Continuar donde quedé". Si no hay ninguno en curso, devuelve null.
 */
function strrpp_get_continue_course( $user_id ) {
	$courses = strrpp_get_user_courses( $user_id );
	foreach ( $courses as $course ) {
		if ( 'en-curso' === $course['status'] ) {
			return $course;
		}
	}
	return null;
}

/**
 * Certificados de cursos completados.
 * Devuelve: array de ['course_id','title','date','url'].
 */
function strrpp_get_user_certificates( $user_id ) {
	if ( ! strrpp_ld_active() || ! function_exists( 'learndash_get_course_certificate_link' ) ) {
		return array();
	}

	$certificates = array();
	$courses      = strrpp_get_user_courses( $user_id );

	foreach ( $courses as $course ) {
		if ( 'completado' !== $course['status'] ) {
			continue;
		}
		$cert_url = learndash_get_course_certificate_link( $course['id'], $user_id );
		if ( ! $cert_url ) {
			continue;
		}
		$completed_on = function_exists( 'learndash_user_get_course_completed_date' )
			? learndash_user_get_course_completed_date( $user_id, $course['id'] )
			: '';

		$certificates[] = array(
			'course_id' => $course['id'],
			'title'     => $course['title'],
			'date'      => $completed_on,
			'url'       => $cert_url,
		);
	}

	return $certificates;
}

/**
 * Historial de compras del alumno (pedidos WooCommerce).
 * Devuelve: array de ['id','date','total','status','items'].
 */
function strrpp_get_user_orders( $user_id ) {
	if ( ! function_exists( 'wc_get_orders' ) ) {
		return array();
	}

	$orders = wc_get_orders( array(
		'customer' => $user_id,
		'limit'    => -1,
		'orderby'  => 'date',
		'order'    => 'DESC',
	) );

	$out = array();
	foreach ( $orders as $order ) {
		$items = array();
		foreach ( $order->get_items() as $item ) {
			$items[] = $item->get_name();
		}
		$out[] = array(
			'id'     => $order->get_id(),
			'date'   => $order->get_date_created() ? $order->get_date_created()->date_i18n( 'j M Y' ) : '',
			'total'  => $order->get_formatted_order_total(),
			'status' => wc_get_order_status_name( $order->get_status() ),
			'items'  => implode( ', ', $items ),
		);
	}
	return $out;
}

/**
 * Notificación in-app + mail con certificado al completar un curso.
 */
function strrpp_on_course_completed( $data ) {
	if ( empty( $data['user'] ) || empty( $data['course'] ) ) {
		return;
	}

	$user      = $data['user'];
	$course_id = is_object( $data['course'] ) ? $data['course']->ID : (int) $data['course'];

	// Notificación in-app: se guarda y se muestra una vez en el escritorio.
	update_user_meta( $user->ID, 'st_new_certificate_course', $course_id );

	// Mail con el certificado (si LearnDash no lo envía ya por su cuenta).
	if ( function_exists( 'learndash_get_course_certificate_link' ) ) {
		$cert_url = learndash_get_course_certificate_link( $course_id, $user->ID );
		$subject  = sprintf( /* translators: %s: nombre del curso */ __( '¡Completaste %s! Tu certificado está listo', 'st-rrpp' ), get_the_title( $course_id ) );
		$body     = sprintf(
			/* translators: 1: nombre, 2: curso, 3: link certificado */
			__( "Hola %1\$s,\n\n¡Felicitaciones por completar %2\$s! Descargá tu certificado acá:\n%3\$s\n\nSaludos,\nST Relaciones Públicas", 'st-rrpp' ),
			$user->display_name,
			get_the_title( $course_id ),
			$cert_url ? $cert_url : home_url( '/escritorio/' )
		);
		wp_mail( $user->user_email, $subject, $body );
	}
}
add_action( 'learndash_course_completed', 'strrpp_on_course_completed' );

/**
 * Mensaje de notificación pendiente para mostrar en el escritorio
 * (se limpia después de mostrarlo una vez).
 */
function strrpp_pop_new_certificate_notice( $user_id ) {
	$course_id = get_user_meta( $user_id, 'st_new_certificate_course', true );
	if ( ! $course_id ) {
		return null;
	}
	delete_user_meta( $user_id, 'st_new_certificate_course' );
	return get_the_title( $course_id );
}
