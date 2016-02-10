      <?php
      //response generation function
      $response = "";
      //function to generate response
      // function generate_response($type, $message){

      //   global $response;
      //   if($type == "success") {$response = '<div class="success">'.$message.'</div>';}
      //   else {$response = '<div class="error">'.$message.'</div>';}

      // }
      //response messages
      $not_human       = __('Ellenőrzés sikertelen. Próbálkozzon újra!','hu');
      $missing_content = __('Név és Email megadása kötelező.','hu');
      $email_invalid   = __('Érvénytelen e-mail cím','hu');
      $message_unsent  = __('Üzenet küldése nem sikerült. Próbálkozzon újra!','hu');
      $message_sent    = __('Köszönjük! Üzenetét elküldtük.','hu');
      //user posted variables
      $name = $_POST['message_name'];
      $email = $_POST['message_email'];
      $center = $_POST['message_center'];
      $tel = $_POST['message_tel'];
      $message = $_POST['message_text'];
      $page = $_POST['message_page'];
      $human = $_POST['message_human'];
      $subjecto = $_REQUEST['ap_id'];
      //php mailer variables
      //$to = get_option('admin_email');
      $to = 'szabogabi@gmail.com';
      $subject = $page." ".get_bloginfo('name');
      $headers = "From: " . strip_tags($email) . "\r\n";
      $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    if(!$human == 0){
        if($human != 2) {
          $response = '<div class="error">'.$not_human.'</div>';
        }
        else {

          //validate email
          if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $response = '<div class="error">'.$email_invalid.'</div>';
          else //email is valid
          {
            //validate presence of name and message
            if(empty($name) || empty($email)){
              $response = '<div class="error">'.$missing_content.'</div>';
            }
            else //ready to go!
            {
              $message='Név: '.$name.'<br/>'.'Tel: '.$tel.'<br />'.'Központ: '.$center.'<br />'.$message;
              $sent = wp_mail($to, $subject, $message, $headers);
                if($sent) {
                  wp_mail('budapest@somnocenter.hu', $subject, $message, $headers);
                  wp_mail($email, $subject, $message, $headers);
                  $response = '<div class="success">'.$message_sent.'</div>';
                } else {
                  $response = '<div class="error">'.$message_unsent.'</div>';
                }
            }
          }
        }
      }
      else
        if ($_POST['submitted']) generate_response("error", $missing_content);
    ?>
      <div class="contactwrap">
        <div class="row">
          <div class="columns">
            <h2><?php _e('Várjuk <span>megkeresését</span>','hu'); ?></h2>
            <p>Hívjon a <a href="tel:+36 70 770 5653">(+36) 70 770-5653</a> számon, vagy töltse ki az űrlapot. Munkatársaink rövid időn belül válaszolnak.</p>
          </div>
        </div>

        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">

          <div class="row">
            <div class="columns">
              <label for="message_name"><?php _e('Név','hu'); ?>*</label>
              <input type="text" placeholder="<?php _e('Adja meg nevét','hu'); ?>*" id="message_name" name="message_name" value="<?php echo $_POST['message_name']; ?>">
            </div>
          </div>

          <div class="row">
            <div class="columns">
              <label for="message_tel"><?php _e('Telefon','hu'); ?></label>
              <input type="text" placeholder="<?php _e('Adja meg telefonszámát','hu'); ?>" id="message_tel" name="message_tel" value="<?php echo $_POST['message_tel']; ?>">
            </div>
          </div>

          <div class="row">
            <div class="columns">
              <label for="message_email"><?php _e('E-Mail cím','hu'); ?>*</label>
              <input type="email" placeholder="<?php _e('E-mail címe','hu'); ?>*" id="message_email" name="message_email" value="<?php echo $_POST['message_email']; ?>">
            </div>
          </div>

          <div class="row">
            <div class="columns">
              <label for="message_area">Válasszon szolgáltatást</label>
                <select id="message_area" name="message_area">
                  <option value="0"><?php _e('Válasszon szolgáltatást','hu'); ?></option>
                  <option value="Fázisjavítás">Fázisjavítás</option>
                  <option value="Energia audit">Energiaaudit</option>
                  <option value="JANITZA mérőműszerek">JANITZA mérőműszerek</option>
                  <option value="Berendezés gyártás">Berendezés gyártás</option>
                  <option value="Hálózatanalízist szeretnék">Hálózatanalízist szeretnék</option>
                </select>

            </div>
          </div>

          <div class="row">
            <div class="columns">
              <label for="message_text"><?php _e('Üzenet','hu'); ?>*</label>
              <textarea placeholder="<?php _e('Ha kérdése van itt felteheti ...','hu'); ?>" rows="5" id="message_text" name="message_text"><?php if ($_POST['message_text']!='') {
                  echo $_POST['message_text']; }?></textarea>
            </div>
          </div>

          <div class="actions row text-center">
            <div class="columns">
              <input type="hidden" name="ap_id" value="<?php echo $subjecto; ?>">
              <input type="hidden" name="message_page" value="<?php the_title(); ?>">
              <input type="hidden" name="message_human" value="2">
              <input type="hidden" name="submitted" value="1">
              <div class="infopan" id="infopan"><?php echo $response; ?></div>
              <button type="submit" class="button secondary small expand"><?php _e('Mehet','hu'); ?></button>
              </div>
            </div>
        </form>
      </div><!-- /.contact-wrap -->

