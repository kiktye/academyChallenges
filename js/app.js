const budgetInput = $("#budget-input");
const budgetSubmit = $("#budget-submit");
let budgetAmount = $("#budget-amount");
const expenseAmount = $("#expense-amount");
const balanceAmount = $("#balance-amount");
const expenseInput = $("#expense-input");
const expenseAmountInput = $("#amount-input");
const expenseSubmit = $("#expense-submit");

let currentBudgetAmount = 0;
let totalExpense = 0;
$(".table").hide();

let alert = $("#alert")
  .append(
    `<div class="row">
<div class=" col-md-5 my-3 alert alert-danger" role="alert">
    value cannot be empty or negative
  </div>
  </div>`
  )
  .hide();

budgetInput.focus(function (e) {
  alert.hide();
});

let expenseAlert = $("#expenseAlert")
  .append(
    `<div class="row">
    <div class=" col-md-5 my-3 alert alert-danger" role="alert">
        expense cannot be empty
      </div>
      </div>`
  )
  .hide();

expenseAmountInput.focus(function (e) {
  expenseAlert.hide();
});

budgetSubmit.click(function (e) {
  e.preventDefault();
  if (budgetInput.val() == "" || budgetInput.val().includes("-")) {
    return alert.show();
  }
  currentBudgetAmount = budgetInput.val();
  budgetAmount.text(budgetInput.val());
  balanceAmount.text(calcBalance(currentBudgetAmount, totalExpense));
  budgetInput.val("");
});

function calcBalance(currentBudgetAmount, totalExpense) {
  return currentBudgetAmount - totalExpense;
}

expenseSubmit.click(function (e) {
  if (expenseAmountInput.val() == "") {
    e.preventDefault();

    return expenseAlert.show();
  } else {
    e.preventDefault();

    $(".table").show();

    totalExpense += parseInt(expenseAmountInput.val());
    expenseAmount.text(totalExpense);

    $("#tbody").append(
      `<tr class="text-danger">
                <th " scope="row">-</th>
                <td class="name">${expenseInput.val()}</td>
                <td class="amount">${expenseAmountInput.val()}</td>
                <td class="">
                    <i onClick=" editExpanse(this)"class="fa-solid fa-pen-to-square text-primary"></i>
                    <i onClick="deleteExpanse(this)" class="fa-solid fa-trash text-danger"></i>
                </td>
            </tr>`
    );

    balanceAmount.text(calcBalance(currentBudgetAmount, totalExpense));

    expenseInput.val("");
    expenseAmountInput.val("");
  }
});

function editExpanse(e) {
  expenseAmountInput.val($(e).parent().siblings(".amount").text());
  expenseInput.val($(e).parent().siblings(".name").text());
  let editExpanse =
    parseInt(expenseAmount.text()) - parseInt(expenseAmountInput.val());
  let currentBalance =
    parseInt(balanceAmount.text()) + parseInt(expenseAmountInput.val());
  totalExpense -= parseInt(expenseAmountInput.val());
  balanceAmount.text(currentBalance);
  expenseAmount.text(editExpanse);
  $(e).parent().parent().remove();
}

function deleteExpanse(e) {
  let editExpanse =
    parseInt(expenseAmount.text()) -
    parseInt($(e).parent().siblings(".amount").text());
  let currentBalance =
    parseInt(balanceAmount.text()) +
    parseInt($(e).parent().siblings(".amount").text());
  totalExpense -= parseInt($(e).parent().siblings(".amount").text());
  balanceAmount.text(currentBalance);
  expenseAmount.text(editExpanse);
  $(e).parent().parent().remove();
}
