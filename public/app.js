(() => {
  const menuToggle = document.getElementById("menuToggle");
  const mobileMenu = document.getElementById("mobileMenu");

  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden");
    });
  }

  const affiliateCard = document.getElementById("product-affiliate-card");
  const affiliateFloatBar = document.getElementById("affiliate-float-bar");
  if (affiliateCard && affiliateFloatBar) {
    const syncFloatFromCard = () => {
      const link = document.getElementById("affiliate-float-link");
      if (!link) return;
      link.href = affiliateCard.getAttribute("href") || link.href;
      const t = affiliateCard.getAttribute("target");
      const r = affiliateCard.getAttribute("rel");
      if (t) link.setAttribute("target", t);
      else link.removeAttribute("target");
      if (r) link.setAttribute("rel", r);
      else link.removeAttribute("rel");
    };
    syncFloatFromCard();

    const setFloatVisible = (show) => {
      affiliateFloatBar.classList.toggle("is-visible", show);
      affiliateFloatBar.setAttribute("aria-hidden", show ? "false" : "true");
    };

    const observer = new IntersectionObserver(
      (entries) => {
        const entry = entries[0];
        if (!entry) return;
        const anyPartVisible = entry.isIntersecting;
        setFloatVisible(!anyPartVisible);
      },
      { root: null, threshold: 0, rootMargin: "0px" }
    );
    observer.observe(affiliateCard);
  }

  document.querySelectorAll(".share-article-btn").forEach((btn) => {
    btn.addEventListener("click", async () => {
      const title = btn.getAttribute("data-share-title") || document.title;
      const url = window.location.href;
      if (navigator.share) {
        try {
          await navigator.share({ title, url });
        } catch {
          /* user cancelled or share failed */
        }
        return;
      }
      try {
        await navigator.clipboard.writeText(url);
        alert("Link copiado para a área de transferência.");
      } catch {
        prompt("Copie o link:", url);
      }
    });
  });
})();
