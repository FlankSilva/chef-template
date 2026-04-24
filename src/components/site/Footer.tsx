import { Link } from "react-router-dom";
import { categories } from "@/data/posts";

export const Footer = () => {
  return (
    <footer className="mt-24 border-t border-border bg-primary text-primary-foreground">
      <div className="container-page py-14 grid gap-10 md:grid-cols-4">
        <div className="md:col-span-2">
          <div className="flex items-center gap-2 mb-4">
            <span className="grid h-9 w-9 place-items-center rounded-md bg-gradient-accent text-accent-foreground font-black text-lg">A</span>
            <span className="font-display font-black text-xl">Achados do Chef</span>
          </div>
          <p className="text-sm text-primary-foreground/70 max-w-md leading-relaxed">
            Reviews honestos, comparativos sérios e guias de compra dos melhores produtos para a sua cozinha.
            Testamos antes de recomendar.
          </p>
        </div>

        <div>
          <h4 className="font-bold text-sm uppercase tracking-wider mb-4">Categorias</h4>
          <ul className="space-y-2 text-sm text-primary-foreground/80">
            {categories.map((c) => (
              <li key={c}>
                <Link to={`/blog?cat=${encodeURIComponent(c)}`} className="hover:text-accent transition-colors">{c}</Link>
              </li>
            ))}
          </ul>
        </div>

        <div>
          <h4 className="font-bold text-sm uppercase tracking-wider mb-4">Sobre</h4>
          <ul className="space-y-2 text-sm text-primary-foreground/80">
            <li><Link to="/blog" className="hover:text-accent transition-colors">Todos os reviews</Link></li>
            <li><Link to="/produtos" className="hover:text-accent transition-colors">Catálogo de produtos</Link></li>
            <li><Link to="/design-system" className="hover:text-accent transition-colors">Design system</Link></li>
            <li><a href="#" className="hover:text-accent transition-colors">Como testamos</a></li>
            <li><a href="#" className="hover:text-accent transition-colors">Política de afiliados</a></li>
            <li><a href="#" className="hover:text-accent transition-colors">Contato</a></li>
          </ul>
        </div>
      </div>

      <div className="border-t border-primary-foreground/10">
        <div className="container-page py-6 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-primary-foreground/60">
          <p>© {new Date().getFullYear()} Achados do Chef. Todos os direitos reservados.</p>
          <p>Alguns links são afiliados — podemos receber comissão sem custo extra para você.</p>
        </div>
      </div>
    </footer>
  );
};
