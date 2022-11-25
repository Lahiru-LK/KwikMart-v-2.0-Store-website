// Form Pre loader
$(window).on("load", function () {
  $(".loader").hide();
});

function ch(){

  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var fnum = document.getElementById("fnum").value;
  var femail = document.getElementById("femail").value;
  var address = document.getElementById("address").value;
  var doctor = document.getElementById("doctor").value;
  var hospital = document.getElementById("hospital").value;

  if(fname == null || fname == ""){
    cuteToast({
      type: "error",
      title: "Name",
      message: "Fill the First Name Field!",
      timer: 5000,
    });
	}
  else if(lname == null || lname == ""){
    cuteToast({
      type: "error",
      title: "Name",
      message: "Fill the Last Name Field!",
      timer: 5000,
    });
	}
  else if(fnum == null || fnum == ""){
    cuteToast({
      type: "error",
      title: "Name",
      message: "Fill the Mobile Number Field!",
      timer: 5000,
    });
	}
  else if(femail == null || femail == ""){
    cuteToast({
      type: "error",
      title: "Name",
      message: "Fill the Email Field!",
      timer: 5000,
    });
	}
  else if(address == null || address == ""){
    cuteToast({
      type: "error",
      title: "Name",
      message: "Fill the Address Field!",
      timer: 5000,
    });
	}
  else if(doctor == null || doctor == ""){
    cuteToast({
      type: "error",
      title: "Name",
      message: "Fill the preferred doctor Field!",
      timer: 5000,
    });
	}
  else if(hospital == null || hospital == ""){
    cuteToast({
      type: "error",
      title: "Name",
      message: "Fill the preferred hospital Field!",
      timer: 5000,
    });
	}
	else{
    cuteAlert({
      type: "success",
      title: "Your Appointment has been sent",
      message: "We will contact you soon",
      buttonText: "Okay",
    });
	}
}


function checkLetterf(){
  var fname = document.getElementById("fname").value;
  var letters = /^[A-Za-z]+$/;
  
  if(fname.match(letters)){
    return true;
  }
  else{
    cuteToast({
      type: "error",
      title: "Name",
      message: "You can enter only Characters",
      timer: 5000,
    });
    return false;
  }
}

function checkLetterl(){
  var lname = document.getElementById("lname").value;
  var letters = /^[A-Za-z]+$/;
  
  if(lname.match(letters)){
    return true;
  }
  else{
    cuteToast({
      type: "error",
      title: "Name",
      message: "You can enter only Characters",
      timer: 5000,
    });
    return false;
  }
}


function checkEmpty(){

	var fname = document.getElementById("fname").value;
  var pass = document.getElementById("pass").value;



	if(fname == null || fname == ""){
		alert("Fill the First Name Field!");
	}
  else if(pass == null || pass == ""){
		alert("Fill the password Field!");
	}

	else{
		Swal.fire({
			icon: "success",
			title: "Logging Successfully!",
			text: "Thank you!",
			showConfirmButton: false,
			footer:
			  '<button type="button"><a href="../index.html">Home</a></button>',
		  });
	}

}
