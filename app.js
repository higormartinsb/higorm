// SPA + offline behaviors (functional routing, no page reloads)
const App = (() => {
  const screens = {};
  let historyStack = ['screen-home'];

  const qs = (sel, el=document) => el.querySelector(sel);

  function show(id) {
    Object.values(screens).forEach(s => s.classList.remove('active'));
    const target = screens[id];
    if (target) target.classList.add('active');
    // update active menu
    document.querySelectorAll('.menu button').forEach(b=>b.classList.remove('active'));
    if (id === 'screen-home') document.getElementById('m-home').classList.add('active');
    if (id === 'screen-categoria') document.getElementById('m-categoria').classList.add('active');
    if (id === 'screen-fgts') document.getElementById('m-fgts').classList.add('active');
    if (id === 'screen-menu') document.getElementById('m-menu').classList.add('active');
    window.scrollTo({top:0, behavior:'instant'});
  }

  function navigate(id) {
    if (!screens[id]) return;
    if (navigator.vibrate) navigator.vibrate(12);
    historyStack.push(id);
    show(id);
    saveState();
  }

  function back() {
    if (historyStack.length > 1) {
      historyStack.pop();
      show(historyStack[historyStack.length-1]);
      saveState();
    } else {
      // no-op or close
      App.toast('Nada para voltar');
    }
  }

  function toast(msg) {
    const el = qs('#toast');
    el.textContent = msg;
    el.classList.add('show');
    setTimeout(() => el.classList.remove('show'), 1600);
  }

  function saveState(){
    localStorage.setItem('app_state', JSON.stringify({stack:historyStack}));
  }
  function loadState(){
    try{
      const s = JSON.parse(localStorage.getItem('app_state'));
      if (s && Array.isArray(s.stack) && s.stack.length) {
        historyStack = s.stack;
        show(historyStack[historyStack.length-1]);
      }
    }catch(e){}
  }

  function initToggle(id){
    const wrap = qs('#'+id);
    if (!wrap) return;
    const input = wrap.querySelector('input');
    const on = localStorage.getItem('toggle_'+id) === '1';
    if (on) wrap.classList.add('on'), input.checked = true, wrap.setAttribute('aria-checked','true');
    input.addEventListener('change', () => {
      wrap.classList.toggle('on', input.checked);
      wrap.setAttribute('aria-checked', input.checked ? 'true' : 'false');
      localStorage.setItem('toggle_'+id, input.checked ? '1' : '0');
      if (navigator.vibrate) navigator.vibrate(8);
    });
  }

  function registerSW(){
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('./sw.js').catch(()=>{});
    }
  }

  function initSim(){
    const range = qs('#sim-valor');
    const text = qs('#sim-valor-text');
    const parc = qs('#sim-parc');
    if (range && text) {
      text.textContent = 'R$ ' + Number(range.value).toLocaleString('pt-BR');
      range.addEventListener('input', ()=>{
        text.textContent = 'R$ ' + Number(range.value).toLocaleString('pt-BR');
      });
    }
    if (qs('.rowlink[onclick*="Simulando"]')) {
      const btn = qs('.rowlink[onclick*="Simulando"]');
      btn.addEventListener('click', ()=>{
        const valor = Number(range.value);
        const parcelas = Number(parc.value);
        const mensal = (valor * 1.029) / parcelas; // fake calc
        toast('Resultado: ' + parcelas + 'x de R$ ' + Math.round(mensal).toLocaleString('pt-BR'));
      });
    }
  }

  function init(){
    document.querySelectorAll('.screen').forEach(s => screens[s.id]=s);
    loadState();
    initToggle('sw-consulta');
    initSim();
    registerSW();
    // handle native back button on Android (visibility API)
    window.addEventListener('popstate', (e)=>{ back(); });
  }

  return { init, navigate, back, toast };
})();

document.addEventListener('DOMContentLoaded', App.init);

//Carregamento da pagina
// Ocultar preloader quando a página terminar de carregar
window.addEventListener('load', () => {
  const preloader = document.getElementById('preloader');
  preloader.classList.add('hidden');
  setTimeout(() => preloader.remove(), 600);
});

// Partículas animadas
const canvas = document.getElementById('particles');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

class Particle {
  constructor() {
    this.x = Math.random() * canvas.width;
    this.y = Math.random() * canvas.height;
    this.radius = Math.random() * 3 + 1;
    this.speedX = (Math.random() - 0.5) * 1;
    this.speedY = (Math.random() - 0.5) * 1;
  }
  update() {
    this.x += this.speedX;
    this.y += this.speedY;

    if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
    if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;
  }
  draw() {
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
    ctx.fillStyle = 'rgba(255,255,255,0.8)';
    ctx.fill();
  }
}

const particlesArray = [];
for (let i = 0; i < 100; i++) particlesArray.push(new Particle());

function animate() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  particlesArray.forEach(p => {
    p.update();
    p.draw();
  });
  requestAnimationFrame(animate);
}
animate();

// Redimensiona canvas no resize da tela
window.addEventListener('resize', () => {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
});

//Barra de status theme cor
function setThemeColor(color) {
  const metaTheme = document.getElementById('theme-color-meta');
  metaTheme.setAttribute('content', color);
}

App.navigate = function(screenId) {
  // esconder todas as telas
  document.querySelectorAll('.screen').forEach(s => s.classList.remove('active'));
  
  // mostrar a tela desejada
  const screen = document.getElementById(screenId);
  screen.classList.add('active');
  
  // definir cor da barra de status de acordo com a tela
  switch(screenId) {
    case 'screen-home':
      setThemeColor('#0ea5e9'); // azul
      break;
    case 'screen-menu':
    case 'screen-categoria':
    case 'screen-fgts':
      setThemeColor('#fefefe'); // branco
      break;
    default:
      setThemeColor('#fefefe');
  }
}

//Texto dinamico da localização home
const cityState = document.getElementById('city-state');
const popup = document.getElementById('geo-popup');
const allowBtn = document.getElementById('allow-location');
const denyBtn = document.getElementById('deny-location');

cityState.onclick = () => {
  popup.style.display = 'flex'; // mostra o popup
};

// Se o usuário clicar em permitir
allowBtn.onclick = () => {
  popup.style.display = 'none';
  getLocation();
};

// Se o usuário clicar em cancelar
denyBtn.onclick = () => {
  popup.style.display = 'none';
};

// Função para pegar localização
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(success, error);
  } else {
    cityState.textContent = "Localização não suportada";
  }
}

function success(position) {
  const lat = position.coords.latitude;
  const lon = position.coords.longitude;

  fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`)
    .then(res => res.json())
    .then(data => {
      const estados = {
        "Acre":"AC","Alagoas":"AL","Amapá":"AP","Amazonas":"AM","Bahia":"BA","Ceará":"CE","Distrito Federal":"DF","Espírito Santo":"ES",
        "Goiás":"GO","Maranhão":"MA","Mato Grosso":"MT","Mato Grosso do Sul":"MS","Minas Gerais":"MG","Pará":"PA","Paraíba":"PB",
        "Paraná":"PR","Pernambuco":"PE","Piauí":"PI","Rio de Janeiro":"RJ","Rio Grande do Norte":"RN","Rio Grande do Sul":"RS",
        "Rondônia":"RO","Roraima":"RR","Santa Catarina":"SC","São Paulo":"SP","Sergipe":"SE","Tocantins":"TO"
      };

      const city = data.address.city || data.address.town || data.address.village || "";
      const stateFull = data.address.state || "";
      const state = estados[stateFull] || stateFull;

      cityState.textContent = city && state ? `${city}-${state}` : "Localização indisponível";
      cityState.style.cursor = "default";
    })
    .catch(() => {
      cityState.textContent = "Localização indisponível";
    });
}

function error() {
  cityState.textContent = "Ativar Localização";
  cityState.style.cursor = "pointer";
}


