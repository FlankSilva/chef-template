import { Link } from "react-router-dom";
import type { Post } from "@/data/posts";
import { ArrowUpRight } from "lucide-react";
import { cn } from "@/lib/utils";

interface Props {
  post: Post;
  variant?: "default" | "compact" | "feature";
}

export const PostCard = ({ post, variant = "default" }: Props) => {
  if (variant === "feature") {
    return (
      <Link
        to={`/blog/${post.slug}`}
        className="group relative block overflow-hidden rounded-2xl bg-primary text-primary-foreground shadow-lg-soft animate-fade-up"
      >
        <div className="aspect-[16/10] md:aspect-[16/9] overflow-hidden">
          <img
            src={post.cover}
            alt={post.title}
            width={1600}
            height={900}
            className="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105"
          />
        </div>
        <div className="absolute inset-0 bg-gradient-fade" />
        <div className="absolute bottom-0 left-0 right-0 p-6 md:p-10">
          <span className="eyebrow text-accent-foreground/90 mb-3 bg-accent px-3 py-1 rounded-full">{post.category}</span>
          <h2 className="mt-3 font-display font-black text-2xl md:text-4xl leading-[1.1] max-w-3xl">
            {post.title}
          </h2>
          <p className="mt-3 max-w-2xl text-sm md:text-base text-primary-foreground/85">{post.subtitle}</p>
          <div className="mt-5 flex items-center gap-4 text-xs uppercase tracking-wider text-primary-foreground/70">
            <span>{post.author}</span>
            <span>•</span>
            <span>{post.readingTime} de leitura</span>
          </div>
        </div>
      </Link>
    );
  }

  if (variant === "compact") {
    return (
      <Link to={`/blog/${post.slug}`} className="group flex gap-4 items-start">
        <div className="h-20 w-28 flex-shrink-0 overflow-hidden rounded-lg bg-muted">
          <img src={post.cover} alt={post.title} loading="lazy" width={400} height={300} className="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" />
        </div>
        <div className="flex-1 min-w-0">
          <span className="text-[10px] uppercase tracking-wider font-bold text-accent">{post.category}</span>
          <h3 className="mt-1 font-display font-bold text-sm leading-snug line-clamp-3 group-hover:text-accent transition-colors">{post.title}</h3>
        </div>
      </Link>
    );
  }

  return (
    <Link to={`/blog/${post.slug}`} className={cn("group flex flex-col overflow-hidden rounded-xl bg-card shadow-sm-soft hover:shadow-md-soft transition-all duration-300 hover:-translate-y-1")}>
      <div className="aspect-[4/3] overflow-hidden bg-muted">
        <img
          src={post.cover}
          alt={post.title}
          loading="lazy"
          width={1024}
          height={768}
          className="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
        />
      </div>
      <div className="flex flex-1 flex-col p-5">
        <div className="flex items-center justify-between">
          <span className="eyebrow">{post.category}</span>
          <ArrowUpRight className="h-4 w-4 text-muted-foreground transition-all group-hover:text-accent group-hover:rotate-12" />
        </div>
        <h3 className="mt-3 font-display font-bold text-lg leading-tight line-clamp-3 group-hover:text-accent transition-colors">
          {post.title}
        </h3>
        <p className="mt-2 text-sm text-muted-foreground line-clamp-2">{post.excerpt}</p>
        <div className="mt-auto pt-4 flex items-center gap-3 text-xs text-muted-foreground border-t border-border mt-5">
          <span className="font-semibold text-foreground">{post.author}</span>
          <span>•</span>
          <span>{post.date}</span>
          <span>•</span>
          <span>{post.readingTime}</span>
        </div>
      </div>
    </Link>
  );
};
