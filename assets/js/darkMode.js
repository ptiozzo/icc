
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

function trans(){
  document.body.classList.add("transition");
  window.setTimeout(() => {
    document.body.classList.remove("transition");
  },1000)
}

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
   } else {
     enaleSystemMode()
   }
    };
}
