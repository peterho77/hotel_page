const toggleLangSwitch = document.querySelector(".toggle-lang-switch");
let flagIcon = toggleLangSwitch.querySelector(".flag-icon");
toggleLangSwitch.querySelectorAll(".lang-list li a").forEach((item) => {
    console.log(item);
    item.addEventListener("click", () => {
        let langName = item.textContent;
        switch(langName)
        {
            case "EN":
                flagIcon.src = "/img/united-states-of-america.png";
                break;
            case "VI":
                flagIcon.src = "/img/vietnam.png";
                break;
        }
    })
})