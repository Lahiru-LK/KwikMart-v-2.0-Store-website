function formValid() {
  nameValid();
}

var tr = 0;

function nameValid() {
  var letters = /^[A-Za-z ]+$/;
  var name = document.getElementById("name").value;

  var numbers = /^[0-9]+$/;
  var mobileNum = document.getElementById("mobileNum").value;

  var tr = 0;

  if (name.match(letters)) {
    tr = tr + 1;
  } else {
    cuteToast({
      type: "error",
      title: "Name",
      message: "You can enter only Characters",
      timer: 5000,
    });
  }

  if (mobileNum.match(numbers)) {
    tr = tr + 1;
  } else {
    cuteToast({
      type: "error",
      title: "Phone Number",
      message: "You can enter only Numbers",
      timer: 5000,
    });
  }

  if (tr == 2) {
    cuteAlert({
      type: "success",
      title: "Your Request has been sent",
      message: "We will contact you soon",
      buttonText: "Okay",
    });
  }
}
