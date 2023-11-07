document.querySelector(".mail1").addEventListener("click", function () {
  document.querySelector("#mail1Input").removeAttribute("readonly");
  document.querySelector("#mail1Input").focus();
});

document.querySelector(".password").addEventListener("click", function () {
  document.querySelector("#passwordInput").removeAttribute("readonly");
  document.querySelector("#passwordInput").focus();
});

document.querySelector(".mail").addEventListener("click", function () {
  document.querySelector("#email").removeAttribute("readonly");
  document.querySelector("#email").focus();
});
document
  .querySelector("#confirmPassword")
  .addEventListener("click", function () {
    document.querySelector("#inConfirmPassword").removeAttribute("readonly");
    document.querySelector("#inConfirmPassword").focus();
  });
