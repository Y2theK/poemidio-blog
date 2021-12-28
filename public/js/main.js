function goBack() {
    window.history.back();
}
var LinkActive = document.querySelectorAll("li a");
console.log(LinkActive);
// LinkActive.forEach((element) => {
//     element.addEventListener("click", function () {
//         console.log(element);
//         LinkActive.forEach((nav) => nav.classList.remove("active"));
//         this.classList.add("active");
//     });
// });

var navLinks = document.querySelectorAll(".nav-link ");
console.log(navLinks);
// navLinks.forEach(function (nav) {
//     console.log(nav);
//     nav.addEventListener("click", function () {
//         removeLinkActive();
//         console.log(nav);
//         nav.classList.add("active");
//     });
// });
// function removeLinkActive() {
//     navLinks.forEach((nav) => {
//         nav.classList.remove("active");
//     });
// }
