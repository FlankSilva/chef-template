<section class="container-page my-20">
    <div class="relative overflow-hidden rounded-3xl bg-primary text-primary-foreground p-8 md:p-14">
        <div class="relative grid md:grid-cols-2 gap-8 items-center">
            <div>
                <span class="eyebrow text-highlight">Newsletter</span>
                <h2 class="mt-3 font-display font-black text-3xl md:text-4xl leading-tight">Os melhores achados, direto no seu e-mail.</h2>
                <p class="mt-3 text-primary-foreground/75 max-w-md">Reviews novos, ofertas reais e cupons exclusivos toda semana. Sem spam.</p>
            </div>
            <form class="flex flex-col sm:flex-row gap-3" onsubmit="event.preventDefault(); alert('Inscrição confirmada!'); this.reset();">
                <input type="email" required placeholder="seu@email.com" class="flex-1 rounded-lg bg-primary-foreground/10 border border-primary-foreground/20 px-4 py-3 text-primary-foreground placeholder:text-primary-foreground/50 focus:outline-none focus:border-accent transition-colors" />
                <button type="submit" class="rounded-lg bg-gradient-accent px-6 py-3 font-bold text-accent-foreground shadow-lg-soft hover:-translate-y-0.5 transition-transform">Inscrever</button>
            </form>
        </div>
    </div>
</section>
