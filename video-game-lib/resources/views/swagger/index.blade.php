<!-- resources/views/swagger/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation</title>
    <link rel="stylesheet" type="text/css" href="/video-game-lib/resources/views/swagger/swagger/swagger-ui.css">
</head>
<body>
<div id="swagger-ui"></div>

<script src="{{ asset('/video-game-lib/public/swagger/swagger-ui-bundle.js') }}"></script>
<script src="{{ asset('/video-game-lib/public/swagger/swagger-ui-standalone-preset.js') }}"></script>
<script>
    window.onload = function() {
        const ui = SwaggerUIBundle({
            url: "/video-game-lib/storage/api-docs/api-docs.json",
            dom_id: '#swagger-ui',
            presets: [
                SwaggerUIBundle.presets.apis,
                SwaggerUIStandalonePreset,
            ],
            layout: "StandaloneLayout",
        });
    }
</script>
</body>
</html>
