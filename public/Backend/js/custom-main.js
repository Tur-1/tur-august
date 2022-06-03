let darkModeBtn = document.getElementById("dark-mode-toggle");
let darkMode = localStorage.getItem('darkMode');
let BootstrapCloseBtn = [...document.querySelectorAll('.btn-close')];
let body = document.getElementById("admin-body");


const enableDarkMode = () => {

    body.classList.add("dark");
    localStorage.setItem('darkMode', 'enabled');

    BootstrapCloseBtn.forEach((closeBtn) => {
        closeBtn.classList.add('btn-close-white');

    });

}

const disableDarkMode = () => {
    body.classList.remove('dark');
    localStorage.setItem('darkMode', 'disabled');

    BootstrapCloseBtn.forEach((closeBtn) => {
        closeBtn.classList.remove('btn-close-white');

    });

}

if (darkMode === "enabled") {
    enableDarkMode();


}

// Dark mode toogle

darkModeBtn.addEventListener('click', () => {

    darkMode = localStorage.getItem('darkMode');
    if (darkMode !== "enabled") {
        enableDarkMode();
    } else {
        disableDarkMode();
    }


});