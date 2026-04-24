import { useState } from "react";
import { toast } from "sonner";

export const Newsletter = () => {
  const [email, setEmail] = useState("");
  return (
    <section className="container-page my-20">
      <div className="relative overflow-hidden rounded-3xl bg-primary text-primary-foreground p-8 md:p-14">
        <div className="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-accent/20 blur-3xl" />
        <div className="absolute -left-10 -bottom-20 h-64 w-64 rounded-full bg-highlight/10 blur-3xl" />
        <div className="relative grid md:grid-cols-2 gap-8 items-center">
          <div>
            <span className="eyebrow text-highlight">Newsletter</span>
            <h2 className="mt-3 font-display font-black text-3xl md:text-4xl leading-tight">
              Os melhores achados, direto no seu e-mail.
            </h2>
            <p className="mt-3 text-primary-foreground/75 max-w-md">
              Reviews novos, ofertas reais e cupons exclusivos toda semana. Sem spam.
            </p>
          </div>
          <form
            onSubmit={(e) => {
              e.preventDefault();
              if (!email) return;
              toast.success("Inscrição confirmada!", { description: "Em breve você receberá nossas novidades." });
              setEmail("");
            }}
            className="flex flex-col sm:flex-row gap-3"
          >
            <input
              type="email"
              required
              placeholder="seu@email.com"
              value={email}
              onChange={(e) => setEmail(e.target.value)}
              className="flex-1 rounded-lg bg-primary-foreground/10 border border-primary-foreground/20 px-4 py-3 text-primary-foreground placeholder:text-primary-foreground/50 focus:outline-none focus:border-accent transition-colors"
            />
            <button
              type="submit"
              className="rounded-lg bg-gradient-accent px-6 py-3 font-bold text-accent-foreground shadow-lg-soft hover:-translate-y-0.5 transition-transform"
            >
              Inscrever
            </button>
          </form>
        </div>
      </div>
    </section>
  );
};
