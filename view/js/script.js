function validateLogin(form) {
  const username = form.username.value.trim();
  const password = form.password.value.trim();
  let isValid = true;

  if (username === "") {
   document.getElementById("loginUserErr").innerHTML = "Username is required";
   isValid = false;
  } else {
   document.getElementById("loginUserErr").innerHTML = "";
  }

  if (password === "") {
   document.getElementById("loginPassErr").innerHTML = "Password is required";
   isValid = false;
  } else {
    document.getElementById("loginPassErr").innerHTML = "";
  }

  return isValid; 
}

function validateRegister(form) {
  const username = form.uname.value.trim(); 
  const email = form.email.value.trim();
  const password = form.password.value.trim();
  const confirm = form.confirm.value.trim();
  let isValid = true;

  if (username === "") {
    document.getElementById("regNameErr").innerHTML = "Username required";
    isValid = false;
  } else {
    document.getElementById("regNameErr").innerHTML = "";
  }

  if (email === "") {
    document.getElementById("regEmailErr").innerHTML = "Email required";
    isValid = false;
  } else if (!/\S+@\S+\.\S+/.test(email)) {
    document.getElementById("regEmailErr").innerHTML = "Invalid email";
    isValid = false;
  } else {
    document.getElementById("regEmailErr").innerHTML = "";
  }

  if (password.length < 6) {
    document.getElementById("regPassErr").innerHTML = "Password must be 6+ characters";
    isValid = false;
  } else {
    document.getElementById("regPassErr").innerHTML = "";
  }

  if (confirm !== password) {
    document.getElementById("regConfirmErr").innerHTML = "Passwords do not match";
    isValid = false;
  } else {
    document.getElementById("regConfirmErr").innerHTML = "";
  }

  return isValid;
}

function validateForgot(form) {
  const email = form.email.value.trim();
  let isValid = true;

  if (email === "") {
    document.getElementById("forgotEmailErr").innerHTML = "Email required";
    isValid = false;
  } else if (!/\S+@\S+\.\S+/.test(email)) {
    document.getElementById("forgotEmailErr").innerHTML = "Invalid email";
    isValid = false;
  } else {
    document.getElementById("forgotEmailErr").innerHTML = "";
  }

  return isValid;
}

function validateChangePassword(form) {
  const oldPass = form.old.value.trim();
  const newPass = form.new.value.trim();
  const confirm = form.confirm.value.trim();
  let isValid = true;

  if (oldPass === "") {
    document.getElementById("oldPassErr").innerHTML = "Old password required";
    isValid = false;
  } else {
    document.getElementById("oldPassErr").innerHTML = "";
  }

  if (newPass.length < 6) {
    document.getElementById("newPassErr").innerHTML = "New password must be 6+ characters";
    isValid = false;
  } else {
    document.getElementById("newPassErr").innerHTML = "";
  }

  if (confirm !== newPass) {
    document.getElementById("confirmPassErr").innerHTML = "Passwords do not match";
    isValid = false;
  } else {
    document.getElementById("confirmPassErr").innerHTML = "";
  }

  return isValid;
}

function validateAppointment(form) {
  const bike = form.bike.value.trim();
  const service = form.service.value.trim();
  const date = form.date.value.trim();
  const time = form.time.value.trim();
  let isValid = true;

  if (bike === "") {
    document.getElementById("bikeErr").innerHTML = "Enter bike type";
    isValid = false;
  } else {
    document.getElementById("bikeErr").innerHTML = "";
  }

  if (service === "") {
    document.getElementById("serviceErr").innerHTML = "Select a service";
    isValid = false;
  } else {
    document.getElementById("serviceErr").innerHTML = "";
  }

  if (date === "") {
    document.getElementById("dateErr").innerHTML = "Choose a date";
    isValid = false;
  } else {
    document.getElementById("dateErr").innerHTML = "";
  }

  if (time === "") {
    document.getElementById("timeErr").innerHTML = "Choose a time";
    isValid = false;
  } else {
    document.getElementById("timeErr").innerHTML = "";
  }

  return isValid;
}

function validateFeedback(form) {
  const name = form.name.value.trim();
  const email = form.email.value.trim();
  const message = form.message.value.trim();
  let isValid = true;

  if (name === "") {
    document.getElementById("fbNameErr").innerHTML = "Name required";
    isValid = false;
  } else {
    document.getElementById("fbNameErr").innerHTML = "";
  }

  if (email === "") {
    document.getElementById("fbEmailErr").innerHTML = "Email required";
    isValid = false;
  } else if (!/\S+@\S+\.\S+/.test(email)) {
    document.getElementById("fbEmailErr").innerHTML = "Invalid email";
    isValid = false;
  } else {
    document.getElementById("fbEmailErr").innerHTML = "";
  }

  if (message === "") {
    document.getElementById("fbMsgErr").innerHTML = "Feedback cannot be empty";
    isValid = false;
  } else {
    document.getElementById("fbMsgErr").innerHTML = "";
  }

  return isValid;
}