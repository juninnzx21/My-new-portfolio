/**
* Template Name: iPortfolio
* Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
* Updated: Jun 29 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

(function() {
  "use strict";

  const translations = {
    en: {
      "nav.home": "Home",
      "nav.about": "About",
      "nav.experience": "Experience",
      "nav.projects": "Projects",
      "nav.contact": "Contact",
      "hero.eyebrow": "Available for Brazil and international opportunities",
      "hero.name": "Junior Rodrigues",
      "hero.prefix": "I build as a",
      "hero.summary": "Full Stack PHP/Laravel developer focused on internal tools, business systems, and reliable web applications for real-world operations.",
      "hero.pill1": "Laravel",
      "hero.pill2": "Business Systems",
      "hero.pill3": "Remote Ready",
      "hero.ctaProjects": "View Projects",
      "hero.ctaContact": "Let's Talk",
      "hero.ctaResume": "Download Resume",
      "hero.panelLabel": "What I Build",
      "hero.cap1": "Laravel applications for internal operations",
      "hero.cap2": "Admin panels, task flows, and CRUD systems",
      "hero.cap3": "Responsive interfaces connected to business logic",
      "hero.cap4": "Production maintenance, support, and improvements",
      "hero.metric1": "Backend-first delivery",
      "hero.metric2": "Operational data workflows",
      "hero.metric3": "Practical dev workflow",
      "about.title": "About",
      "about.intro": "I am a Full Stack Developer based in Belo Horizonte, Brazil, with hands-on experience building and maintaining business systems, internal tools, and production web applications. My work combines software delivery, operational support, and continuous improvement of live systems.",
      "about.badge": "Profile Snapshot",
      "about.role": "Full Stack PHP/Laravel Developer",
      "about.availabilityChip": "Open to remote work",
      "about.lead": "I build maintainable web applications with Laravel, PHP, MySQL, JavaScript, jQuery, Bootstrap, and Docker. My background also includes production support, system maintenance, troubleshooting, and collaboration with business teams.",
      "about.body": "I am currently studying Systems Analysis and Development and positioning myself for backend and full stack opportunities in Brazil and international markets, especially roles involving Laravel applications, internal systems, APIs, and operational workflows.",
      "about.factLocationLabel": "Location",
      "about.factLocationValue": "Belo Horizonte, Brazil",
      "about.factFocusLabel": "Focus",
      "about.factFocusValue": "Backend and full stack systems",
      "about.factStackLabel": "Primary Stack",
      "about.factStackValue": "Laravel, PHP, MySQL, JavaScript",
      "about.factLanguageLabel": "Languages",
      "about.factLanguageValue": "Portuguese, English in progress",
      "about.factAvailabilityLabel": "Availability",
      "about.factAvailabilityValue": "Remote, hybrid, contract, full-time",
      "about.factContactLabel": "Contact",
      "about.linkedin": "LinkedIn Profile",
      "about.github": "GitHub Profile",
      "about.whatsapp": "WhatsApp Contact",
      "skills.title": "Skills",
      "skills.intro": "I prefer to present my stack by real usage and delivery context instead of inflated percentage bars. These are the technologies and responsibilities that best represent my current profile.",
      "skills.card1Title": "Backend",
      "skills.card1Text": "Laravel and PHP for business rules, CRUD flows, authentication, and production-facing internal tools.",
      "skills.card2Title": "Frontend",
      "skills.card2Text": "Blade, Bootstrap, JavaScript, jQuery, and responsive UI work designed for practical day-to-day business usage.",
      "skills.card3Title": "Data Layer",
      "skills.card3Text": "Relational data modeling, data persistence, validation flows, and operational database work with MySQL and MariaDB.",
      "skills.card4Title": "Workflow and Support",
      "skills.card4Text": "Bug fixing, maintenance, operational support, issue triage, and iterative improvement of live systems.",
      "skills.card5Title": "Dev Workflow",
      "skills.card5Text": "Version control, branch-based delivery, repository hygiene, and practical collaboration using GitHub and GitLab.",
      "skills.card6Title": "Environment",
      "skills.card6Text": "Docker-based local environments, Linux familiarity, and infrastructure awareness shaped by technical support work.",
      "build.title": "What I Build",
      "build.intro": "I am most valuable when the work requires clear logic, operational reliability, and practical delivery for business teams.",
      "build.card1Title": "Internal Tools",
      "build.card1Text": "Admin areas, task systems, forms, and CRUD interfaces that help teams work with less friction.",
      "build.card2Title": "Business Systems",
      "build.card2Text": "Applications shaped around workflows, operational routines, and real business data.",
      "build.card3Title": "Reliable Maintenance",
      "build.card3Text": "Fixes, improvements, and support for systems that cannot stop when operations depend on them.",
      "projects.title": "Featured Projects",
      "projects.intro": "These projects represent the type of work I want to keep doing: useful systems, clear workflows, practical interfaces, and maintainable backend logic.",
      "projects.card1Problem": "Problem solved: organize course records with a simple and editable workflow.",
      "projects.card1Solution": "Built a PHP CRUD flow with real-time persistence for creating, editing, and removing courses.",
      "projects.card2Problem": "Problem solved: present a business offer clearly and capture leads in a responsive interface.",
      "projects.card2Solution": "Structured service pages, CTAs, content blocks, and contact flow for conversion-oriented browsing.",
      "projects.card3Problem": "Problem solved: manage tasks, user actions, and categories through a structured application flow.",
      "projects.card3Solution": "Implemented auth, task CRUD, categories, profile screens, and responsive UI using Laravel and Blade.",
      "projects.liveDemo": "Live Demo",
      "projects.caseStudy": "Case Study",
      "contact.title": "Let's Talk",
      "contact.intro1": "Available for backend and full stack opportunities in Brazil and internationally.",
      "contact.intro2": "If you are hiring, recruiting, or looking for someone to build and maintain business systems, send me a message.",
      "contact.phone": "Phone",
      "contact.email": "Email",
      "contact.linkedin": "Connect with me"
    },
    "pt-BR": {
      "nav.home": "Inicio",
      "nav.about": "Sobre",
      "nav.experience": "Experiencia",
      "nav.projects": "Projetos",
      "nav.contact": "Contato",
      "hero.eyebrow": "Disponivel para oportunidades no Brasil e exterior",
      "hero.name": "Junior Rodrigues",
      "hero.prefix": "Eu atuo como",
      "hero.summary": "Desenvolvedor Full Stack PHP/Laravel focado em ferramentas internas, sistemas de negocio e aplicacoes web confiaveis para operacoes reais.",
      "hero.pill1": "Laravel",
      "hero.pill2": "Sistemas de Negocio",
      "hero.pill3": "Pronto para Remoto",
      "hero.ctaProjects": "Ver Projetos",
      "hero.ctaContact": "Vamos Conversar",
      "hero.ctaResume": "Baixar Curriculo",
      "hero.panelLabel": "O que eu construo",
      "hero.cap1": "Aplicacoes Laravel para operacoes internas",
      "hero.cap2": "Paineis administrativos, fluxos de tarefas e sistemas CRUD",
      "hero.cap3": "Interfaces responsivas conectadas a logica de negocio",
      "hero.cap4": "Manutencao, suporte e melhorias em producao",
      "hero.metric1": "Entrega com foco em backend",
      "hero.metric2": "Fluxos operacionais com dados",
      "hero.metric3": "Workflow pratico de desenvolvimento",
      "about.title": "Sobre",
      "about.intro": "Sou um desenvolvedor Full Stack em Belo Horizonte, com experiencia pratica na construcao e manutencao de sistemas de negocio, ferramentas internas e aplicacoes web em producao. Meu trabalho combina entrega de software, suporte operacional e melhoria continua de sistemas ativos.",
      "about.badge": "Resumo do Perfil",
      "about.role": "Desenvolvedor Full Stack PHP/Laravel",
      "about.availabilityChip": "Aberto a trabalho remoto",
      "about.lead": "Construo aplicacoes web manuteniveis com Laravel, PHP, MySQL, JavaScript, jQuery, Bootstrap e Docker. Minha base tambem inclui suporte em producao, manutencao de sistemas, troubleshooting e colaboracao com times de negocio.",
      "about.body": "Atualmente curso Analise e Desenvolvimento de Sistemas e estou me posicionando para vagas backend e full stack no Brasil e no exterior, especialmente em aplicacoes Laravel, sistemas internos, APIs e fluxos operacionais.",
      "about.factLocationLabel": "Localizacao",
      "about.factLocationValue": "Belo Horizonte, Brasil",
      "about.factFocusLabel": "Foco",
      "about.factFocusValue": "Sistemas backend e full stack",
      "about.factStackLabel": "Stack Principal",
      "about.factStackValue": "Laravel, PHP, MySQL, JavaScript",
      "about.factLanguageLabel": "Idiomas",
      "about.factLanguageValue": "Portugues, ingles em evolucao",
      "about.factAvailabilityLabel": "Disponibilidade",
      "about.factAvailabilityValue": "Remoto, hibrido, contrato, CLT",
      "about.factContactLabel": "Contato",
      "about.linkedin": "Perfil no LinkedIn",
      "about.github": "Perfil no GitHub",
      "about.whatsapp": "Contato no WhatsApp",
      "skills.title": "Competencias",
      "skills.intro": "Prefiro apresentar minha stack por contexto real de uso e entrega, em vez de barras infladas de porcentagem. Estas sao as tecnologias e responsabilidades que melhor representam meu perfil hoje.",
      "skills.card1Title": "Backend",
      "skills.card1Text": "Laravel e PHP para regras de negocio, fluxos CRUD, autenticacao e ferramentas internas em producao.",
      "skills.card2Title": "Frontend",
      "skills.card2Text": "Blade, Bootstrap, JavaScript, jQuery e interfaces responsivas pensadas para uso pratico no dia a dia.",
      "skills.card3Title": "Camada de Dados",
      "skills.card3Text": "Modelagem relacional, persistencia de dados, validacoes e operacao com MySQL e MariaDB.",
      "skills.card4Title": "Fluxo e Suporte",
      "skills.card4Text": "Correcao de bugs, manutencao, suporte operacional, triagem e melhoria continua de sistemas ativos.",
      "skills.card5Title": "Workflow Dev",
      "skills.card5Text": "Controle de versao, entrega por branch, organizacao de repositorio e colaboracao pratica com GitHub e GitLab.",
      "skills.card6Title": "Ambiente",
      "skills.card6Text": "Ambientes locais com Docker, familiaridade com Linux e visao de infraestrutura fortalecida pelo suporte tecnico.",
      "build.title": "O que eu construo",
      "build.intro": "Sou mais valioso quando o trabalho exige logica clara, confiabilidade operacional e entrega pratica para times de negocio.",
      "build.card1Title": "Ferramentas Internas",
      "build.card1Text": "Areas administrativas, sistemas de tarefas, formularios e interfaces CRUD que ajudam equipes a trabalhar com menos atrito.",
      "build.card2Title": "Sistemas de Negocio",
      "build.card2Text": "Aplicacoes moldadas por fluxos, rotinas operacionais e dados reais do negocio.",
      "build.card3Title": "Manutencao Confiavel",
      "build.card3Text": "Correcao, melhoria e suporte para sistemas que nao podem parar quando a operacao depende deles.",
      "projects.title": "Projetos em Destaque",
      "projects.intro": "Esses projetos representam o tipo de trabalho que quero continuar fazendo: sistemas uteis, fluxos claros, interfaces praticas e logica backend manutenivel.",
      "projects.card1Problem": "Problema resolvido: organizar registros de cursos com um fluxo simples e editavel.",
      "projects.card1Solution": "Construido um fluxo CRUD em PHP com persistencia em tempo real para criar, editar e remover cursos.",
      "projects.card2Problem": "Problema resolvido: apresentar uma oferta de negocio com clareza e captar leads em uma interface responsiva.",
      "projects.card2Solution": "Estruturei paginas de servico, CTAs, blocos de conteudo e fluxo de contato para navegacao orientada a conversao.",
      "projects.card3Problem": "Problema resolvido: gerenciar tarefas, acoes do usuario e categorias em um fluxo estruturado.",
      "projects.card3Solution": "Implementei autenticacao, CRUD de tarefas, categorias, telas de perfil e UI responsiva com Laravel e Blade.",
      "projects.liveDemo": "Demo Online",
      "projects.caseStudy": "Estudo de Caso",
      "contact.title": "Vamos Conversar",
      "contact.intro1": "Disponivel para oportunidades backend e full stack no Brasil e no exterior.",
      "contact.intro2": "Se voce esta contratando, recrutando ou procurando alguem para construir e manter sistemas de negocio, me envie uma mensagem.",
      "contact.phone": "Telefone",
      "contact.email": "Email",
      "contact.linkedin": "Conecte-se comigo"
    }
  };

  const root = document.documentElement;
  let typedInstance = null;

  function initTyped() {
    const selectTyped = document.querySelector('.typed');

    if (!selectTyped || typeof Typed === 'undefined') return;

    if (typedInstance) {
      typedInstance.destroy();
    }

    let typedStrings = selectTyped.getAttribute('data-typed-items');
    typedStrings = typedStrings.split(',');
    typedInstance = new Typed('.typed', {
      strings: typedStrings,
      loop: true,
      typeSpeed: 80,
      backSpeed: 38,
      backDelay: 1800
    });
  }

  function applyTranslations(lang) {
    const dictionary = translations[lang] || translations.en;
    root.setAttribute('lang', lang === 'pt-BR' ? 'pt-BR' : 'en');

    document.querySelectorAll('[data-i18n]').forEach((element) => {
      const key = element.getAttribute('data-i18n');
      if (dictionary[key]) {
        element.textContent = dictionary[key];
      }
    });

    const typed = document.querySelector('.typed');
    if (typed) {
      const typedValues = lang === 'pt-BR'
        ? 'Desenvolvedor Full Stack PHP,Desenvolvedor Laravel,Construtor de Sistemas de Negocio'
        : 'Full Stack PHP Developer,Laravel Developer,Builder of Business Systems';
      typed.setAttribute('data-typed-items', typedValues);
      typed.textContent = typedValues.split(',')[0];
    }

    document.querySelectorAll('.lang-btn').forEach((button) => {
      button.classList.toggle('active', button.dataset.lang === lang);
    });

    localStorage.setItem('portfolio-language', lang);
    initTyped();
  }

  const headerToggleBtn = document.querySelector('.header-toggle');

  function headerToggle() {
    const header = document.querySelector('#header');
    if (!header || !headerToggleBtn) return;
    header.classList.toggle('header-show');
    headerToggleBtn.classList.toggle('bi-list');
    headerToggleBtn.classList.toggle('bi-x');
  }

  if (headerToggleBtn) {
    headerToggleBtn.addEventListener('click', headerToggle);
  }

  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.header-show')) {
        headerToggle();
      }
    });
  });

  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }

  if (scrollTop) {
    scrollTop.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  function aosInit() {
    if (typeof AOS === 'undefined') return;
    AOS.init({
      duration: 650,
      easing: 'ease-out-cubic',
      once: true,
      mirror: false
    });
  }

  window.addEventListener('load', aosInit);
  window.addEventListener('load', initTyped);

  if (typeof PureCounter !== 'undefined') {
    new PureCounter();
  }

  if (typeof GLightbox !== 'undefined') {
    GLightbox({
      selector: '.glightbox'
    });
  }

  document.querySelectorAll('.isotope-layout').forEach(function(isotopeItem) {
    if (typeof Isotope === 'undefined' || typeof imagesLoaded === 'undefined') return;

    let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
    let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
    let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';

    let initIsotope;
    imagesLoaded(isotopeItem.querySelector('.isotope-container'), function() {
      initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
        itemSelector: '.isotope-item',
        layoutMode: layout,
        filter: filter,
        sortBy: sort
      });
    });

    isotopeItem.querySelectorAll('.isotope-filters li').forEach(function(filters) {
      filters.addEventListener('click', function() {
        isotopeItem.querySelector('.isotope-filters .filter-active').classList.remove('filter-active');
        this.classList.add('filter-active');
        initIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        aosInit();
      }, false);
    });
  });

  function initSwiper() {
    if (typeof Swiper === 'undefined') return;
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );
      new Swiper(swiperElement, config);
    });
  }

  window.addEventListener("load", initSwiper);

  window.addEventListener('load', function() {
    if (window.location.hash && document.querySelector(window.location.hash)) {
      setTimeout(() => {
        let section = document.querySelector(window.location.hash);
        let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
        window.scrollTo({
          top: section.offsetTop - parseInt(scrollMarginTop),
          behavior: 'smooth'
        });
      }, 100);
    }
  });

  let navmenulinks = document.querySelectorAll('.navmenu a');

  function navmenuScrollspy() {
    navmenulinks.forEach(navmenulink => {
      if (!navmenulink.hash) return;
      let section = document.querySelector(navmenulink.hash);
      if (!section) return;
      let position = window.scrollY + 220;
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
        navmenulink.classList.add('active');
      } else {
        navmenulink.classList.remove('active');
      }
    });
  }

  window.addEventListener('load', navmenuScrollspy);
  document.addEventListener('scroll', navmenuScrollspy);

  document.querySelectorAll('.lang-btn').forEach((button) => {
    button.addEventListener('click', () => {
      applyTranslations(button.dataset.lang);
    });
  });

  const savedLanguage = localStorage.getItem('portfolio-language') || 'en';
  window.addEventListener('load', () => applyTranslations(savedLanguage));
})();
