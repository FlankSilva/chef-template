import { useMemo, useState } from "react";
import { useSearchParams } from "react-router-dom";
import { Header } from "@/components/site/Header";
import { Footer } from "@/components/site/Footer";
import { PostCard } from "@/components/site/PostCard";
import { Newsletter } from "@/components/site/Newsletter";
import { posts, categories, type Category } from "@/data/posts";
import { Search } from "lucide-react";

const Blog = () => {
  const [params, setParams] = useSearchParams();
  const initial = (params.get("cat") as Category | null) ?? null;
  const [active, setActive] = useState<Category | null>(initial);
  const [query, setQuery] = useState("");

  const filtered = useMemo(() => {
    return posts.filter((p) => {
      const okCat = active ? p.category === active : true;
      const q = query.trim().toLowerCase();
      const okQuery = q
        ? p.title.toLowerCase().includes(q) || p.excerpt.toLowerCase().includes(q) || p.tags.some((t) => t.includes(q))
        : true;
      return okCat && okQuery;
    });
  }, [active, query]);

  const onPick = (c: Category | null) => {
    setActive(c);
    if (c) setParams({ cat: c });
    else setParams({});
  };

  const [feature, ...rest] = filtered;

  return (
    <div className="min-h-screen flex flex-col">
      <Header />

      {/* PAGE HEADER */}
      <section className="border-b border-border bg-surface">
        <div className="container-page py-14 md:py-20">
          <span className="eyebrow">Blog</span>
          <h1 className="mt-3 font-display font-black text-4xl md:text-6xl tracking-tight">
            Achados do Chef <span className="text-accent">— Reviews</span>
          </h1>
          <p className="mt-4 max-w-2xl text-muted-foreground text-lg">
            Reviews sérios, guias de compra e os melhores achados para a sua cozinha. Tudo testado pela nossa equipe.
          </p>

          {/* SEARCH */}
          <div className="mt-8 max-w-xl relative">
            <Search className="absolute left-4 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" />
            <input
              value={query}
              onChange={(e) => setQuery(e.target.value)}
              placeholder="Buscar reviews, marcas, produtos..."
              className="w-full rounded-full border border-border bg-background py-3.5 pl-11 pr-5 text-sm focus:outline-none focus:border-accent focus:ring-2 focus:ring-accent/20 transition"
            />
          </div>

          {/* CATEGORY FILTER */}
          <div className="mt-6 flex flex-wrap gap-2">
            <button
              onClick={() => onPick(null)}
              className={`rounded-full px-4 py-2 text-sm font-semibold border transition-colors ${
                !active ? "bg-primary text-primary-foreground border-primary" : "border-border bg-background hover:border-accent hover:text-accent"
              }`}
            >
              Todos
            </button>
            {categories.map((c) => (
              <button
                key={c}
                onClick={() => onPick(c)}
                className={`rounded-full px-4 py-2 text-sm font-semibold border transition-colors ${
                  active === c ? "bg-primary text-primary-foreground border-primary" : "border-border bg-background hover:border-accent hover:text-accent"
                }`}
              >
                {c}
              </button>
            ))}
          </div>
        </div>
      </section>

      {/* RESULTS */}
      <section className="container-page py-14">
        {filtered.length === 0 && (
          <p className="text-center text-muted-foreground py-20">Nenhum review encontrado para esses filtros.</p>
        )}

        {feature && (
          <div className="mb-12">
            <PostCard post={feature} variant="feature" />
          </div>
        )}

        {rest.length > 0 && (
          <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            {rest.map((p) => (
              <PostCard key={p.slug} post={p} />
            ))}
          </div>
        )}
      </section>

      <Newsletter />
      <Footer />
    </div>
  );
};

export default Blog;
