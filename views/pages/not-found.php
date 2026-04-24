<?php
/** @var string $title */
view('partials/head.php', compact('title'));
?>
<div class="flex min-h-screen items-center justify-center bg-muted">
    <div class="text-center">
        <h1 class="mb-4 text-4xl font-bold">404</h1>
        <p class="mb-4 text-xl text-muted-foreground">Ops! Página não encontrada.</p>
        <a href="/" class="text-primary underline hover:text-primary/90">Voltar para Home</a>
    </div>
</div>
<?php view('partials/scripts.php'); ?>
