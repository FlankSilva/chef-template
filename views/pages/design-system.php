<?php
/** @var string $title */
/** @var string $requestPath */
/** @var list<string> $categories */

$tokens = [
    ['name' => 'background', 'desc' => 'Fundo padrão'],
    ['name' => 'foreground', 'desc' => 'Texto principal'],
    ['name' => 'primary', 'desc' => 'Marca / cabeçalhos'],
    ['name' => 'primary-foreground', 'desc' => 'Texto sobre primary'],
    ['name' => 'accent', 'desc' => 'CTAs, destaques (tomate)'],
    ['name' => 'accent-foreground', 'desc' => 'Texto sobre accent'],
    ['name' => 'secondary', 'desc' => 'Blocos suaves / resumos'],
    ['name' => 'muted', 'desc' => 'Fundos neutros'],
    ['name' => 'muted-foreground', 'desc' => 'Texto secundário'],
    ['name' => 'border', 'desc' => 'Bordas e divisores'],
    ['name' => 'highlight', 'desc' => 'Amarelo editorial'],
    ['name' => 'success', 'desc' => 'Pontos fortes / OK'],
    ['name' => 'destructive', 'desc' => 'Pontos fracos / erro'],
    ['name' => 'surface', 'desc' => 'Faixas / áreas elevadas'],
];

view('partials/head.php', compact('title'));
view('partials/header.php', ['path' => $requestPath, 'categories' => $categories]);
?>
<div class="min-h-screen flex flex-col">
    <section class="relative bg-primary text-primary-foreground overflow-hidden">
        <div class="container-page py-16 md:py-20">
            <span class="eyebrow text-highlight">Documentação</span>
            <h1 class="mt-3 font-display font-black text-4xl md:text-5xl tracking-tight">Design System — Achados do Chef</h1>
            <p class="mt-4 text-lg text-primary-foreground/80 max-w-2xl">
                Tokens, tipografia, componentes e padrões usados em todo o site.
            </p>
        </div>
    </section>
    <div class="container-page py-12 space-y-20">
        <section>
            <span class="eyebrow">01 · Cores</span>
            <h2 class="mt-2 font-display font-black text-3xl mb-2">Paleta semântica</h2>
            <p class="text-muted-foreground mb-8 max-w-2xl">Tokens em HSL no `index.css` + Tailwind.</p>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
                <?php foreach ($tokens as $token): ?>
                    <div class="rounded-xl overflow-hidden border border-border bg-card shadow-sm-soft">
                        <div class="h-24" style="background: hsl(var(--<?= h($token['name']) ?>));"></div>
                        <div class="p-3">
                            <p class="font-mono text-xs font-bold">--<?= h($token['name']) ?></p>
                            <p class="text-xs text-muted-foreground mt-1"><?= h($token['desc']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section>
            <span class="eyebrow">02 · Gradientes</span>
            <h2 class="mt-2 font-display font-black text-3xl mb-8">Gradientes</h2>
            <div class="grid md:grid-cols-3 gap-4">
                <div class="rounded-xl overflow-hidden border border-border">
                    <div class="h-32 bg-gradient-hero"></div>
                    <div class="p-3 bg-card">
                        <p class="font-mono text-xs font-bold">bg-gradient-hero</p>
                        <p class="text-xs text-muted-foreground mt-1">Fundos de hero / banners</p>
                    </div>
                </div>
                <div class="rounded-xl overflow-hidden border border-border">
                    <div class="h-32 bg-gradient-accent"></div>
                    <div class="p-3 bg-card">
                        <p class="font-mono text-xs font-bold">bg-gradient-accent</p>
                        <p class="text-xs text-muted-foreground mt-1">Botões e CTAs principais</p>
                    </div>
                </div>
                <div class="rounded-xl overflow-hidden border border-border">
                    <div class="h-32 bg-gradient-fade"></div>
                    <div class="p-3 bg-card">
                        <p class="font-mono text-xs font-bold">bg-gradient-fade</p>
                        <p class="text-xs text-muted-foreground mt-1">Sobreposição em imagens</p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <span class="eyebrow">03 · Tipografia</span>
            <h2 class="mt-2 font-display font-black text-3xl mb-2">Montserrat</h2>
            <p class="text-muted-foreground mb-8 max-w-2xl">
                Uma única família para títulos e corpo, preservando o visual editorial do projeto.
            </p>
            <div class="rounded-2xl border border-border bg-card p-8 space-y-6">
                <div>
                    <p class="text-xs font-mono text-muted-foreground mb-1">text-6xl · font-black</p>
                    <p class="font-display font-black text-6xl tracking-tight">Display 6XL</p>
                </div>
                <div>
                    <p class="text-xs font-mono text-muted-foreground mb-1">text-4xl · font-black</p>
                    <p class="font-display font-black text-4xl tracking-tight">Heading H1</p>
                </div>
                <div>
                    <p class="text-xs font-mono text-muted-foreground mb-1">text-lg · font-semibold</p>
                    <p class="text-lg font-semibold">Subtítulo / lead paragraph</p>
                </div>
                <div>
                    <p class="text-xs font-mono text-muted-foreground mb-1">text-xs · uppercase tracking-[0.18em]</p>
                    <p class="eyebrow">Eyebrow / categoria</p>
                </div>
            </div>
        </section>

        <section>
            <span class="eyebrow">04 · Espaçamento & Radius</span>
            <h2 class="mt-2 font-display font-black text-3xl mb-8">Tokens estruturais</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="rounded-2xl border border-border bg-card p-6">
                    <h3 class="font-bold mb-4">Border radius</h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-4"><div class="h-12 w-12 bg-accent rounded-sm"></div><span class="text-sm font-mono">sm</span></div>
                        <div class="flex items-center gap-4"><div class="h-12 w-12 bg-accent rounded-md"></div><span class="text-sm font-mono">md</span></div>
                        <div class="flex items-center gap-4"><div class="h-12 w-12 bg-accent rounded-lg"></div><span class="text-sm font-mono">lg</span></div>
                        <div class="flex items-center gap-4"><div class="h-12 w-12 bg-accent rounded-2xl"></div><span class="text-sm font-mono">2xl</span></div>
                        <div class="flex items-center gap-4"><div class="h-12 w-12 bg-accent rounded-full"></div><span class="text-sm font-mono">full</span></div>
                    </div>
                </div>
                <div class="rounded-2xl border border-border bg-card p-6">
                    <h3 class="font-bold mb-4">Sombras</h3>
                    <div class="space-y-4">
                        <div class="p-4 bg-background rounded-lg shadow-sm-soft"><span class="text-sm font-mono">shadow-sm-soft</span></div>
                        <div class="p-4 bg-background rounded-lg shadow-md-soft"><span class="text-sm font-mono">shadow-md-soft</span></div>
                        <div class="p-4 bg-background rounded-lg shadow-lg-soft"><span class="text-sm font-mono">shadow-lg-soft</span></div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <span class="eyebrow">05 · Componentes</span>
            <h2 class="mt-2 font-display font-black text-3xl mb-8">Botões & badges</h2>
            <div class="rounded-2xl border border-border bg-card p-8 flex flex-wrap gap-4 items-center">
                <button class="inline-flex items-center gap-2 rounded-full bg-gradient-accent px-7 py-3 font-bold text-accent-foreground shadow-md-soft">CTA principal</button>
                <button class="inline-flex items-center gap-2 rounded-full border border-border px-7 py-3 font-semibold hover:border-accent hover:text-accent transition-colors">Secundário</button>
                <button class="inline-flex items-center gap-2 rounded-full bg-primary text-primary-foreground px-7 py-3 font-semibold">Sólido</button>
                <span class="rounded-full bg-muted px-3 py-1 text-xs font-semibold text-muted-foreground">#tag</span>
                <span class="eyebrow">Eyebrow</span>
                <span class="grid h-10 w-10 place-items-center rounded-full bg-accent text-accent-foreground font-black text-base shadow-md-soft">1º</span>
            </div>
        </section>

        <section>
            <span class="eyebrow">06 · Princípios</span>
            <h2 class="mt-2 font-display font-black text-3xl mb-6">Como aplicamos</h2>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="rounded-xl border border-border bg-card p-5">
                    <h3 class="font-display font-bold text-lg">Magazine, não corporativo</h3>
                    <p class="text-sm text-muted-foreground mt-2">Tipografia forte, contraste alto e conteúdo respirando.</p>
                </div>
                <div class="rounded-xl border border-border bg-card p-5">
                    <h3 class="font-display font-bold text-lg">Accent comedido</h3>
                    <p class="text-sm text-muted-foreground mt-2">Accent em ações, números de ranking e destaques editoriais.</p>
                </div>
                <div class="rounded-xl border border-border bg-card p-5">
                    <h3 class="font-display font-bold text-lg">Cards com radius generoso</h3>
                    <p class="text-sm text-muted-foreground mt-2">Cards com `rounded-2xl`, sombra suave e hover sutil.</p>
                </div>
                <div class="rounded-xl border border-border bg-card p-5">
                    <h3 class="font-display font-bold text-lg">Mobile-first</h3>
                    <p class="text-sm text-muted-foreground mt-2">Escala tipográfica e espaçamentos pensados para 375px+.</p>
                </div>
            </div>
        </section>
    </div>
    <?php view('partials/footer.php', compact('categories')); ?>
</div>
<?php view('partials/scripts.php'); ?>
