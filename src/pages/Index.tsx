import { Link } from "react-router-dom";
import { Header } from "@/components/site/Header";
import { Footer } from "@/components/site/Footer";
import { PostCard } from "@/components/site/PostCard";
import { Newsletter } from "@/components/site/Newsletter";
import { posts, categories } from "@/data/posts";
import heroImg from "@/assets/hero-kitchen.jpg";
import { ArrowRight, Award, Flame, Sparkles } from "lucide-react";

const Index = () => {
  const [feature, ...rest] = posts;
  const popular = rest.slice(0, 3);
  const latest = posts.slice(0, 6);

  return (
    <div className="min-h-screen flex flex-col">
      <Header />

      {/* HERO */}
      <section className="relative overflow-hidden">
        <div className="absolute inset-0 bg-gradient-hero" />
        <div className="absolute inset-0 opacity-30">
          <img src={heroImg} alt="" width={1920} height={1080} className="h-full w-full object-cover" />
        </div>
        <div className="absolute inset-0 bg-gradient-to-r from-primary via-primary/80 to-primary/30" />

        <div className="container-page relative py-20 md:py-32 text-primary-foreground">
          <div className="max-w-3xl animate-fade-up">
            <span className="eyebrow text-highlight">
              <Sparkles className="h-3.5 w-3.5" /> Reviews honestos · Atualizados em 2025
            </span>
            <h1 className="mt-5 font-display font-black text-4xl sm:text-5xl md:text-7xl leading-[1.02] tracking-tight">
              Os melhores produtos de cozinha,{" "}
              <span className="relative inline-block">
                <span className="relative z-10">testados</span>
                <span className="absolute inset-x-0 bottom-1 h-3 md:h-4 bg-accent/80 -z-0" />
              </span>{" "}
              antes de chegarem até você.
            </h1>
            <p className="mt-6 max-w-xl text-base md:text-lg text-primary-foreground/80 leading-relaxed">
              Comparativos sérios, guias de compra e os achados mais imperdíveis para transformar sua cozinha.
            </p>
            <div className="mt-8 flex flex-wrap gap-3">
              <Link
                to="/blog"
                className="inline-flex items-center gap-2 rounded-full bg-gradient-accent px-7 py-3.5 font-bold text-accent-foreground shadow-lg-soft hover:-translate-y-0.5 transition-transform"
              >
                Explorar reviews <ArrowRight className="h-4 w-4" />
              </Link>
              <Link
                to={`/blog/${feature.slug}`}
                className="inline-flex items-center gap-2 rounded-full border border-primary-foreground/30 px-7 py-3.5 font-semibold text-primary-foreground hover:bg-primary-foreground/10 transition-colors"
              >
                Ver review em destaque
              </Link>
            </div>

            <div className="mt-12 flex flex-wrap gap-x-10 gap-y-4 text-sm">
              {[
                { icon: Award, label: "+50 produtos testados" },
                { icon: Flame, label: "Atualizados toda semana" },
                { icon: Sparkles, label: "Reviews independentes" },
              ].map(({ icon: Icon, label }) => (
                <div key={label} className="flex items-center gap-2 text-primary-foreground/80">
                  <Icon className="h-4 w-4 text-accent" />
                  {label}
                </div>
              ))}
            </div>
          </div>
        </div>
      </section>

      {/* CATEGORIES STRIP */}
      <section className="border-y border-border bg-surface">
        <div className="container-page py-6 flex flex-wrap items-center gap-3 justify-center md:justify-between">
          <span className="text-xs font-bold uppercase tracking-[0.2em] text-muted-foreground">Navegue por categoria</span>
          <div className="flex flex-wrap gap-2">
            {categories.map((c) => (
              <Link
                key={c}
                to={`/blog?cat=${encodeURIComponent(c)}`}
                className="rounded-full border border-border bg-background px-4 py-2 text-sm font-semibold hover:border-accent hover:text-accent transition-colors"
              >
                {c}
              </Link>
            ))}
          </div>
        </div>
      </section>

      {/* FEATURE + POPULAR */}
      <section className="container-page py-16 md:py-20">
        <div className="grid lg:grid-cols-3 gap-8">
          <div className="lg:col-span-2">
            <div className="mb-6 flex items-end justify-between">
              <div>
                <span className="eyebrow">Em destaque</span>
                <h2 className="mt-2 font-display font-black text-2xl md:text-3xl">A review da semana</h2>
              </div>
            </div>
            <PostCard post={feature} variant="feature" />
          </div>

          <aside>
            <div className="mb-6">
              <span className="eyebrow">Mais lidos</span>
              <h2 className="mt-2 font-display font-black text-2xl md:text-3xl">Populares</h2>
            </div>
            <div className="space-y-5">
              {popular.map((p) => (
                <PostCard key={p.slug} post={p} variant="compact" />
              ))}
            </div>
          </aside>
        </div>
      </section>

      {/* LATEST GRID */}
      <section className="container-page py-10">
        <div className="mb-8 flex items-end justify-between flex-wrap gap-4">
          <div>
            <span className="eyebrow">Últimos reviews</span>
            <h2 className="mt-2 font-display font-black text-3xl md:text-4xl">Direto do nosso laboratório</h2>
          </div>
          <Link to="/blog" className="link-underline text-sm font-bold text-accent">Ver todos →</Link>
        </div>

        <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
          {latest.map((p) => (
            <PostCard key={p.slug} post={p} />
          ))}
        </div>
      </section>

      <Newsletter />
      <Footer />
    </div>
  );
};

export default Index;
