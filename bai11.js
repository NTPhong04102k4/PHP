function showExercise11() {
  const welcomeContent = document.getElementById("welcome-content");
  const exerciseFrame = document.getElementById("exercise-frame");
  const exercise11 = document.getElementById("exercise-11");

  welcomeContent.style.display = "none";
  exerciseFrame.style.display = "none";
  exercise11.style.display = "none";

  document.querySelectorAll(".exercise-item").forEach((item) => {
    item.classList.remove("active");
  });

  event.currentTarget.classList.add("active");

  exercise11.style.display = "block";
}

function validateEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function validatePassword(password) {
  return password.length >= 6;
}

function handleLogin(event) {
  event.preventDefault();

  const username = document.querySelector(
    '.login-form input[type="text"]'
  ).value;
  const password = document.querySelector(
    '.login-form input[type="password"]'
  ).value;
  const rememberMe = document.querySelector(
    '.login-form input[type="checkbox"]'
  ).checked;

  if (!username || !password) {
    alert("Vui lòng nhập đầy đủ thông tin!");
    return;
  }

  console.log("Login attempt:", { username, password, rememberMe });
  alert("Đăng nhập thành công!");
}

function handleRegister(event) {
  event.preventDefault();

  const userName = document.querySelector(
    '.register-form input[type="text"]'
  ).value;
  const userEmail = document.querySelector(
    '.register-form input[type="email"]'
  ).value;
  const selectTitle = document.querySelector(".register-form select").value;
  const fullName = document.querySelector(
    '.form-group-half-2 input[type="text"]'
  ).value;
  const companyName = document.querySelector(
    '.company-section input[type="text"]'
  ).value;
  const agreeTerms = document.querySelector(
    '.register-form input[type="checkbox"]'
  ).checked;

  if (!userName || !userEmail || !fullName) {
    alert("Vui lòng nhập đầy đủ thông tin bắt buộc!");
    return;
  }

  if (!validateEmail(userEmail)) {
    alert("Email không hợp lệ!");
    return;
  }

  if (!agreeTerms) {
    alert("Vui lòng đồng ý với điều khoản đăng ký!");
    return;
  }

  console.log("Register attempt:", {
    userName,
    userEmail,
    selectTitle,
    fullName,
    companyName,
    agreeTerms,
  });
  alert("Đăng ký thành công!");
}

function handleFacebookLogin() {
  console.log("Facebook login attempt");
  alert("Đăng nhập Facebook (Demo)");
}

document.addEventListener("DOMContentLoaded", function () {
  const loginForm = document.querySelector(".login-form form");
  if (loginForm) {
    loginForm.addEventListener("submit", handleLogin);
  }

  const registerForm = document.querySelector(".register-form form");
  if (registerForm) {
    registerForm.addEventListener("submit", handleRegister);
  }

  const facebookBtn = document.querySelector(".facebook-login-btn");
  if (facebookBtn) {
    facebookBtn.addEventListener("click", handleFacebookLogin);
  }

  const exercise11 = document.querySelector(".exercise-item:last-child");
  if (exercise11) {
    exercise11.addEventListener("click", showExercise11);
  }
});

window.Bai11Functions = {
  showExercise11,
  handleLogin,
  handleRegister,
  handleFacebookLogin,
  validateEmail,
  validatePassword,
};
