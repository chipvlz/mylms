<section class="section">
  <div class="container">
    <div class="columns is-centered is-size-2 has-text-weight-bold">
      <div class="column is-one-third has-text-centered">
        <h2>Login to the System</h2>
      </div>
    </div>
    <div class="columns is-centered">
      <div class="column is-one-third box">
        <?php echo form_open('users/login'); ?>
          <div class="field">
            <?php $error = form_error('username', '<p class="help is-danger">', '</p>'); ?>
            <label class="label" for="username">Username</label>
            <div class="control has-icons-left <?php echo empty($error) ? '' : 'has-icons-right'; ?>">
              <input class="input <?php echo empty($error) ? '' : 'is-danger'; ?>"
                type="text" name="username" placeholder="enter your username">
              <span class="icon is-small is-left">
                  <i class="fa fa-user"></i>
              </span>
              <?php if(!empty($error)): ?>
                <span class="icon is-small is-right">
                  <i class="fas fa-exclamation-triangle"></i>
                </span>
              <?php endif; ?>
            </div>
            <?php if (!empty($error)): ?>
              <?php echo $error; ?>
            <?php endif; ?>
          </div>
          <div class="field">
            <?php $error = form_error('password', '<p class="help is-danger">', '</p>'); ?>
            <label class="label" for="password">Password</label>
            <div class="control has-icons-left <?php echo empty($error) ? '' : 'has-icons-right'; ?>">
              <input class="input <?php echo empty($error) ? '' : 'is-danger'; ?>"
                type="password" name="password" placeholder="enter your password">
              <span class="icon is-small is-left">
                  <i class="fa fa-key"></i>
              </span>
              <?php if(!empty($error)): ?>
                <span class="icon is-small is-right">
                  <i class="fas fa-exclamation-triangle"></i>
                </span>
              <?php endif; ?>
            </div>
            <?php if (!empty($error)): ?>
              <?php echo $error; ?>
            <?php endif; ?>
          </div>
          <div class="field is-grouped is-grouped-right">
            <p class="control">
              <a href="#" class="button is-light is-uppercase">
                  Cancel
              </a>
            </p>
            <p class="control">
              <button type="submit" class="button is-primary is-uppercase">
                  Login
              </button>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
