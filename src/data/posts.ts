import knives from "@/assets/post-knives.jpg";
import mixer from "@/assets/post-mixer.jpg";
import airfryer from "@/assets/post-airfryer.jpg";
import coffee from "@/assets/post-coffee.jpg";
import skillet from "@/assets/post-skillet.jpg";
import blender from "@/assets/post-blender.jpg";

export type Category =
  | "Facas"
  | "Eletroportáteis"
  | "Panelas"
  | "Cafeteiras"
  | "Liquidificadores"
  | "Utensílios";

export interface Product {
  name: string;
  price: string;
  rating: number;
  pros: string[];
  cons: string[];
  affiliateUrl: string;
  image?: string;
  category?: Category;
  postSlug?: string;
}

export interface Post {
  slug: string;
  title: string;
  subtitle: string;
  category: Category;
  cover: string;
  author: string;
  date: string;
  readingTime: string;
  excerpt: string;
  intro: string[];
  sections: { heading: string; paragraphs: string[] }[];
  products: Product[];
  tags: string[];
}

export const posts: Post[] = [
  {
    slug: "melhores-facas-de-chef-2025",
    title: "As 5 melhores facas de chef de 2025: o teste definitivo",
    subtitle: "Testamos lâminas premium e custo-benefício para descobrir qual merece um lugar na sua bancada.",
    category: "Facas",
    cover: knives,
    author: "Equipe Achados do Chef",
    date: "18 Abr 2025",
    readingTime: "8 min",
    excerpt: "Comparamos 12 modelos de facas de chef em corte, equilíbrio e durabilidade. Veja quais venceram.",
    intro: [
      "A faca de chef é o coração de qualquer cozinha. É ela que vai te acompanhar todos os dias — picando cebola, fatiando carnes, esmagando alho. Investir bem nesse item significa cozinhar com mais prazer, segurança e velocidade.",
      "Para esta review, testamos 12 modelos populares no Brasil, comparando o fio de fábrica, o equilíbrio na mão, a retenção do gume após 30 dias de uso intenso e o custo-benefício. Abaixo, as 5 que se destacaram.",
      "Importante: não existe a 'melhor faca do mundo'. Existe a melhor faca para o seu tipo de mão, sua frequência de uso e seu orçamento. Por isso, separamos as recomendações em três faixas de preço — entrada, intermediária e premium — para que você encontre exatamente o que precisa.",
    ],
    sections: [
      {
        heading: "Como escolhemos as melhores",
        paragraphs: [
          "Nosso time cozinha profissionalmente há mais de 10 anos. Cada faca passou por testes padronizados: corte de tomate maduro (avalia precisão), picado de cebola (avalia equilíbrio) e fatias finas de carne (avalia retenção de fio).",
          "Também avaliamos conforto do cabo, peso, acabamento e — importante — a facilidade de manutenção em casa. Uma faca incrível que exige afiação profissional toda semana não é prática para a maioria das pessoas.",
          "Cada modelo recebeu uma nota de 0 a 10 em cinco critérios: corte, equilíbrio, durabilidade, ergonomia e custo-benefício. A média final determinou o ranking apresentado abaixo.",
        ],
      },
      {
        heading: "O que olhar antes de comprar",
        paragraphs: [
          "Material da lâmina: aço inox alto carbono (X50CrMoV15) é o equilíbrio ideal entre durabilidade e facilidade de afiação. Aços japoneses como VG-10 oferecem fio mais agressivo, mas exigem mais cuidado.",
          "Tamanho: 20 cm é o padrão recomendado para uso doméstico. 15 cm para mãos menores; 25 cm apenas se você cozinha em grande volume.",
          "Cabo: prefira cabos rebitados ou de uma peça só (full tang). Mais durável e mais higiênico. Evite cabos ocos — quebram com o tempo e acumulam resíduos.",
          "Peso: facas mais pesadas (200g+) cortam por gravidade — boas para carnes e legumes duros. Facas leves (150g) exigem mais técnica, mas dão precisão para trabalhos delicados.",
        ],
      },
      {
        heading: "Cuidados para a faca durar décadas",
        paragraphs: [
          "Nunca lave em máquina de lavar louça. O calor, o detergente alcalino e o choque com outros utensílios destroem o fio e danificam o cabo.",
          "Seque imediatamente após lavar. Mesmo aços inoxidáveis podem manchar se ficarem úmidos por muito tempo.",
          "Use uma chaira (afiador de cerâmica) duas vezes por semana para manter o fio alinhado. A afiação completa em pedra pode ser feita a cada 3 a 6 meses, dependendo da frequência de uso.",
        ],
      },
    ],
    products: [
      {
        name: "Tramontina Century 8\"",
        price: "R$ 489",
        rating: 4.8,
        pros: ["Aço NSF, ótima retenção", "Cabo ergonômico", "Excelente custo-benefício"],
        cons: ["Pesa um pouco mais que concorrentes"],
        affiliateUrl: "#",
        image: knives,
        category: "Facas",
      },
      {
        name: "Mundial Premium Forged",
        price: "R$ 329",
        rating: 4.6,
        pros: ["Equilíbrio impecável", "Bom para iniciantes"],
        cons: ["Fio de fábrica poderia ser melhor"],
        affiliateUrl: "#",
        image: knives,
        category: "Facas",
      },
      {
        name: "Wüsthof Classic Ikon",
        price: "R$ 1.890",
        rating: 4.9,
        pros: ["Padrão profissional alemão", "Retém fio por meses"],
        cons: ["Preço alto", "Exige cuidado na limpeza"],
        affiliateUrl: "#",
        image: knives,
        category: "Facas",
      },
    ],
    tags: ["facas", "chef", "review", "comparativo"],
  },
  {
    slug: "batedeira-planetaria-vale-a-pena",
    title: "Batedeira planetária vale a pena? Testamos por 60 dias",
    subtitle: "Da KitchenAid à Mondial: quem realmente entrega o que promete.",
    category: "Eletroportáteis",
    cover: mixer,
    author: "Marina Costa",
    date: "12 Abr 2025",
    readingTime: "10 min",
    excerpt: "A planetária mudou a forma como assamos pão em casa. Veja quais modelos justificam o investimento.",
    intro: [
      "Se você gosta de panificação, biscoitos ou massas mais consistentes, uma batedeira planetária faz toda a diferença. O movimento orbital incorpora ar de forma uniforme — algo que uma batedeira comum simplesmente não faz.",
      "Mas com modelos variando de R$ 600 a R$ 6 mil, vale realmente a pena investir alto? Para responder, testamos seis planetárias durante dois meses, em receitas reais de uma padaria caseira.",
    ],
    sections: [
      {
        heading: "O teste prático",
        paragraphs: [
          "Fizemos 4 receitas em cada modelo durante 60 dias: pão de fermentação natural, brioche, merengue italiano e massa de pizza. Avaliamos potência, ruído, estabilidade e acabamento.",
          "Massas pesadas como pão de batata e brioche são o verdadeiro teste de fogo: exigem motor robusto e estrutura estável. Modelos de plástico tendem a 'andar' pela bancada nesses casos.",
        ],
      },
      {
        heading: "Quando uma planetária NÃO compensa",
        paragraphs: [
          "Se você só faz bolo simples uma vez por mês, uma batedeira comum resolve. Planetária faz sentido a partir de 2 a 3 usos por semana, ou quando você trabalha com massas pesadas.",
          "Considere também o espaço: planetárias ocupam bastante bancada e pesam de 8 a 12 kg. Tirar e guardar toda hora desestimula o uso.",
        ],
      },
      {
        heading: "Acessórios que valem cada centavo",
        paragraphs: [
          "Gancho para massa pesada (substitui o batedor padrão), batedor flat para cremes e o cilindro para abrir massa de pastel ou pizza. Esses três acessórios extras transformam a planetária em uma mini fábrica de cozinha.",
        ],
      },
    ],
    products: [
      {
        name: "KitchenAid Artisan 4.8L",
        price: "R$ 4.299",
        rating: 4.9,
        pros: ["Construção em metal", "Encaixes universais", "Garantia robusta"],
        cons: ["Preço elevado"],
        affiliateUrl: "#",
        image: mixer,
        category: "Eletroportáteis",
      },
      {
        name: "Mondial Premium Plus",
        price: "R$ 699",
        rating: 4.3,
        pros: ["Ótimo custo-benefício", "Bom para uso ocasional"],
        cons: ["Estrutura plástica", "Vibra em massas pesadas"],
        affiliateUrl: "#",
        image: mixer,
        category: "Eletroportáteis",
      },
    ],
    tags: ["batedeira", "planetária", "panificação"],
  },
  {
    slug: "melhores-airfryers-ate-500-reais",
    title: "Melhores airfryers até R$ 500: o ranking de 2025",
    subtitle: "Comparativo entre 8 modelos populares — quem frita mais crocante e gasta menos energia.",
    category: "Eletroportáteis",
    cover: airfryer,
    author: "Equipe Achados do Chef",
    date: "08 Abr 2025",
    readingTime: "6 min",
    excerpt: "Airfryer bom não precisa custar caro. Veja modelos de 4L com ótimo desempenho por menos de R$ 500.",
    intro: [
      "A airfryer virou item indispensável. Mas com tantos modelos, qual escolher sem gastar muito?",
      "Testamos oito modelos populares dentro do orçamento de R$ 500 — todos com capacidade entre 3,5L e 5L, suficiente para uma família de até quatro pessoas.",
    ],
    sections: [
      {
        heading: "Critérios de avaliação",
        paragraphs: [
          "Avaliamos crocância (batata congelada), uniformidade (asinhas de frango), consumo (kWh por hora), ruído em decibéis, e facilidade de limpeza da cesta.",
          "Também medimos o tempo de pré-aquecimento — um fator que muita review ignora, mas que faz diferença real no dia a dia.",
        ],
      },
      {
        heading: "O que esperar de uma airfryer barata",
        paragraphs: [
          "Modelos abaixo de R$ 500 normalmente têm cesta antiaderente comum (não cerâmica), painel mecânico ou digital simples, e potência entre 1200W e 1500W.",
          "Você não terá funções como air grill, desidratador ou janela de visualização — mas para fritar batata, esquentar salgado e assar frango, a performance é praticamente idêntica aos modelos top.",
        ],
      },
    ],
    products: [
      {
        name: "Mondial Family AF-31",
        price: "R$ 379",
        rating: 4.5,
        pros: ["4L de capacidade", "Cesta antiaderente", "Painel digital"],
        cons: ["Manual em português poderia ser melhor"],
        affiliateUrl: "#",
        image: airfryer,
        category: "Eletroportáteis",
      },
      {
        name: "Philips Walita Daily",
        price: "R$ 499",
        rating: 4.7,
        pros: ["Marca consagrada", "Tecnologia Rapid Air", "Silenciosa"],
        cons: ["Cesta menor (3,5L)"],
        affiliateUrl: "#",
        image: airfryer,
        category: "Eletroportáteis",
      },
    ],
    tags: ["airfryer", "fritadeira", "barato"],
  },
  {
    slug: "cafeteira-espresso-domestica",
    title: "Cafeteira espresso doméstica: 4 modelos que valem o investimento",
    subtitle: "Do Nespresso ao manual: qual entrega o melhor café no seu orçamento.",
    category: "Cafeteiras",
    cover: coffee,
    author: "João Beraldo",
    date: "02 Abr 2025",
    readingTime: "7 min",
    excerpt: "Para os apaixonados por café, escolhemos máquinas que vão de R$ 800 a R$ 5 mil.",
    intro: [
      "Café espresso de cafeteria em casa? É possível — e nem sempre exige uma fortuna.",
      "Mas é bom alinhar expectativas: extrair um espresso de verdade exige pressão de 9 bar, água a temperatura precisa e moagem na hora. Cada uma dessas variáveis influencia mais o resultado do que a marca da máquina.",
    ],
    sections: [
      {
        heading: "Tipos de cafeteira",
        paragraphs: [
          "Cápsula (Nespresso, Dolce Gusto): praticidade máxima, sabor consistente, mas custo por dose alto e pouca variedade real.",
          "Manual com bomba: você controla tudo, exige técnica, recompensa com o melhor sabor possível na faixa.",
          "Semi-automática: bomba e vaporizador integrados, ideal para quem quer aprender a fazer cappuccino.",
          "Automática com moedor: aperta um botão e sai pronto. Confortável, cara, e o moedor integrado faz toda a diferença.",
        ],
      },
      {
        heading: "Não esqueça do moedor",
        paragraphs: [
          "Café moído pré-pronto perde 70% do aroma em 24 horas. Para quem leva o espresso a sério, um moedor de qualidade (R$ 800+) é tão importante quanto a máquina.",
          "Modelos com moedor integrado economizam espaço, mas geralmente têm moedores menos precisos que opções dedicadas.",
        ],
      },
    ],
    products: [
      {
        name: "Oster Prima Latte",
        price: "R$ 1.199",
        rating: 4.4,
        pros: ["15 bar de pressão", "Vaporizador integrado"],
        cons: ["Reservatório pequeno"],
        affiliateUrl: "#",
        image: coffee,
        category: "Cafeteiras",
      },
      {
        name: "Nespresso Vertuo Next",
        price: "R$ 899",
        rating: 4.6,
        pros: ["Praticidade total", "Crema impecável", "Várias opções de cápsula"],
        cons: ["Custo por dose alto", "Restrita a cápsulas Nespresso"],
        affiliateUrl: "#",
        image: coffee,
        category: "Cafeteiras",
      },
    ],
    tags: ["café", "espresso", "cafeteira"],
  },
  {
    slug: "frigideiras-de-ferro-fundido",
    title: "Frigideiras de ferro fundido: por que toda cozinha deveria ter uma",
    subtitle: "Durabilidade de décadas, retenção de calor incomparável e o segredo de um bom selado.",
    category: "Panelas",
    cover: skillet,
    author: "Marina Costa",
    date: "28 Mar 2025",
    readingTime: "5 min",
    excerpt: "Testamos 5 frigideiras de ferro fundido — e descobrimos por que chefs profissionais juram por elas.",
    intro: [
      "O ferro fundido é o utensílio mais antigo ainda em uso. E há motivos para isso.",
      "Diferente de panelas antiaderentes que precisam ser trocadas a cada 2 ou 3 anos, uma frigideira de ferro fundido bem cuidada dura literalmente uma vida inteira — e fica melhor com o tempo.",
    ],
    sections: [
      {
        heading: "Como cuidar",
        paragraphs: [
          "Nunca use detergente. Limpe com sal grosso e óleo. Quanto mais usa, melhor fica.",
          "Após cada uso, seque no fogo baixo por 1 minuto e passe uma camada fina de óleo vegetal. Esse processo cria a 'pátina' — a camada antiaderente natural do ferro fundido.",
        ],
      },
      {
        heading: "O que faz diferença no resultado",
        paragraphs: [
          "Retenção de calor: o ferro mantém a temperatura mesmo quando você joga alimento gelado. Resultado? Selado real, sem cozinhar a carne na própria água.",
          "Versatilidade: vai do fogão direto para o forno. Perfeita para receitas que começam selando e terminam assando, como bife com manteiga aromatizada ou pão de fermentação natural.",
        ],
      },
    ],
    products: [
      {
        name: "Lodge Chef Collection 30cm",
        price: "R$ 549",
        rating: 4.9,
        pros: ["Pré-temperada", "Dura para sempre", "Vai ao forno"],
        cons: ["Pesada", "Exige cuidado"],
        affiliateUrl: "#",
        image: skillet,
        category: "Panelas",
      },
      {
        name: "Tramontina Profissional 26cm",
        price: "R$ 289",
        rating: 4.5,
        pros: ["Nacional, fácil de achar", "Bom acabamento"],
        cons: ["Precisa temperar antes do primeiro uso"],
        affiliateUrl: "#",
        image: skillet,
        category: "Panelas",
      },
    ],
    tags: ["panelas", "ferro fundido"],
  },
  {
    slug: "liquidificadores-potentes",
    title: "Liquidificadores potentes: 1000W realmente faz diferença?",
    subtitle: "Triturando frutas congeladas, gelo e legumes fibrosos — testamos para descobrir.",
    category: "Liquidificadores",
    cover: blender,
    author: "Equipe Achados do Chef",
    date: "20 Mar 2025",
    readingTime: "6 min",
    excerpt: "Comparamos liquidificadores de 800W a 1400W em testes pesados. Veja quem aguentou.",
    intro: [
      "Potência alta significa mais durabilidade do motor — não só smoothies mais lisos.",
      "Um liquidificador de 800W processando gelo todo dia tende a queimar em 1 a 2 anos. Já um modelo de 1200W+ aguenta o mesmo uso por uma década.",
    ],
    sections: [
      {
        heading: "Smoothie test",
        paragraphs: [
          "Banana congelada + manga + espinafre. Quanto tempo até ficar liso?",
          "Modelos de 800W levaram em média 90 segundos e deixaram pedaços de fibra. Os de 1200W resolveram em 35 segundos com textura sedosa.",
        ],
      },
      {
        heading: "Detalhes que importam mais que watts",
        paragraphs: [
          "Formato das lâminas: lâminas em estrela (4 a 6 pontas) trabalham melhor que lâminas planas tradicionais.",
          "Material da jarra: vidro é mais higiênico e não absorve odor. Plástico é mais leve e seguro contra quedas.",
          "Encaixe: o sistema de fixação da jarra na base é o ponto mais comum de falha. Modelos com encaixe metálico duram mais.",
        ],
      },
    ],
    products: [
      {
        name: "Philips Walita ProBlend",
        price: "R$ 489",
        rating: 4.6,
        pros: ["1200W", "Lâminas em estrela", "Jarra de vidro"],
        cons: ["Mais alto que concorrentes"],
        affiliateUrl: "#",
        image: blender,
        category: "Liquidificadores",
      },
      {
        name: "Oster Versa Pro",
        price: "R$ 1.299",
        rating: 4.8,
        pros: ["1400W", "Smoothie profissional", "Jarra Tritan resistente"],
        cons: ["Caro", "Volumoso"],
        affiliateUrl: "#",
        image: blender,
        category: "Liquidificadores",
      },
    ],
    tags: ["liquidificador", "smoothie"],
  },
];

export const categories: Category[] = [
  "Facas",
  "Eletroportáteis",
  "Panelas",
  "Cafeteiras",
  "Liquidificadores",
  "Utensílios",
];

export function getPostBySlug(slug: string) {
  return posts.find((p) => p.slug === slug);
}

// All products flattened with reference to source post
export const allProducts: Product[] = posts.flatMap((post) =>
  post.products.map((p) => ({
    ...p,
    image: p.image ?? post.cover,
    category: p.category ?? post.category,
    postSlug: post.slug,
  }))
);
