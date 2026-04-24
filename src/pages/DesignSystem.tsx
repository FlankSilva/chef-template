import { Header } from "@/components/site/Header";
import { Footer } from "@/components/site/Footer";

const tokens = [
  { name: "background", desc: "Fundo padrão" },
  { name: "foreground", desc: "Texto principal" },
  { name: "primary", desc: "Marca / cabeçalhos" },
  { name: "primary-foreground", desc: "Texto sobre primary" },
  { name: "accent", desc: "CTAs, destaques (tomate)" },
  { name: "accent-foreground", desc: "Texto sobre accent" },
  { name: "secondary", desc: "Blocos suaves / resumos" },
  { name: "muted", desc: "Fundos neutros" },
  { name: "muted-foreground", desc: "Texto secundário" },
  { name: "border", desc: "Bordas e divisores" },
  { name: "highlight", desc: "Estrela / amarelo editorial" },
  { name: "success", desc: "Pontos fortes / OK" },
  { name: "destructive", desc: "Pontos fracos / erro" },
  { name: "surface", desc: "Faixas / áreas elevadas" },
];

const Swatch = ({ name, desc }: { name: string; desc: string }) => (
  <div className="rounded-xl overflow-hidden border border-border bg-card shadow-sm-soft">
    <div className={`h-24`} style={{ background: `hsl(var(--${name}))` }} />
    <div className="p-3">
      <p className="font-mono text-xs font-bold">--{name}</p>
      <p className="text-xs text-muted-foreground mt-1">{desc}</p>
    </div>
  </div>
);

const DesignSystem = () => {
  return (
    <div className="min-h-screen flex flex-col">
      <Header />

      {/* HERO */}
      <section className="relative bg-primary text-primary-foreground overflow-hidden">
        <div className="container-page py-16 md:py-20">
          <span className="eyebrow text-highlight">Documentação</span>
          <h1 className="mt-3 font-display font-black text-4xl md:text-5xl tracking-tight">
            Design System — Achados do Chef
          </h1>
          <p className="mt-4 text-lg text-primary-foreground/80 max-w-2xl">
            Tokens, tipografia, componentes e padrões usados em todo o site. Tudo em HSL e semântico, definido em <code className="font-mono text-accent">index.css</code>.
          </p>
        </div>
      </section>

      <div className="container-page py-12 space-y-20">
        {/* COLORS */}
        <section>
          <span className="eyebrow">01 · Cores</span>
          <h2 className="mt-2 font-display font-black text-3xl mb-2">Paleta semântica</h2>
          <p className="text-muted-foreground mb-8 max-w-2xl">
            Sempre use os tokens — nunca cores fixas como <code className="font-mono">text-white</code>. Eles garantem consistência e suporte automático ao dark mode.
          </p>
          <div className="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
            {tokens.map((t) => <Swatch key={t.name} {...t} />)}
          </div>
        </section>

        {/* GRADIENTS */}
        <section>
          <span className="eyebrow">02 · Gradientes</span>
          <h2 className="mt-2 font-display font-black text-3xl mb-8">Gradientes</h2>
          <div className="grid md:grid-cols-3 gap-4">
            {[
              { name: "gradient-hero", desc: "Fundos de hero / banners" },
              { name: "gradient-accent", desc: "Botões e CTAs principais" },
              { name: "gradient-fade", desc: "Sobreposição em imagens" },
            ].map((g) => (
              <div key={g.name} className="rounded-xl overflow-hidden border border-border">
                <div className={`h-32 bg-${g.name}`} />
                <div className="p-3 bg-card">
                  <p className="font-mono text-xs font-bold">bg-{g.name}</p>
                  <p className="text-xs text-muted-foreground mt-1">{g.desc}</p>
                </div>
              </div>
            ))}
          </div>
        </section>

        {/* TYPOGRAPHY */}
        <section>
          <span className="eyebrow">03 · Tipografia</span>
          <h2 className="mt-2 font-display font-black text-3xl mb-2">Montserrat</h2>
          <p className="text-muted-foreground mb-8 max-w-2xl">
            Uma única família para títulos e corpo, com pesos variando de 400 a 900. Dá personalidade editorial sem perder legibilidade.
          </p>
          <div className="rounded-2xl border border-border bg-card p-8 space-y-6">
            <div>
              <p className="text-xs font-mono text-muted-foreground mb-1">text-6xl · font-black</p>
              <p className="font-display font-black text-6xl tracking-tight">Display 6XL</p>
            </div>
            <div>
              <p className="text-xs font-mono text-muted-foreground mb-1">text-4xl · font-black</p>
              <p className="font-display font-black text-4xl tracking-tight">Heading H1</p>
            </div>
            <div>
              <p className="text-xs font-mono text-muted-foreground mb-1">text-2xl · font-bold</p>
              <p className="font-display font-bold text-2xl">Heading H2</p>
            </div>
            <div>
              <p className="text-xs font-mono text-muted-foreground mb-1">text-lg · font-semibold</p>
              <p className="text-lg font-semibold">Subtítulo / lead paragraph</p>
            </div>
            <div>
              <p className="text-xs font-mono text-muted-foreground mb-1">text-base · font-normal</p>
              <p className="text-base">Texto base usado em parágrafos do corpo do artigo, com leading-relaxed para boa leitura prolongada.</p>
            </div>
            <div>
              <p className="text-xs font-mono text-muted-foreground mb-1">text-xs · uppercase tracking-[0.18em]</p>
              <p className="eyebrow">Eyebrow / categoria</p>
            </div>
          </div>
        </section>

        {/* SPACING */}
        <section>
          <span className="eyebrow">04 · Espaçamento & Radius</span>
          <h2 className="mt-2 font-display font-black text-3xl mb-8">Tokens estruturais</h2>
          <div className="grid md:grid-cols-2 gap-8">
            <div className="rounded-2xl border border-border bg-card p-6">
              <h3 className="font-bold mb-4">Border radius</h3>
              <div className="space-y-3">
                {[
                  { class: "rounded-sm", label: "sm — 0.4rem" },
                  { class: "rounded-md", label: "md — 0.5rem" },
                  { class: "rounded-lg", label: "lg — 0.75rem (base)" },
                  { class: "rounded-2xl", label: "2xl — 1rem (cards)" },
                  { class: "rounded-full", label: "full (botões/pills)" },
                ].map((r) => (
                  <div key={r.class} className="flex items-center gap-4">
                    <div className={`h-12 w-12 bg-accent ${r.class}`} />
                    <span className="text-sm font-mono">{r.label}</span>
                  </div>
                ))}
              </div>
            </div>

            <div className="rounded-2xl border border-border bg-card p-6">
              <h3 className="font-bold mb-4">Sombras</h3>
              <div className="space-y-4">
                {["sm-soft", "md-soft", "lg-soft"].map((s) => (
                  <div key={s} className={`p-4 bg-background rounded-lg shadow-${s}`}>
                    <span className="text-sm font-mono">shadow-{s}</span>
                  </div>
                ))}
              </div>
            </div>
          </div>
        </section>

        {/* COMPONENTS */}
        <section>
          <span className="eyebrow">05 · Componentes</span>
          <h2 className="mt-2 font-display font-black text-3xl mb-8">Botões & badges</h2>
          <div className="rounded-2xl border border-border bg-card p-8 flex flex-wrap gap-4 items-center">
            <button className="inline-flex items-center gap-2 rounded-full bg-gradient-accent px-7 py-3 font-bold text-accent-foreground shadow-md-soft hover:-translate-y-0.5 transition-transform">
              CTA principal
            </button>
            <button className="inline-flex items-center gap-2 rounded-full border border-border px-7 py-3 font-semibold hover:border-accent hover:text-accent transition-colors">
              Secundário
            </button>
            <button className="inline-flex items-center gap-2 rounded-full bg-primary text-primary-foreground px-7 py-3 font-semibold hover:bg-primary/90 transition-colors">
              Sólido
            </button>
            <span className="rounded-full bg-muted px-3 py-1 text-xs font-semibold text-muted-foreground">
              #tag
            </span>
            <span className="eyebrow">Eyebrow</span>
            <span className="grid h-10 w-10 place-items-center rounded-full bg-accent text-accent-foreground font-black text-base shadow-md-soft">
              1º
            </span>
          </div>
        </section>

        {/* PRINCIPLES */}
        <section>
          <span className="eyebrow">06 · Princípios</span>
          <h2 className="mt-2 font-display font-black text-3xl mb-6">Como aplicamos</h2>
          <div className="grid md:grid-cols-2 gap-4">
            {[
              { t: "Magazine, não corporativo", d: "Tipografia forte, contraste alto, eyebrow categorizando, conteúdo respirando." },
              { t: "Accent comedido", d: "Tomate (--accent) só em ações, números de ranking e destaques editoriais — nunca em fundos grandes." },
              { t: "Cards com radius generoso", d: "Sempre rounded-2xl em cards de conteúdo, com sombra suave e hover sutil." },
              { t: "Mobile-first", d: "Tudo testado em 375px. Headlines começam em text-3xl e escalam até text-6xl no desktop." },
            ].map((p) => (
              <div key={p.t} className="rounded-xl border border-border bg-card p-5">
                <h3 className="font-display font-bold text-lg">{p.t}</h3>
                <p className="text-sm text-muted-foreground mt-2">{p.d}</p>
              </div>
            ))}
          </div>
        </section>
      </div>

      <Footer />
    </div>
  );
};

export default DesignSystem;
