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

## Ficha de curso individual

- `maqueta-ficha-curso.html` — maqueta de referencia con los 9 bloques del
  brief (hero + compra, checklist, para quién es, programa en acordeón,
  docente, beneficios, FAQ, CTA final, cross-sell).
- `wp-theme/st-relaciones-publicas/woocommerce/content-single-product.php`
  — template real. Se activa automáticamente en la página de cualquier
  producto WooCommerce (cada curso = un producto).
- `wp-theme/st-relaciones-publicas/inc/course-meta.php` — carga el
  contenido de cada bloque desde custom fields del producto. Si un campo
  está vacío se usa contenido de ejemplo para que la página nunca se vea
  rota. Custom fields disponibles (Editar producto → Campos personalizados):
  - `_st_hero_eyebrow` — texto simple.
  - `_st_hero_meta` — 3 datos separados por `|`. Ej: `8 módulos|20 hs|Certificado incluido`
  - `_st_checklist` — un bullet por línea.
  - `_st_perfiles` — un perfil por línea, formato `Título::Descripción`.
  - `_st_programa` — bloques de módulo separados por línea en blanco;
    primera línea `Título::duración`, líneas siguientes con `- ` = clases.
  - `_st_docente_bio` — bio corta del docente para ese curso.
  - `_st_faq` — bloques separados por línea en blanco, primera línea
    `Pregunta::Respuesta`.
  - Título, precio, descripción corta (bajada del hero) y cross-sell salen
    directo de los campos estándar de WooCommerce (productos relacionados).

## Ficha de capacitación in company

- `maqueta-in-company.html` — maqueta de referencia con los 8 bloques del
  brief (hero sin precio, para qué empresas es, qué incluye, modalidades,
  proceso en 5 pasos, casos/testimonios, formulario de cotización, FAQ
  para decisores).
- `wp-theme/st-relaciones-publicas/template-in-company.php` — page template
  real. Asignar a la página "Capacitaciones In Company" desde Editar
  página → Atributos de página → Plantilla → "In Company".
- `wp-theme/st-relaciones-publicas/inc/in-company-form.php` — procesa el
  formulario de cotización (nombre, empresa, email, teléfono, participantes,
  modalidad, mensaje), con honeypot anti-spam, y envía un mail a la casilla
  de administrador de WordPress. Para cambiar el destinatario sin tocar
  código: hook `strrpp_in_company_quote_to`.

## Banco de referencias (Luzzi Digital / Vilma Núñez)

Decisiones ya incorporadas al sitio: checklist con tildes coral, barra de
compra sticky en mobile, header minimalista con un solo CTA principal,
badge "GRATIS" fijo junto al menú (agregado en el header, linkea a
Recursos gratuitos). Pendientes para cuando se construyan esas páginas:
franja de testimonios/prensa con fondo sólido en "Sobre ST", y uso de
highlighter de color en los textos largos de autoridad de esa sección.

## Pendiente (próximos pasos sugeridos)

1. Instalar el theme en WordPress, configurar WooCommerce + LearnDash.
2. Cargar el menú "Menú principal" en Apariencia > Menús con el mapa del
   sitio (Inicio, Sobre ST, Servicios, Cursos, In Company, Blog, Recursos,
   Stella Torres, Contacto) y los 4 menús de footer.
3. Vincular cada producto WooCommerce (curso) con su curso de LearnDash
   para que la compra dé acceso automático.
4. Páginas institucionales: Sobre ST, Servicios, Stella Torres (marca
   personal), Contacto.
5. Escritorio del alumno (vista LearnDash logueada).
6. Selector de moneda: integrar conversión real (API de tipo de cambio) o
   plugin de multi-currency para WooCommerce.
