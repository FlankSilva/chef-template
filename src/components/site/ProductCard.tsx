import type { Product } from "@/data/posts";
import { Check, Star, X } from "lucide-react";

export const ProductCard = ({ product, rank }: { product: Product; rank?: number }) => {
  return (
    <article className="relative rounded-2xl border border-border bg-card p-6 md:p-8 shadow-sm-soft hover:shadow-md-soft transition-shadow">
      {rank && (
        <span className="absolute -top-4 left-6 grid h-10 w-10 place-items-center rounded-full bg-accent text-accent-foreground font-black text-base shadow-md-soft">
          {rank}º
        </span>
      )}
      <div className="flex flex-col md:flex-row md:items-start md:justify-between gap-4 mb-5">
        <div>
          <h3 className="font-display font-bold text-xl md:text-2xl">{product.name}</h3>
          <div className="mt-2 flex items-center gap-2">
            <div className="flex items-center gap-0.5">
              {Array.from({ length: 5 }).map((_, i) => (
                <Star
                  key={i}
                  className={`h-4 w-4 ${i < Math.round(product.rating) ? "fill-highlight text-highlight" : "text-muted"}`}
                />
              ))}
            </div>
            <span className="text-sm font-semibold">{product.rating.toFixed(1)}</span>
          </div>
        </div>
        <div className="text-right">
          <p className="text-xs uppercase tracking-wider text-muted-foreground">A partir de</p>
          <p className="font-display font-black text-2xl text-accent">{product.price}</p>
        </div>
      </div>

      <div className="grid sm:grid-cols-2 gap-4 mb-6">
        <div>
          <h4 className="text-xs font-bold uppercase tracking-wider text-success mb-2">Pontos fortes</h4>
          <ul className="space-y-1.5">
            {product.pros.map((p) => (
              <li key={p} className="flex items-start gap-2 text-sm">
                <Check className="h-4 w-4 text-success mt-0.5 flex-shrink-0" />
                <span>{p}</span>
              </li>
            ))}
          </ul>
        </div>
        <div>
          <h4 className="text-xs font-bold uppercase tracking-wider text-destructive mb-2">Pontos fracos</h4>
          <ul className="space-y-1.5">
            {product.cons.map((c) => (
              <li key={c} className="flex items-start gap-2 text-sm">
                <X className="h-4 w-4 text-destructive mt-0.5 flex-shrink-0" />
                <span>{c}</span>
              </li>
            ))}
          </ul>
        </div>
      </div>

      <a
        href={product.affiliateUrl}
        target="_blank"
        rel="noopener noreferrer sponsored"
        className="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-gradient-accent px-6 py-3 font-bold text-accent-foreground shadow-md-soft hover:shadow-lg-soft hover:-translate-y-0.5 transition-all"
      >
        Ver oferta
      </a>
    </article>
  );
};
