

//Attivazione del tema al caricamento della pagina
const currentTheme = localStorage.getItem("theme");

if (currentTheme == "dark") {
  enableDarkMode();
} else if (currentTheme == "light") {
  enableLightMode();
} else{
  enaleSystemMode();
  const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
  if (prefersDarkScheme.matches) {
    document.body.classList.add("darkmode");
  } else {
    document.body.classList.remove("darkmode");
  }
}



// ---------------
// Gestione transizione
// ---------------

function trans(){
  document.body.classList.add("transition");
  window.setTimeout(() => {
    document.body.classList.remove("transition");
  },2000)
}

// ---------------
// Gestione tema
// ---------------

function enableDarkMode() {
  document.body.classList.remove("lightmode");
  trans();
  document.body.classList.add("darkmode");
  if (currentTheme != 'system'){
    localStorage.setItem("theme", "dark");
  }
}

function enableLightMode() {
  document.body.classList.remove("darkmode");
  trans();
  document.body.classList.add("lightmode");
  if (currentTheme != 'system'){
    localStorage.setItem("theme", "light");
  }
}

//System mode, usa dark/light secondo le impostazioni del sistema
function enaleSystemMode() {
  document.body.classList.remove("lightmode");
  document.body.classList.remove("darkmode");
  trans();
  localStorage.setItem("theme", "system");
  const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
  if (prefersDarkScheme.matches) {
    document.body.classList.add("darkmode");
  } else {
    document.body.classList.remove("darkmode");
  }
}

// ---------------
// Gestione font Dyslexia
// ---------------

//Attivazione al caricamento
const currentFont = localStorage.getItem("font");

if (currentFont == "dyslexia") {
  enableDyslexia();
}

function enableDyslexia() {
  document.body.classList.add("dyslexia");
  localStorage.setItem("font", "dyslexia");
}

//Toggle alla pressione del pulsante
function toggleDyslexia() {
  document.body.classList.toggle("dyslexia");
  localStorage.setItem("font", "normal");
  if( document.body.classList.contain("dyslexia") ){
    localStorage.setItem("font", "dyslexia");
  } else {
    localStorage.setItem("font", "normal");
  }
}


// ---------------
// Gestione pulsante
// ---------------
var rad = document.theme_switcher_form.theme_switcher;

var prev = null;

for(var i = 0; i < rad.length; i++) {
rad[i].onclick = function () {
    if(this !== prev) {
        prev = this;
    }
    if(this.value == 'dark'){
     enableDarkMode();
     localStorage.setItem("theme", "dark");
   } else if (this.value == 'light') {
     enableLightMode();
     localStorage.setItem("theme", "light");
   } else if (this.value == 'dyslexia'){
     toggleDyslexia();
   }
   else {
     enaleSystemMode()
   }
    };
}
