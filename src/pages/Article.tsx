import { Link, useParams } from "react-router-dom";
import { Header } from "@/components/site/Header";
import { Footer } from "@/components/site/Footer";
import { ProductCard } from "@/components/site/ProductCard";
import { PostCard } from "@/components/site/PostCard";
import { Newsletter } from "@/components/site/Newsletter";
import { getPostBySlug, posts } from "@/data/posts";
import { ArrowLeft, Calendar, ChevronRight, Clock, Share2, User } from "lucide-react";
import NotFound from "./NotFound";

const Article = () => {
  const { slug } = useParams();
  const post = slug ? getPostBySlug(slug) : undefined;
  if (!post) return <NotFound />;

  const related = posts.filter((p) => p.slug !== post.slug).slice(0, 3);
  const toc = post.sections.map((s) => s.heading);

  return (
    <div className="min-h-screen flex flex-col">
      <Header />

      {/* BREADCRUMB */}
      <div className="border-b border-border bg-surface">
        <div className="container-page py-3 flex items-center gap-2 text-xs text-muted-foreground">
          <Link to="/" className="hover:text-accent transition-colors">Home</Link>
          <ChevronRight className="h-3 w-3" />
          <Link to="/blog" className="hover:text-accent transition-colors">Blog</Link>
          <ChevronRight className="h-3 w-3" />
          <Link to={`/blog?cat=${encodeURIComponent(post.category)}`} className="hover:text-accent transition-colors">{post.category}</Link>
          <ChevronRight className="h-3 w-3" />
          <span className="text-foreground/80 truncate">{post.title}</span>
        </div>
      </div>

      {/* HERO HEADER — full-bleed editorial */}
      <section className="relative overflow-hidden bg-primary text-primary-foreground">
        <div className="absolute inset-0 opacity-25">
          <img src={post.cover} alt="" className="h-full w-full object-cover" aria-hidden />
        </div>
        <div className="absolute inset-0 bg-gradient-to-r from-primary via-primary/85 to-primary/40" />

        <div className="container-page relative py-16 md:py-24 lg:py-28">
          <div className="max-w-4xl">
            <Link to="/blog" className="inline-flex items-center gap-2 text-sm font-semibold text-primary-foreground/80 hover:text-accent transition-colors mb-6">
              <ArrowLeft className="h-4 w-4" /> Voltar ao blog
            </Link>

            <span className="eyebrow text-highlight">{post.category}</span>
            <h1 className="mt-4 font-display font-black text-3xl sm:text-4xl md:text-5xl lg:text-6xl leading-[1.05] tracking-tight">
              {post.title}
            </h1>
            <p className="mt-5 text-lg md:text-xl text-primary-foreground/85 leading-relaxed max-w-3xl">
              {post.subtitle}
            </p>

            <div className="mt-8 flex flex-wrap items-center gap-x-6 gap-y-3 text-sm text-primary-foreground/75 border-t border-primary-foreground/15 pt-5">
              <span className="flex items-center gap-2"><User className="h-4 w-4 text-accent" />{post.author}</span>
              <span className="flex items-center gap-2"><Calendar className="h-4 w-4 text-accent" />{post.date}</span>
              <span className="flex items-center gap-2"><Clock className="h-4 w-4 text-accent" />{post.readingTime} de leitura</span>
              <button
                onClick={() => navigator.share?.({ title: post.title, url: window.location.href }).catch(() => {})}
                className="ml-auto inline-flex items-center gap-2 rounded-full border border-primary-foreground/30 px-4 py-2 text-xs font-semibold hover:border-accent hover:text-accent transition-colors"
              >
                <Share2 className="h-3.5 w-3.5" /> Compartilhar
              </button>
            </div>
          </div>
        </div>
      </section>

      {/* COVER IMAGE — large, breathing */}
      <section className="container-page -mt-8 md:-mt-12 relative z-10 mb-12">
        <div className="aspect-[16/8] md:aspect-[21/8] w-full overflow-hidden rounded-2xl shadow-lg-soft border border-border">
          <img src={post.cover} alt={post.title} width={1920} height={800} className="h-full w-full object-cover" />
        </div>
      </section>

      {/* CONTENT */}
      <section className="container-page pb-16">
        <div className="grid lg:grid-cols-[1fr_280px] gap-12 max-w-6xl mx-auto">
          <article className="article-prose">
            {post.intro.map((p, i) => (
              <p key={i} className={i === 0 ? "text-xl leading-relaxed font-medium text-foreground" : ""}>
                {p}
              </p>
            ))}

            {/* TOP PICKS QUICK SUMMARY */}
            <aside className="not-prose my-10 rounded-2xl border-2 border-accent/20 bg-secondary p-6 md:p-8">
              <span className="eyebrow">Resumo rápido</span>
              <h2 className="mt-2 font-display font-black text-2xl">Nossas escolhas</h2>
              <ul className="mt-4 grid sm:grid-cols-2 gap-3 text-sm">
                {post.products.map((prod, i) => (
                  <li key={prod.name} className="flex items-start gap-3 rounded-lg bg-background p-3">
                    <span className="grid h-7 w-7 flex-shrink-0 place-items-center rounded-full bg-accent text-accent-foreground font-black text-xs">{i + 1}</span>
                    <div>
                      <p className="font-bold">{prod.name}</p>
                      <p className="text-xs text-muted-foreground">{prod.price} · ★ {prod.rating}</p>
                    </div>
                  </li>
                ))}
              </ul>
            </aside>

            {post.sections.map((s) => (
              <section key={s.heading} id={s.heading}>
                <h2>{s.heading}</h2>
                {s.paragraphs.map((p, i) => <p key={i}>{p}</p>)}
              </section>
            ))}

            <h2 className="mt-12">Veja os produtos avaliados</h2>
            <p>Abaixo, o ranking completo com pontos fortes, pontos fracos, faixa de preço atual e link direto para conferir a oferta. Os preços podem variar — sempre confira no site do parceiro.</p>
            <div className="not-prose mt-6 space-y-8">
              {post.products.map((prod, i) => (
                <ProductCard key={prod.name} product={prod} rank={i + 1} />
              ))}
            </div>

            <h2 className="mt-12">Conclusão</h2>
            <p>
              Independente do seu orçamento, existem boas opções na categoria <strong>{post.category}</strong>. O ideal é alinhar a escolha com a frequência de uso e o tipo de receita que você mais prepara em casa.
            </p>
            <p>
              Continue acompanhando o <strong>Achados do Chef</strong> — testamos novos produtos toda semana e atualizamos esta lista sempre que um modelo melhor aparece no mercado.
            </p>

            <div className="not-prose mt-12 flex flex-wrap gap-2 pt-8 border-t border-border">
              {post.tags.map((t) => (
                <span key={t} className="rounded-full bg-muted px-3 py-1 text-xs font-semibold text-muted-foreground">
                  #{t}
                </span>
              ))}
            </div>
          </article>

          {/* SIDEBAR / TOC */}
          <aside className="hidden lg:block">
            <div className="sticky top-24 space-y-8">
              <div className="rounded-xl border border-border bg-card p-5">
                <h3 className="text-xs font-bold uppercase tracking-wider text-muted-foreground mb-3">Neste artigo</h3>
                <ul className="space-y-2 text-sm">
                  {toc.map((t) => (
                    <li key={t}>
                      <a href={`#${t}`} className="text-foreground/80 hover:text-accent transition-colors">{t}</a>
                    </li>
                  ))}
                </ul>
              </div>

              <div className="rounded-xl bg-primary text-primary-foreground p-5">
                <span className="eyebrow text-highlight">Dica</span>
                <p className="mt-2 text-sm leading-relaxed">
                  Antes de comprar, confira nossas outras reviews da categoria <span className="font-bold">{post.category}</span>.
                </p>
                <Link to={`/blog?cat=${encodeURIComponent(post.category)}`} className="mt-4 inline-block text-sm font-bold text-accent">
                  Ver mais →
                </Link>
              </div>
            </div>
          </aside>
        </div>
      </section>

      {/* RELATED */}
      <section className="container-page py-12 border-t border-border">
        <div className="mb-8">
          <span className="eyebrow">Continue lendo</span>
          <h2 className="mt-2 font-display font-black text-3xl">Reviews relacionados</h2>
        </div>
        <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
          {related.map((p) => <PostCard key={p.slug} post={p} />)}
        </div>
      </section>

      <Newsletter />
      <Footer />
    </div>
  );
};

export default Article;
