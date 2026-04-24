(() => {
  const menuToggle = document.getElementById("menuToggle");
  const mobileMenu = document.getElementById("mobileMenu");

  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden");
    });
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
