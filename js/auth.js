
var signupLink = document.getElementById("signup-link");
var loginLink = document.getElementById("login-link");

var signupContainer = document.querySelector(".signup-form-container");
var loginContainer = document.querySelector(".login-form-container");

var imgContainer = document.querySelector(".img-container");

signupLink.addEventListener("click", (ev) => {
  ev.preventDefault();
  signupContainer.classList.remove("signuptoggle");
  imgContainer.classList.remove("imgtoggle");
  loginContainer.classList.remove("signuptoggle");
});

loginLink.addEventListener("click", (ev) => {
  //prevents reload
  ev.preventDefault();
  signupContainer.classList.add("signuptoggle");
  imgContainer.classList.add("imgtoggle");
  loginContainer.classList.add("signuptoggle");
})
