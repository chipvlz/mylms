<form action="#" method="get">
  <h3 class="ui dividing header">
    View Loan
  </h3>
  <div class="field">
    <label>Member ID</label>
    <input type="text" name="memberId" id="memberId" value="<?= $view_loan->memberId; ?>">
  </div>
  <div class="field">
    <label>Amount</label>
    <input type="text" name="amount" id="amount" value="<?= $view_loan->amount; ?>">
  </div>
  <div class="field">
    <label>Loan type</label>
    <input type="text" name="loanType" id="loanType" value="<?= $view_loan->loanType; ?>">
  </div>
  <div class="field">
    <label>Interest</label>
    <input type="text" name="interest" id="interest" value="<?= $view_loan->interest; ?>">
  </div>
  <div class="field">
    <label>Issue Date</label>
    <input type="text" name="issueDate" id="issueDate" value="<?= $view_loan->issueDate; ?>">
  </div>
  <div class="field">
    <label>Due Date</label>
    <input type="text" name="dueDate" id="dueDate" value="<?= $view_loan->dueDate; ?>">
  </div>
</form>