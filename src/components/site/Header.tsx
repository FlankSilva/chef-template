import { Link, NavLink, useLocation } from "react-router-dom";
import { Menu, Search, X } from "lucide-react";
import { useState } from "react";
import { categories } from "@/data/posts";
import { cn } from "@/lib/utils";

export const Header = () => {
  const [open, setOpen] = useState(false);
  const location = useLocation();

  return (
    <header className="sticky top-0 z-50 border-b border-border bg-background/85 backdrop-blur-md">
      <div className="container-page flex h-16 items-center justify-between gap-6">
        <Link to="/" className="flex items-center gap-2 group" aria-label="Achados do Chef — início">
          <span className="grid h-9 w-9 place-items-center rounded-md bg-gradient-accent text-accent-foreground font-black text-lg shadow-md-soft">
            A
          </span>
          <span className="hidden sm:flex flex-col leading-none">
            <span className="font-display font-black text-lg tracking-tight">Achados do Chef</span>
            <span className="text-[10px] uppercase tracking-[0.2em] text-muted-foreground mt-0.5">Reviews & guias</span>
          </span>
        </Link>

        <nav className="hidden lg:flex items-center gap-7 text-sm font-semibold">
          <NavLink to="/" end className={({ isActive }) => cn("link-underline", isActive && "text-accent")}>Home</NavLink>
          <NavLink to="/blog" className={({ isActive }) => cn("link-underline", isActive && "text-accent")}>Blog</NavLink>
          <NavLink to="/produtos" className={({ isActive }) => cn("link-underline", isActive && "text-accent")}>Produtos</NavLink>
          {categories.slice(0, 3).map((c) => (
            <Link key={c} to={`/blog?cat=${encodeURIComponent(c)}`} className="link-underline text-foreground/80 hover:text-foreground">
              {c}
            </Link>
          ))}
        </nav>

        <div className="flex items-center gap-2">
          <button aria-label="Buscar" className="hidden sm:grid h-10 w-10 place-items-center rounded-full hover:bg-muted transition-colors">
            <Search className="h-4 w-4" />
          </button>
          <button
            aria-label="Abrir menu"
            className="lg:hidden grid h-10 w-10 place-items-center rounded-full hover:bg-muted transition-colors"
            onClick={() => setOpen((v) => !v)}
          >
            {open ? <X className="h-5 w-5" /> : <Menu className="h-5 w-5" />}
          </button>
        </div>
      </div>

      {open && (
        <div className="lg:hidden border-t border-border bg-background animate-fade-in">
          <nav className="container-page py-4 flex flex-col gap-3 text-sm font-semibold">
            <Link to="/" onClick={() => setOpen(false)}>Home</Link>
            <Link to="/blog" onClick={() => setOpen(false)}>Blog</Link>
            <Link to="/produtos" onClick={() => setOpen(false)}>Produtos</Link>
            {categories.map((c) => (
              <Link key={c} to={`/blog?cat=${encodeURIComponent(c)}`} onClick={() => setOpen(false)} className="text-foreground/80">
                {c}
              </Link>
            ))}
          </nav>
        </div>
      )}
    </header>
  );
};
