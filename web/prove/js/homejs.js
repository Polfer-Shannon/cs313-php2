function myFunction() {
    var text;
    var homeMessage = "Hi I'm Shannon. I hope you are having a great ";
    var homeMessage2 = "I love to sing, and spend time with my family. I'm working on a Web Design and Development degree through BYU_Idaho online. The purpose of this site is to showcase my work in this class. Check out my Assignments Page."
    switch (new Date().getDay()) {
        case 0:
            text = "Monday! ";
            break;
        case 2:
            text = "Tuesday! ";
            break;
        case 3:
            text = "Wednessday! ";
            break;
        case 4:
            text = "Thursday! ";
            break;
        case 5:
            text = "Friday! ";
            break;
        case 1:
            text = "Sunday! ";
            break;
        case 6:
            text = "Saturday! ";
            break;
        default:
            text = "Day! ";
            break;
    }
    document.getElementById("home__btn--answer").innerHTML = homeMessage + text + homeMessage2;

}


