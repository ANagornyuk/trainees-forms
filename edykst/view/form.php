<div id="top_buttons">
  <button class="button" onclick="showHide('blok_js')"># add JS/jQuery</button>
  <button class="button" onclick="showHide('blok_css')"># only CSS</button>
  <button class="button" id="ajax">AJAX</button>
</div>
<!--
    Block with styling CSS
-->
<article class="animate" id="blok_css">
  
  <div id="div_grad_login" class="div_grad">
    <form action="#" method="post">
      <div>
        <a href="#div_grad_signup" class="input_button input_sign input_active">Sing Up</a>
        <a href="#div_grad_login" class="input_button input_login input_inactive">Log In</a>
      </div>
      <div id="block_login">
        <div><p></p></div>
        <div>
          <input class="input_text" type="text" placeholder="" required/>
          <span class="l1" data-star=" *">Email Address</span>
        </div>
        <div>
          <input class="input_text" type="password" placeholder="" required/>
          <span class="l1" data-star=" *">Password</span>
        </div>
      </div>
      <div>
        <input class="input_button input_start" type="submit" value="LOG IN"/>
      </div>
      <p class="req">
        * Indicates required field
      </p>
    </form>
  </div>
  
  <div id="div_grad_signup" class="div_grad">
    <form action="#" method="post">
      <div>
        <a href="#div_grad_signup" class="input_button input_sign input_inactive">Sing Up</a>
        <a href="#div_grad_login" class="input_button input_login input_active">Log In</a>
      </div>
      <div id="block_sign">
        <div>
          <p>Sing Up for Free</p>
        </div>
        <div>
          <input class="input_text input_fn" type="text" placeholder="" required/>
          <span class="l1" data-star=" *">First Name</span>
          <input class="input_text input_ln" type="text" placeholder="" required/>
          <span class="l2" data-star=" *">Last Name</span>
        </div>
        <div>
          <input class="input_text" type="text" placeholder="" required/>
          <span class="l1" data-star=" *">Email Address</span>
        </div>
        <div>
          <input class="input_text" type="password" placeholder="" required/>
          <span class="l1" data-star=" *">Set A Password</span>
        </div>
      </div>
      <div>
        <input class="input_button input_start" type="submit" value="GET STARTED"/>
      </div>
      <p class="req">
        * Indicates required field
      </p>
    </form>
  </div>

</article>

<!--
    Block with events and styling JS
-->
<article class="animate" id="blok_js">
  
  <div class="div_block_js">
    <div class="div_input" id="but_js">
      <button class="button input_button input_sign input_inactive"  onclick="showHide('form_sign')">Sing Up</button>
      <button class="button input_button input_login input_active"  onclick="showHide('form_login')">Log In</button>
    </div>
    
    <!-- Form for Signin -->
    <form action="index.php" method="post" class="valForm" id="form_sign">
      <p>Sing Up for Free</p>
      <p></p>
      <div class="div_input">
        <input class="input_text input_fn valid" type="text" id="fn_js" name="fn" placeholder="First Name"/>
        <input class="input_text input_ln valid" type="text" id="ln_js" name="ln" placeholder="Last Name"/>
      </div>
      <div class="div_input">
        <input class="input_text valid" type="text" id="email_js" name="email" placeholder="Email Address"/>
      </div>
      <div class="div_input">
        <input class="input_text input_fn valid" type="password" id="pass1_js" name="password1" placeholder="Set A Password"/>
        <input class="input_text input_ln valid" type="password" id="pass2_js" name="password2" placeholder="Confirm Your Password"/>
      </div>
      <div class="div_input">
        <input class="valBtn input_button input_start" type="submit" value="GET STARTED"/>
        <input type="hidden" name="form" value="0"/>
      </div>
    </form>
    
    <!-- Form for Login -->
    <form action="index.php" method="post" class="valForm" id="form_login">
      <p></p>
      <div class="div_input">
        <input class="input_text valid" type="text" id="login_js" name="email" placeholder="Email Address"/>
      </div>
      <div class="div_input">
        <input class="input_text valid" type="password" id="pass_js" name="password" placeholder="Password"/>
      </div>
      <div class="div_input" style="height: 35px;"></div>
      <div class="div_input">
        <input class="valBtn input_button input_start" type="submit" id="send" value="LOG IN" />
        <input type="hidden" name="form" value="1"/>
      </div>
    </form>
    
    <p class="req no_pad">
      * Indicates required field
    </p>
  </div>

</article>

<!--
    Block with styling JS and load by "load()" method
-->
<article class="animate" id="blok_ajax">
</article>
