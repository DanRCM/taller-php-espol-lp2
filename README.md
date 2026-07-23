# Taller PHP — ESPOL

Plantilla base para el taller de PHP. Incluye un entorno ya configurado (PHP 8.2 vía Codespaces), una hoja de estilos compartida, y ejemplos de referencia.

## Cómo iniciar tu entorno (estudiantes)

1. Arriba a la derecha de este repositorio, haz clic en el botón verde **`Code`**.
2. Ve a la pestaña **`Codespaces`** → **`Create codespace on main`**.
3. Espera 1-2 minutos mientras se prepara el entorno (solo la primera vez).
4. En la terminal de abajo, escribe:
   ```
   php -S 0.0.0.0:8000
   ```
5. Va a aparecer una notificación abajo a la derecha tipo "Your application running on port 8000 is available" — haz clic en **`Open in Browser`**.
6. Si no ves la notificación, ve a la pestaña **`PORTS`** (junto a la Terminal) y haz clic en el ícono del globo/mundo junto al puerto **8000**.

## Estructura del proyecto

```
├── index.php          → página principal (empieza aquí)
├── estilos.css         → hoja de estilos compartida (úsala en tus páginas nuevas)
├── ejemplos/
│   ├── login_simple.php
│   └── cifrado_ejemplo.php
└── .devcontainer/
    └── devcontainer.json   → configuración automática del entorno (no la edites)
```

## Cómo usar el CSS compartido en una página nueva

```html
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="estilos.css">   <!-- ajusta la ruta según la carpeta donde estés -->
</head>
<body>
  <div class="contenedor">
    <h1>Tu contenido aquí</h1>
  </div>
</body>
```

## Notas

- Cada vez que guardes un archivo (Ctrl+S), solo necesitas refrescar el navegador para ver el cambio.
- Tu Codespace se apaga solo tras 30 min de inactividad — al volver a entrar, dale "Restart" o simplemente vuelve a crear uno desde `Code → Codespaces`.
- Cuenta gratuita de GitHub incluye ~60 horas al mes de este entorno — más que suficiente para el taller y el proyecto de 3 días.
