var annual_income = document.getElementById("annual_income")
  , investment_amount = document.getElementById("investment_amount");

function validateamount(){
  if(annual_income.valueAsNumber <= investment_amount.valueAsNumber) {
    investment_amount.setCustomValidity("Please enter amount lower than your Annual Income!");
  } else {
    investment_amount.setCustomValidity('');
  }
}

annual_income.onchange = validateamount;
investment_amount.onkeyup = validateamount;