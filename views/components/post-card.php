<?php
/** @var array<string, mixed> $post */
/** @var string $variant */
$variant = $variant ?? 'default';

if ($variant === 'compact') { ?>
    <a href="/blog/<?= h((string) $post['slug']) ?>" class="group flex gap-4 items-start">
        <div class="h-20 w-28 flex-shrink-0 overflow-hidden rounded-lg bg-muted"><img src="<?= h((string) $post['cover']) ?>" alt="<?= h((string) $post['title']) ?>" class="h-full w-full object-cover"></div>
        <div class="flex-1 min-w-0">
            <span class="text-[10px] uppercase tracking-wider font-bold text-accent"><?= h((string) $post['category']) ?></span>
            <h3 class="mt-1 font-display font-bold text-sm leading-snug line-clamp-3 group-hover:text-accent transition-colors"><?= h((string) $post['title']) ?></h3>
        </div>
    </a>
<?php } elseif ($variant === 'feature') { ?>
    <a href="/blog/<?= h((string) $post['slug']) ?>" class="group relative block overflow-hidden rounded-2xl bg-primary text-primary-foreground shadow-lg-soft">
        <div class="aspect-[16/10] md:aspect-[16/9] overflow-hidden"><img src="<?= h((string) $post['cover']) ?>" alt="<?= h((string) $post['title']) ?>" class="h-full w-full object-cover"></div>
        <div class="absolute inset-0 bg-gradient-fade"></div>
        <div class="absolute bottom-0 left-0 right-0 p-6 md:p-10">
            <span class="eyebrow text-accent-foreground/90 mb-3 bg-accent px-3 py-1 rounded-full"><?= h((string) $post['category']) ?></span>
            <h2 class="mt-3 font-display font-black text-2xl md:text-4xl leading-[1.1] max-w-3xl"><?= h((string) $post['title']) ?></h2>
            <p class="mt-3 max-w-2xl text-sm md:text-base text-primary-foreground/85"><?= h((string) $post['subtitle']) ?></p>
        </div>
    </a>
<?php } else { ?>
    <a href="/blog/<?= h((string) $post['slug']) ?>" class="group flex flex-col overflow-hidden rounded-xl bg-card shadow-sm-soft hover:shadow-md-soft transition-all duration-300 hover:-translate-y-1">
        <div class="aspect-[4/3] overflow-hidden bg-muted"><img src="<?= h((string) $post['cover']) ?>" alt="<?= h((string) $post['title']) ?>" class="h-full w-full object-cover"></div>
        <div class="flex flex-1 flex-col p-5">
            <span class="eyebrow"><?= h((string) $post['category']) ?></span>
            <h3 class="mt-3 font-display font-bold text-lg leading-tight line-clamp-3 group-hover:text-accent transition-colors"><?= h((string) $post['title']) ?></h3>
            <p class="mt-2 text-sm text-muted-foreground line-clamp-2"><?= h((string) $post['excerpt']) ?></p>
        </div>
    </a>
<?php }
