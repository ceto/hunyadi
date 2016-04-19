      <div class="contactwrap">
        <div class="row">
          <div class="columns">
            <h2><?php _e('Várjuk <span>megkeresését</span>','hu'); ?></h2>
            <p>Hívjon a <a href="tel:003612972020">+36 (1) 297-2020</a> számon, vagy töltse ki az űrlapot. Munkatársaink rövid időn belül válaszolnak.</p>
          </div>
        </div>

        <form id="contact_form" action="<?= get_template_directory_uri(); ?>/contact_me.php" method="post" data-abide="ajax">

          <div class="row">
            <div class="columns">
              <label for="message_name"><?php _e('Név','hu'); ?>*<small class="error">Megadása kötelező</small>
                <input type="text" required placeholder="<?php _e('Adja meg nevét','hu'); ?>*" id="message_name" name="message_name" value="<?php echo $_POST['message_name']; ?>">
              </label>

            </div>
          </div>

          <div class="row">
            <div class="columns xlarge-6">
              <label for="message_tel"><?php _e('Telefon','hu'); ?>*<small class="error">Megadása kötelező</small>
                <input type="text" required placeholder="<?php _e('Adja meg telefonszámát','hu'); ?>" id="message_tel" name="message_tel" value="<?php echo $_POST['message_tel']; ?>">
              </label>

            </div>

            <div class="columns xlarge-6">
              <label for="message_email"><?php _e('E-Mail cím','hu'); ?>*<small class="error">Megadása kötelező</small>
                <input type="email" required pattern="email" placeholder="<?php _e('E-mail címe','hu'); ?>*" id="message_email" name="message_email" value="<?php echo $_POST['message_email']; ?>">
              </label>

            </div>
          </div>

          <div class="row">
            <div class="columns">
              <label for="message_area">Válasszon szolgáltatást
                <select id="message_area" name="message_area">
                  <option value="Nem nevezett meg szolgáltatást"><?php _e('Válasszon szolgáltatást','hu'); ?></option>
                  <option value="Fázisjavítás">Fázisjavítás</option>
                  <option value="Energia audit">Energiaaudit</option>
                  <option value="JANITZA mérőműszerek">JANITZA mérőműszerek</option>
                  <option value="Berendezés gyártás">Berendezés gyártás</option>
                  <option value="Hálózatanalízist szeretnék">Hálózatanalízist szeretnék</option>
                </select>
              </label>

            </div>
          </div>

          <div class="row">
            <div class="columns">
              <label for="message_text"><?php _e('Üzenet','hu'); ?>*
                <textarea placeholder="<?php _e('Ha kérdése van itt felteheti ...','hu'); ?>" rows="5" id="message_text" name="message_text"><?php if ($_POST['message_text']!='') {
                  echo $_POST['message_text']; }?></textarea>
              </label>
            </div>
          </div>

          <div class="actions row text-center">
            <div class="columns">
              <input type="hidden" name="ap_id" value="<?php echo $subjecto; ?>">
              <input type="hidden" name="message_page" value="<?php the_title(); ?>">
              <input type="hidden" name="message_human" value="2">
              <input type="hidden" name="submitted" value="1">
              <div id="result"></div>
              <button id="contact_submit" type="submit" class="button secondary small expand"><?php _e('Mehet','hu'); ?></button>
              </div>
            </div>
        </form>
      </div><!-- /.contact-wrap -->

