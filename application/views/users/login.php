<div class="ui middle aligned center aligned grid">
    <div class="column">
      <h2 class="ui grey header">
        <i class="handshake icon"></i>
        <div class="content" style="text-align: left">
          Sahana Loan Managment
          <div class="sub header">System Login</div>
        </div>
      </h2>
      <?php echo form_open('users/login', array('class' => 'ui large form')); ?>
        <div class="ui stacked segment">
          <div class="ui error message">
            Incorrect username or pasword
          </div>
          <div class="field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="text" name="username" id="username" placeholder="Username">
            </div>
          </div>
          <div class="field">
            <div class="ui left icon input">
              <i class="lock icon"></i>
              <input type="password" name="password" id="password" placeholder="Password">
            </div>
          </div>
          <button id="submit" type="submit" class="ui fluid large black submit button">
            Login
          </button>
        </div>
      </form>
      <div class="ui message">
        2018 &copy; SCS2108 Group 10
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function () {
      $('.ui.form').form({
        fields: {
          username: 'empty',
          password: 'empty'
        }
      });
      if (result.error !== null) {
        $('.ui.error.message')
          .addClass('visible')
          .text(result.error.message);
        if (result.error.type === 'auth') {
          $('button#submit')
            .transition('shake');
        }
      }
    })
  </script>