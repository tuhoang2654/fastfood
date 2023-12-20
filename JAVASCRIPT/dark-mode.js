
let darkModeToggle = document.getElementById('dark-mode-toggle');
let themeStyle = document.getElementById('theme-style');

function changeThemeStyle(){
    console.log("đang trong button");
    document.body.style.backgroundColor = 'black'
    //document.body.classList.toggle('dark-mode');
    // themeStyle.href = document.body.classList.contains('dark-mode') ? './CSS/dark-mode.css' : './CSS/mycss.css';
}
