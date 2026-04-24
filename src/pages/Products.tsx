import { useMemo, useState } from "react";
import { Link } from "react-router-dom";
import { Header } from "@/components/site/Header";
import { Footer } from "@/components/site/Footer";
import { Newsletter } from "@/components/site/Newsletter";
import { allProducts, categories, type Category } from "@/data/posts";
import { Check, Search, Star, X } from "lucide-react";

const Products = () => {
  const [query, setQuery] = useState("");
  const [cat, setCat] = useState<Category | "Todos">("Todos");
  const [sort, setSort] = useState<"rating" | "price-asc" | "price-desc">("rating");

  const parsePrice = (s: string) => Number(s.replace(/[^\d,]/g, "").replace(",", ".")) || 0;

  const filtered = useMemo(() => {
    let list = allProducts.filter((p) => {
      const matchesQ = p.name.toLowerCase().includes(query.toLowerCase());
      const matchesC = cat === "Todos" || p.category === cat;
      return matchesQ && matchesC;
    });
    if (sort === "rating") list = [...list].sort((a, b) => b.rating - a.rating);
    if (sort === "price-asc") list = [...list].sort((a, b) => parsePrice(a.price) - parsePrice(b.price));
    if (sort === "price-desc") list = [...list].sort((a, b) => parsePrice(b.price) - parsePrice(a.price));
    return list;
  }, [query, cat, sort]);

  return (
    <div className="min-h-screen flex flex-col">
      <Header />

      {/* HERO */}
      <section className="relative bg-primary text-primary-foreground overflow-hidden">
        <div className="absolute inset-0 bg-gradient-hero opacity-90" />
        <div className="container-page relative py-16 md:py-24">
          <span className="eyebrow text-highlight">Catálogo</span>
          <h1 className="mt-3 font-display font-black text-4xl md:text-6xl tracking-tight max-w-3xl">
            Todos os produtos que <span className="text-accent">já testamos</span>
          </h1>
          <p className="mt-4 text-lg text-primary-foreground/80 max-w-2xl">
            Cada item passou por análise prática da nossa equipe. Filtre por categoria, ordene por nota ou preço, e vá direto para a oferta.
          </p>
        </div>
      </section>

      {/* FILTERS */}
      <section className="border-b border-border bg-surface sticky top-16 z-30 backdrop-blur-md">
        <div className="container-page py-4 flex flex-col lg:flex-row gap-4 lg:items-center justify-between">
          <div className="relative flex-1 max-w-md">
            <Search className="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" />
            <input
              type="search"
              value={query}
              onChange={(e) => setQuery(e.target.value)}
              placeholder="Buscar produto..."
              className="w-full rounded-full border border-border bg-background pl-10 pr-4 py-2.5 text-sm focus:outline-none focus:border-accent transition-colors"
            />
          </div>

          <div className="flex flex-wrap items-center gap-2">
            <button
              onClick={() => setCat("Todos")}
              className={`rounded-full px-4 py-1.5 text-sm font-semibold border transition-colors ${
                cat === "Todos" ? "bg-primary text-primary-foreground border-primary" : "border-border hover:border-accent"
              }`}
            >
              Todos
            </button>
            {categories.map((c) => (
              <button
                key={c}
                onClick={() => setCat(c)}
                className={`rounded-full px-4 py-1.5 text-sm font-semibold border transition-colors ${
                  cat === c ? "bg-primary text-primary-foreground border-primary" : "border-border hover:border-accent"
                }`}
              >
                {c}
              </button>
            ))}
          </div>

          <select
            value={sort}
            onChange={(e) => setSort(e.target.value as typeof sort)}
            className="rounded-full border border-border bg-background px-4 py-2 text-sm font-semibold focus:outline-none focus:border-accent"
          >
            <option value="rating">Melhor avaliados</option>
            <option value="price-asc">Menor preço</option>
            <option value="price-desc">Maior preço</option>
          </select>
        </div>
      </section>

      {/* GRID */}
      <section className="container-page py-12">
        <p className="text-sm text-muted-foreground mb-6">
          {filtered.length} {filtered.length === 1 ? "produto encontrado" : "produtos encontrados"}
        </p>

        {filtered.length === 0 ? (
          <div className="text-center py-20 text-muted-foreground">
            Nenhum produto encontrado com esses filtros.
          </div>
        ) : (
          <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            {filtered.map((p) => (
              <article
                key={`${p.postSlug}-${p.name}`}
                className="group flex flex-col rounded-2xl border border-border bg-card overflow-hidden shadow-sm-soft hover:shadow-lg-soft hover:-translate-y-1 transition-all"
              >
                <Link to={`/blog/${p.postSlug}`} className="block aspect-[4/3] overflow-hidden bg-muted">
                  <img
                    src={p.image}
                    alt={p.name}
                    className="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500"
                  />
                </Link>
                <div className="p-5 flex flex-col flex-1">
                  <span className="eyebrow text-xs">{p.category}</span>
                  <h3 className="mt-2 font-display font-bold text-lg leading-tight">{p.name}</h3>

                  <div className="mt-2 flex items-center gap-2">
                    <div className="flex items-center gap-0.5">
                      {Array.from({ length: 5 }).map((_, i) => (
                        <Star
                          key={i}
                          className={`h-3.5 w-3.5 ${i < Math.round(p.rating) ? "fill-highlight text-highlight" : "text-muted"}`}
                        />
                      ))}
                    </div>
                    <span className="text-xs font-semibold text-muted-foreground">{p.rating.toFixed(1)}</span>
                  </div>

                  <div className="mt-3 grid grid-cols-2 gap-2 text-xs">
                    <div className="flex items-start gap-1 text-success">
                      <Check className="h-3.5 w-3.5 mt-0.5 flex-shrink-0" />
                      <span className="line-clamp-2">{p.pros[0]}</span>
                    </div>
                    {p.cons[0] && (
                      <div className="flex items-start gap-1 text-destructive">
                        <X className="h-3.5 w-3.5 mt-0.5 flex-shrink-0" />
                        <span className="line-clamp-2">{p.cons[0]}</span>
                      </div>
                    )}
                  </div>

                  <div className="mt-auto pt-5 flex items-end justify-between">
                    <div>
                      <p className="text-[10px] uppercase tracking-wider text-muted-foreground">A partir de</p>
                      <p className="font-display font-black text-xl text-accent">{p.price}</p>
                    </div>
                    <a
                      href={p.affiliateUrl}
                      target="_blank"
                      rel="noopener noreferrer sponsored"
                      className="rounded-full bg-gradient-accent px-4 py-2 text-xs font-bold text-accent-foreground shadow-md-soft hover:-translate-y-0.5 transition-transform"
                    >
                      Ver oferta
                    </a>
                  </div>

                  {p.postSlug && (
                    <Link
                      to={`/blog/${p.postSlug}`}
                      className="mt-3 text-xs font-semibold text-muted-foreground hover:text-accent transition-colors"
                    >
                      Ler review completa →
                    </Link>
                  )}
                </div>
              </article>
            ))}
          </div>
        )}
      </section>

      <Newsletter />
      <Footer />
    </div>
  );
};

export default Products;
