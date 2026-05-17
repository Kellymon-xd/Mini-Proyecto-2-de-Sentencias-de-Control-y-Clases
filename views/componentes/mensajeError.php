<?php
// Componente: muestra un bloque de error cuando hay un mensaje PHP que mostrar.
// Se usa cuando el error viene del lado del servidor (no via fetch).

if (!empty($errorMsg)): ?>
<div class="mensaje-error visible" role="alert">
    <?= htmlspecialchars($errorMsg, ENT_QUOTES, 'UTF-8') ?>
</div>
<?php endif; ?>