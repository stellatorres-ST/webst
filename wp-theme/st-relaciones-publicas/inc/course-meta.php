<?php
/**
 * Contenido editable de la ficha de curso (custom fields de WooCommerce).
 *
 * Los cursos son productos WooCommerce. Cada bloque de la ficha se carga
 * desde un custom field del producto (Editar producto > Datos del producto
 * > Campos personalizados, o directo en "Custom Fields" si está visible).
 * Si un campo está vacío se usa un valor de ejemplo para que la página
 * nunca se vea rota mientras se carga contenido real.
 *
 * Claves y formato:
 *
 * _st_hero_eyebrow   Texto simple. Ej: "Curso online · Certificado"
 * _st_hero_meta      3 datos separados por "|". Ej: "8 módulos|20 hs|Certificado incluido"
 * _st_checklist      Un bullet por línea (qué vas a aprender).
 * _st_perfiles       Un perfil por línea, formato "Título::Descripción".
 * _st_programa       Bloques de módulo separados por línea en blanco.
 *                     Primera línea del bloque: "Título::duración".
 *                     Líneas siguientes con "- " = clases del módulo.
 * _st_docente_bio     Texto libre, bio corta del docente para este curso.
 * _st_faq            Preguntas separadas por línea en blanco, formato
 *                     "Pregunta::Respuesta" en la primera línea del bloque.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function strrpp_course_meta( $product_id, $key, $default = '' ) {
	$value = get_post_meta( $product_id, $key, true );
	return '' !== $value ? $value : $default;
}

function strrpp_course_hero_meta( $product_id ) {
	$raw = strrpp_course_meta( $product_id, '_st_hero_meta', '8 módulos|20 hs|Certificado incluido' );
	return array_map( 'trim', explode( '|', $raw ) );
}

function strrpp_course_checklist( $product_id ) {
	$default = "Diseñar un plan de comunicación estratégico de punta a punta\nRedactar gacetillas y comunicados que efectivamente se publiquen\nArmar y mantener una base de contactos de prensa propia\nMedir el impacto de una campaña con indicadores concretos";
	$raw     = strrpp_course_meta( $product_id, '_st_checklist', $default );
	return array_filter( array_map( 'trim', explode( "\n", $raw ) ) );
}

function strrpp_course_perfiles( $product_id ) {
	$default = "Estás empezando en RRPP::Tenés formación en comunicación o marketing pero te falta la práctica concreta.\nYa trabajás en el área::Manejás la comunicación de una marca y necesitás sistematizar lo que hacés.\nSos independiente o freelance::Ofrecés servicios de comunicación y querés un marco profesional para venderlos mejor.";
	$raw     = strrpp_course_meta( $product_id, '_st_perfiles', $default );
	$items   = array();
	foreach ( array_filter( array_map( 'trim', explode( "\n", $raw ) ) ) as $line ) {
		$parts = explode( '::', $line, 2 );
		$items[] = array(
			'titulo' => trim( $parts[0] ),
			'texto'  => isset( $parts[1] ) ? trim( $parts[1] ) : '',
		);
	}
	return $items;
}

function strrpp_course_programa( $product_id ) {
	$default = "Fundamentos de las Relaciones Públicas::3 clases · 2 hs\n- Qué son las RRPP y en qué se diferencian del marketing\n- Públicos y stakeholders\n\nPlanificación estratégica::4 clases · 3 hs\n- Diagnóstico y objetivos\n- Plan de comunicación 360°";
	$raw     = strrpp_course_meta( $product_id, '_st_programa', $default );
	$blocks  = preg_split( "/\n\s*\n/", trim( $raw ) );
	$modulos = array();

	foreach ( $blocks as $block ) {
		$lines = array_filter( array_map( 'trim', explode( "\n", trim( $block ) ) ) );
		if ( empty( $lines ) ) {
			continue;
		}
		$lines      = array_values( $lines );
		$head_parts = explode( '::', array_shift( $lines ), 2 );
		$clases     = array();
		foreach ( $lines as $line ) {
			$clases[] = ltrim( $line, "- \t" );
		}
		$modulos[] = array(
			'titulo'   => trim( $head_parts[0] ),
			'duracion' => isset( $head_parts[1] ) ? trim( $head_parts[1] ) : '',
			'clases'   => $clases,
		);
	}
	return $modulos;
}

function strrpp_course_faq( $product_id ) {
	$default = "¿Necesito experiencia previa? ::No, el curso está pensado para arrancar desde una base de comunicación o marketing.\n\n¿Cuánto tiempo tengo para hacerlo?::El acceso es ilimitado, no vence.";
	$raw     = strrpp_course_meta( $product_id, '_st_faq', $default );
	$blocks  = preg_split( "/\n\s*\n/", trim( $raw ) );
	$faqs    = array();
	foreach ( $blocks as $block ) {
		$parts = explode( '::', trim( $block ), 2 );
		if ( empty( $parts[0] ) ) {
			continue;
		}
		$faqs[] = array(
			'pregunta'  => trim( $parts[0] ),
			'respuesta' => isset( $parts[1] ) ? trim( $parts[1] ) : '',
		);
	}
	return $faqs;
}
