  <div class="ui container">
    <div class="ui vertical segment">
      <div class="ui hidden divider"></div>
      <h2 class="ui header">
        <i class="money bill alternate icon"></i>
        <div class="content" style="width:100%">
          Loans
          <div class="sub header">
            Manage Loan Information
          </div> <!-- sub header -->
        </div> <!-- content -->
      </h2> <!-- ui header -->
    </div> <!-- ui vertical segment -->
    <div id="mainmenu" class="ui pointing menu">
      <a data-target="list" class="active item"><i class="list icon"></i>Issued Loans</a>
      <a data-target="add" class="green item"><i class="plus icon"></i> Issue a new Loan</a>
      <div class="right menu">
        <div class="ui pointing dropdown link item">
          <span class="text" id="criteria">by User</span>
          <i class="dropdown icon"></i>
          <div class="menu">
            <div class="item">by User</div>
            <div class="item">by Issued Date</div>
            <div class="item">by Due Date</div>
          </div>
        </div>
        <div class="item">
          <div class="ui right icon transparent input">
            <i class="search icon"></i>
            <input type="text" placeholder="Search Loans">
          </div>
        </div> <!-- item -->
      </div> <!-- right menu -->
    </div> <!-- ui pointing menu -->
    <div class="panels">
      <div id="list" class="ui segment activated panel">
        <div id="no-result" class="deactivated ui placeholder segment">
          <div class="ui icon header">
            <i class="search icon"></i>
            No loans found for "<span></span>"
          </div>
        </div> <!-- #no-result -->
        <table id="loan-list" class="ui celled padded table">
          <thead>
            <tr>
              <th class="single line">Loan Type</th>
              <th>Issued For</th>
              <th>Amount</th>
              <th>Interest Rate</th>
              <th>Actions</th>
            </tr>
            <tr>
              <td>
                <h3 class="ui centered aligned header">Quick</h3>
              </td>
              <td class="single line">
                Ross Gellar
              </td>
              <td>Rs. 15000</td>
              <td>15%</td>
              <td class="collapsing">
                <div class="ui fitted buttons">
                  <a href="#" class="ui blue button">Settle</a>
                  <a href="#" class="ui black button">Info</a>
                </div>
              </td>
            </tr>
          </thead>
        </table>
      </div>
      <div id="add" class="ui segment panel">
        <?php echo form_open('loans/add', array('class' => 'ui form')); ?>
          <h3 class="ui dividing header">
            Add a New Loan
          </h3>
          <div class="field">
            <label>Member ID</label>
            <input type="text" name="memberId" id="memberId">
          </div>
          <div class="field">
            <label>Amount</label>
            <input type="text" name="amount" id="amount">
          </div>
          <div class="field">
            <label>Loan type</label>
            <input type="text" name="loanType" id="loanType">
          </div>
          <div class="field">
            <label>Interest</label>
            <input type="text" name="interest" id="interest">
          </div>
          <div class="field">
            <label>Issue Date</label>
            <input type="text" name="issueDate" id="issueDate">
          </div>
          <div class="field">
            <label>Due Date</label>
            <input type="text" name="dueDate" id="dueDate">
          </div>
          <button type="submit" class="ui black button">Submit</button>
        </form>
      </div>
    </div>
  </div>
<script>
  $(document).ready(function() {
    $('.ui.dropdown').dropdown();

    var items = $('#mainmenu a.item');
    items.click(function() {
      items.removeClass('active');
      $(this).addClass('active');
      var relatedPanel = $(this).data('target');
      if (relatedPanel === undefined) { return; }
      $('div.activated.panel').transition('slide left').removeClass('activated');
      $('div.panel#'+relatedPanel).transition('slide right').addClass('activated');
    })
  })
</script>