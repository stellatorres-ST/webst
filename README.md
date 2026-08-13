# ST Relaciones Públicas — Sitio web

Sitio institucional + LMS de ST Relaciones Públicas (consultoría y capacitación en
Relaciones Públicas, Marketing Estratégico y Comunicación), sobre WordPress +
WooCommerce + LearnDash.

## Sistema tipográfico (actualizado)

El brief original definía Montserrat + Roboto Condensed como "no negociable".
Por pedido explícito se reemplazó por:

- **Montserrat** (700/800) — títulos (`--font-heading`), sin cambios.
- **Karla** (400/500/600/700) — texto de cuerpo y datos (`--font-body`,
  `--font-data`), reemplaza a Montserrat Medium y Roboto Condensed.
- **Playfair Display** (italic 500/600) — fuente de acento para `.highlight`
  (el resaltado tipo marcador en textos de autoridad de "Sobre ST" y
  "Stella Torres"), variable `--font-accent`.

Aplicado de forma consistente en las 10 maquetas y en
`assets/css/main.css` + el enqueue de Google Fonts en `functions.php`.

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

Decisiones incorporadas al sitio: checklist con tildes coral, barra de
compra sticky en mobile, header minimalista con un solo CTA principal,
badge "GRATIS" fijo junto al menú (linkea a Recursos gratuitos), franja de
testimonios/prensa con fondo sólido en "Sobre ST", highlighter de color en
textos de autoridad.

A partir de capturas reales de luzzidigital.com se ajustaron las cards de
curso (homepage, cross-sell) para que coincidan con el patrón de Luzzi:
fila de íconos de duración/módulos/certificado **antes del precio**, y
**CTA doble** — "Comprar curso" (botón primario) + "Detalles" (link
secundario con ícono +) en vez de un solo botón. Función helper:
`strrpp_course_card_meta()` en `inc/course-meta.php`.

## Páginas institucionales

- `maqueta-sobre-st.html` / `template-sobre-st.php` — quiénes somos,
  misión/visión/valores, dirección académica (Stella Torres), franja de
  testimonios/prensa con fondo sólido (pendiente del banco de referencias,
  ya incorporada) y highlighter en frases clave.
- `maqueta-servicios.html` / `template-servicios.php` — grilla de 6
  servicios (consultoría, in company, cursos, crisis, vocería, auditoría)
  + metodología en 4 pasos.
- `maqueta-stella-torres.html` / `template-stella-torres.php` — página de
  marca personal, diferenciada con una franja teal superior sin salir del
  sistema de marca. Bio con highlighter, stats, temas de speaking, prensa.
- `maqueta-contacto.html` / `template-contacto.php` — info de contacto +
  formulario funcional (envía mail vía `inc/contact-form.php`, mismo
  patrón anti-spam que el formulario de in company).

Cada template se asigna desde Editar página → Atributos de página →
Plantilla, eligiendo el nombre correspondiente ("Sobre ST", "Servicios",
"Stella Torres", "Contacto"). El contenido de "quiénes somos" y la bio de
Stella se puede editar directo desde el editor de WordPress (usan
`the_content()` si la página tiene contenido cargado, si no muestran el
texto de ejemplo).

## Blog y Recursos gratuitos

- `maqueta-blog.html` / `index.php` + `single.php` — catálogo del blog con
  filtro de categorías (pills, resaltan la activa) y vista de post
  individual. Usa el sistema nativo de posts y categorías de WordPress,
  no requiere configuración adicional.
- `maqueta-recursos.html` / `template-recursos-gratuitos.php` — biblioteca
  de recursos gratuitos con tarjeta y CTA propio por recurso (patrón
  Vilma Núñez), en vez de un botón único genérico. Cada recurso es un
  post del custom post type **"Recursos gratuitos"** (`inc/recursos-cpt.php`),
  con 2 custom fields:
  - `_st_recurso_icon` — un emoji para el ícono de la card (ej. `📄`),
    se usa solo si el post no tiene imagen destacada.
  - `_st_recurso_file` — URL del archivo a descargar.
  - `_st_recurso_cta` — texto del link de descarga sin el "»" final
    (ej. "Descargar gratis la guía"). Opcional, por defecto
    "Descargar gratis".
  El extracto del post se usa como descripción corta de la card. El CTA
  es un link de texto en coral con flecha (no un botón sólido), y la
  card usa la imagen destacada del post como visual si está cargada.

## Escritorio del alumno

- `maqueta-escritorio-alumno.html` / `template-escritorio-alumno.php` —
  vista logueada completa: saludo personalizado, "Continuar donde quedé"
  (curso en curso con mayor prioridad), grid "Mis cursos" con filtro
  (Todos/En curso/Completados/Sin empezar, filtra en el cliente sin
  recargar), "Mis certificados" con descarga PDF y estado vacío
  motivador, historial de compras (pedidos de WooCommerce).
- `inc/learndash-integration.php` — todas las funciones que leen datos de
  LearnDash/WooCommerce son "safe": si los plugins no están activos
  todavía, devuelven listas vacías en vez de romper la página (se muestra
  un aviso in-page en su lugar).
- Al completar un curso (`learndash_course_completed`): se guarda una
  notificación in-app que aparece una vez arriba del escritorio, y se
  envía un mail con el link al certificado.
- **Vista de curso** (menú lateral de módulos/clases, checks de
  completado, botón "Marcar como completada", barra de progreso): se usa
  el template nativo de LearnDash (LD30) en vez de reconstruirlo, porque
  ya cubre todo lo pedido — solo se reskinea con los colores de marca en
  `assets/css/learndash.css` (se carga automático cuando LearnDash está
  activo).
- Requiere estar logueado; si no, redirige al login de WordPress.

## Pendiente (próximos pasos sugeridos)

1. Instalar el theme en WordPress, configurar WooCommerce + LearnDash.
2. Crear las páginas del menú principal (Inicio, Sobre ST, Servicios,
   Cursos, In Company, Blog, Recursos, Stella Torres, Contacto, Escritorio
   del Alumno), asignar su plantilla correspondiente, y cargar el menú en
   Apariencia > Menús. "Blog" se configura como página de entradas desde
   Ajustes > Lectura.
3. Vincular cada producto WooCommerce (curso) con su curso de LearnDash
   para que la compra dé acceso automático.
4. Cargar contenido real: posts del blog, recursos gratuitos, cursos.
5. Selector de moneda: integrar conversión real (API de tipo de cambio) o
   plugin de multi-currency para WooCommerce.
6. Reemplazar el logo placeholder (monograma "ST") por el archivo de
   marca definitivo cuando esté listo.
