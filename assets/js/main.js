// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

//Section
window.onload = function () {
  showSection('dashboardSection');
};

function showSection(sectionId) {
  const sections = document.querySelectorAll('.section');

  sections.forEach(section => {
    section.style.display = 'none';
  });

  const selectedSection = document.getElementById(sectionId);
  if (selectedSection) {
    selectedSection.style.display = 'block';
  }

  if (sectionId !== 'dashboardSection') {
    const dashboardSection = document.getElementById('dashboardSection');
    if (dashboardSection) {
      dashboardSection.style.display = 'none';
    }
  }

  setActive(sectionId);
}

// Set Active 
function setActive(sectionId) {
  // Remove active class from all sections
  const sections = document.querySelectorAll('.section');
  sections.forEach(section => {
    section.classList.remove('active');
  });

  // Add active class to the clicked section
  const activeSection = document.getElementById(sectionId);
  if (activeSection) {
    activeSection.classList.add('active');
  }

  // Add hovered class to the selected list item
  list.forEach((item) => {
    item.classList.remove("hovered");
    if (item.querySelector('.title').getAttribute('onclick') === `showSection('${sectionId}')`) {
      item.classList.add("hovered");
    }
  });
}

// Current date
document.addEventListener("DOMContentLoaded", function () {
  const today = new Date();

  const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
  const formattedDate = today.toLocaleDateString('en-US', options);

  // Call the function with an array of element IDs
  displayDateOnMultipleElements(['currentDate', 'currentDate2']);

  function displayDateOnMultipleElements(elementIds) {
    elementIds.forEach(function (id) {
      const element = document.getElementById(id);
      if (element) {
        element.innerText = formattedDate;
      }
    });
  }
});

// Calculator
function toggleCalculator() {
  const calculatorContainer = document.getElementById("calculatorContainer");
  calculatorContainer.style.display = calculatorContainer.style.display === "block" ? "none" : "block";
}

function appendToInput(value) {
  const calculatorInput = document.getElementById("calculatorInput");
  calculatorInput.value += value;
}

function clearInput() {
  const calculatorInput = document.getElementById("calculatorInput");
  calculatorInput.value = "";
}

function calculate() {
  const calculatorInput = document.getElementById("calculatorInput");
  try {
      calculatorInput.value = eval(calculatorInput.value);
  } catch (error) {
      calculatorInput.value = "Error";
  }
}

// CHECK BOX SELECTION
document.addEventListener('DOMContentLoaded', function () {
  // Get the header checkboxes and all transaction checkboxes in both sections
  const legerHeaderCheckbox = document.getElementById('legerHeaderCheckbox');
  const transactionHeaderCheckbox = document.getElementById('transactionHeaderCheckbox');
  
  const legerCheckboxes = document.querySelectorAll('.legerCheckbox');
  const transactionCheckboxes = document.querySelectorAll('.transactionCheckbox');

  // Add event listener to leger section header checkbox
  legerHeaderCheckbox.addEventListener('change', function () {
    // Toggle the selection of all leger section checkboxes
    legerCheckboxes.forEach(function (checkbox) {
      checkbox.checked = legerHeaderCheckbox.checked;
    });
  });

  // Add event listener to transaction section header checkbox
  transactionHeaderCheckbox.addEventListener('change', function () {
    // Toggle the selection of all transaction section checkboxes
    transactionCheckboxes.forEach(function (checkbox) {
      checkbox.checked = transactionHeaderCheckbox.checked;
    });
  });
});

// POP UP FORMS - ADD
function toggleModal(modalId) {
  var modal = document.getElementById(modalId);
  var span = modal.getElementsByClassName("close")[0];

  span.onclick = function () {
      modal.style.display = "none";
  };

  window.onclick = function (event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  };
}

document.getElementById("addBtnTransaction").onclick = function () {
  document.getElementById("transactionAddForm").style.display = "none";
};

document.getElementById("addBtnLeger").onclick = function () {
  document.getElementById("legerAddForm").style.display = "none";
};

document.getElementById("add-transaction-btn").onclick = function () {
  document.getElementById("transactionAddForm").style.display = "block";
  toggleModal("transactionAddForm");
};

document.getElementById("add-leger-btn").onclick = function () {
  document.getElementById("legerAddForm").style.display = "block";
  toggleModal("legerAddForm");
};

//Close button
document.getElementById("closeBtnLeger").addEventListener("click", function() {
  var legerForm = document.getElementById("legerAddForm");
  legerForm.style.display = "none";
});

document.getElementById("closeBtnTransaction").addEventListener("click", function() {
  var legerForm = document.getElementById("transactionAddForm");
  legerForm.style.display = "none";
});

//----------------------------------------------------------------------------------------
// POP UP FORMS - VIEW
function toggleModal(modalId) {
  var modal = document.getElementById(modalId);
  var span = modal.getElementsByClassName("close")[0];

  span.onclick = function () {
    modal.style.display = "none";
  };

  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
}

document.getElementById("view-transation-btn").onclick = function () {
  document.getElementById("transactionViewForm").style.display = "block";
  toggleModal("transactionViewForm");
};

document.getElementById("view-leger-btn").onclick = function () {
  document.getElementById("legerViewForm").style.display = "block";
  toggleModal("legerViewForm");
};

document.getElementById("addBtnTransaction").onclick = function () {
  document.getElementById("transactionAddForm").style.display = "none";
};

document.getElementById("addBtnLeger").onclick = function () {
  document.getElementById("legerAddForm").style.display = "none";
};

//--------------------------------------------------------------------------------
//Close button
document.getElementById("closeBtnLeger").addEventListener("click", function() {
  var legerForm = document.getElementById("legerAddForm");
  legerForm.style.display = "none";
});

document.getElementById("closeBtnTransaction").addEventListener("click", function() {
  var legerForm = document.getElementById("transactionViewForm");
  legerForm.style.display = "none";
});

// Dropdown Button
var x, i, j, l, ll, selElmnt, a, b, c;

x = document.getElementsByClassName("custom-select");
l = x.length;

for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;

  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);

  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");

  for (j = 1; j < ll; j++) {
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;

    c.addEventListener("click", function(e) {
      var y, i, k, s, h, sl, yl;
      s = this.parentNode.parentNode.getElementsByTagName("select")[0];
      sl = s.length;
      h = this.parentNode.previousSibling;

      for (i = 0; i < sl; i++) {
        if (s.options[i].innerHTML == this.innerHTML) {
          s.selectedIndex = i;
          h.innerHTML = this.innerHTML;
          y = this.parentNode.getElementsByClassName("same-as-selected");
          yl = y.length;

          for (k = 0; k < yl; k++) {
            y[k].removeAttribute("class");
          }

          this.setAttribute("class", "same-as-selected");
          break;
        }
      }

      h.click();
    });

    b.appendChild(c);
  }

  x[i].appendChild(b);

  a.addEventListener("click", function(e) {
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}

function closeAllSelect(elmnt) {
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;

  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i);
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }

  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

document.addEventListener("click", closeAllSelect);

// Function to get the current date in the format YYYY-MM-DD
function getCurrentDate() {
  const today = new Date();
  const year = today.getFullYear();
  const month = (today.getMonth() + 1).toString().padStart(2, '0');
  const day = today.getDate().toString().padStart(2, '0');
    
  return `${year}-${month}-${day}`;
}

// Auto-fill the input box with the current date when the page loads
document.addEventListener('DOMContentLoaded', function() {
  const dateInput = document.getElementById('dateInput');
  dateInput.value = getCurrentDate();
});

//excel canvert report
document.getElementById('downlordexcel').addEventListener('click',function(){
  var table2excel =new Table2Excel();
  table2excel.export(document.querySelectorAll("#reporttable"))
});


//pdf report
document.getElementById('reportpdf').addEventListener('click',function(){
  const element = document.getElementById("reporttable");

  html2pdf()
  .from(element)
  .save();
});

//excel canvert leger
document.getElementById('legerdata').addEventListener('click',function(){
  var table2excel =new Table2Excel();
  table2excel.export(document.querySelectorAll("#lagertable"))
});

//pdf leger
document.getElementById('legerpdf').addEventListener('click',function(){
  const element = document.getElementById("lagertable");

  html2pdf()
  .from(element)
  .save();
});

//excel canvert Transection
document.getElementById('transectiondata').addEventListener('click',function(){
  var table2excel =new Table2Excel();
  table2excel.export(document.querySelectorAll("#transectiontable"))
});

//pdf transection
document.getElementById('transectionpdf').addEventListener('click',function(){
  const element = document.getElementById("transectiontable");

  html2pdf()
  .from(element)
  .save();
});

// POP UP FORMS - EDIT
function toggleModal(modalId) {
  var modal = document.getElementById(modalId);
  var span = modal.getElementsByClassName("close")[0];

  span.onclick = function () {
    modal.style.display = "none";
  };

  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
}

document.getElementById("editBtnLeger").onclick = function () {
  document.getElementById("legerEditForm").style.display = "none";
};

document.getElementById("editBtnTransaction").onclick = function () {
  document.getElementById("transactionEditForm").style.display = "none";
};

document.getElementById("edit-leger-btn").onclick = function () {
  document.getElementById("legerEditForm").style.display = "block";
  toggleModal("legerEditForm");
  // Add code here to populate the edit form fields with existing data
};

document.getElementById("edit-transaction-btn").onclick = function () {
  document.getElementById("transactionEditForm").style.display = "block";
  toggleModal("transactionEditForm");
  // Add code here to populate the edit form fields with existing data
};








