document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("registerForm");
  if (form) {
    form.addEventListener("submit", function (e) {
      const pass = document.getElementById("password").value;
      const confirm = document.getElementById("confirm").value;
      if (pass !== confirm) {
        e.preventDefault();
        alert("Passwords do not match!");
      }
    });
  }
});