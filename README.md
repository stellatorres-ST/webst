# ST Relaciones Públicas — Sitio web

Sitio institucional + LMS de ST Relaciones Públicas (consultoría y capacitación en
Relaciones Públicas, Marketing Estratégico y Comunicación), sobre WordPress +
WooCommerce + LearnDash.

## Contenido de este repo

- `maqueta-st-rrpp.html` — maqueta estática de referencia de la homepage.
  Fuente de verdad para tokens de diseño (colores, tipografía, radios,
  espaciados, componentes de botón/card). Abrir directo en el navegador.
- `wp-theme/st-relaciones-publicas/` — theme de WordPress base, construido a
  partir de la maqueta:
  - `style.css` — cabecera del theme (metadata WP).
  - `assets/css/main.css` — mismos design tokens que la maqueta + estilos de
    header, footer, hero, catálogo de cursos, in company, Stella Torres,
    blog/recursos, footer y barra fija de compra mobile.
  - `assets/js/main.js` — menú mobile + selector de moneda (AJAX).
  - `functions.php` — setup del theme, menús (`primary`, `footer-nav`,
    `footer-blog`, `footer-recursos`, `footer-legal`), enqueue de
    estilos/fuentes, soporte WooCommerce.
  - `inc/currency-switcher.php` — selector ARS/USD (cookie + endpoint AJAX).
    **Pendiente**: conectar tipo de cambio real; por ahora el precio en USD
    se debe cargar manualmente por producto.
  - `inc/template-tags.php` — helpers de menú y selector de moneda.
  - `header.php`, `footer.php`, `front-page.php`, `index.php` — homepage
    completa (hero, tres pilares, catálogo, in company, Stella Torres,
    blog + recursos) y fallback de listado de blog.

## Pendiente (próximos pasos sugeridos)

1. Instalar el theme en WordPress, configurar WooCommerce + LearnDash.
2. Cargar el menú "Menú principal" en Apariencia > Menús con el mapa del
   sitio (Inicio, Sobre ST, Servicios, Cursos, In Company, Blog, Recursos,
   Stella Torres, Contacto) y los 4 menús de footer.
3. Ficha de curso individual (9 bloques) como plantilla WooCommerce/LearnDash.
4. Ficha de capacitación in company (8 bloques, sin precio) + formulario de
   cotización.
5. Escritorio del alumno (vista LearnDash logueada).
6. Selector de moneda: integrar conversión real (API de tipo de cambio) o
   plugin de multi-currency para WooCommerce.
