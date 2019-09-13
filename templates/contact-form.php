      <div class="contactwrap">
          <a href="#" class="exit-off-canvas ajanlatclose">&times;</a>
          <div class="row">
              <div class="columns">
                  <h2><?php _e('Várjuk <span>megkeresését</span>','hunyadi'); ?></h2>
                  <p><?php _e('Hívjon a <a href="tel:003612972020">+36 (1) 297-2020</a> számon, vagy töltse ki az űrlapot. Munkatársaink rövid időn belül válaszolnak.','hunyadi'); ?>
                  </p>
                  <p>Fázisjavítással kapcsolatban, az ajánlatkéréséhez<br>használja a
                      <a href="<?php the_permalink(1836); ?>">konfigurátort</a></p>
              </div>
          </div>

          <form id="contact_form" action="<?= get_template_directory_uri(); ?>/contact_me.php" method="post"
              data-abide="ajax">

              <div class="row">
                  <div class="columns">
                      <label for="message_name"><?php _e('Név','hunyadi'); ?>*<small
                              class="error"><?php _e('Megadása kötelező','hunyadi'); ?></small>
                          <input type="text" required placeholder="<?php _e('Adja meg nevét','hunyadi'); ?>*"
                              id="message_name" name="message_name" value="<?php echo $_POST['message_name']; ?>">
                      </label>

                  </div>
              </div>

              <div class="row">
                  <div class="columns">
                      <label for="message_firm"><?php _e('Cégnév','hunyadi'); ?><small
                              class="error"><?php _e('Megadása kötelező','hunyadi'); ?></small>
                          <input type="text" placeholder="<?php _e('Adja meg az ajánlatkérő cég nevét','hunyadi'); ?>"
                              id="message_firm" name="message_firm" value="<?php echo $_POST['message_firm']; ?>">
                      </label>

                  </div>
              </div>

              <div class="row">
                  <div class="columns xlarge-6">
                      <label for="message_tel"><?php _e('Telefon','hunyadi'); ?>*<small
                              class="error"><?php _e('Megadása kötelező','hunyadi'); ?></small>
                          <input type="text" required placeholder="<?php _e('Adja meg telefonszámát','hunyadi'); ?>"
                              id="message_tel" name="message_tel" value="<?php echo $_POST['message_tel']; ?>">
                      </label>

                  </div>

                  <div class="columns xlarge-6">
                      <label for="message_email"><?php _e('E-Mail cím','hunyadi'); ?>*<small
                              class="error"><?php _e('Megadása kötelező','hunyadi'); ?></small>
                          <input type="email" required pattern="email"
                              placeholder="<?php _e('E-mail címe','hunyadi'); ?>*" id="message_email"
                              name="message_email" value="<?php echo $_POST['message_email']; ?>">
                      </label>

                  </div>
              </div>

              <div class="row">
                  <div class="columns">
                      <label for="message_area"><?php _e('Válasszon szolgáltatást','hunyadi'); ?>
                          <select id="message_area" name="message_area">
                              <option value="Nem nevezett meg szolgáltatást">
                                  <?php _e('Válasszon szolgáltatást','hunyadi'); ?></option>
                              <option value="Fázisjavítás"><?php _e('Fázisjavítás','hunyadi'); ?></option>
                              <option value="Energetika"><?php _e('Energetika','hunyadi'); ?></option>
                              <option value="Mérések"><?php _e('Mérések','hunyadi'); ?></option>
                              <option value="Janitza"><?php _e('Janitza','hunyadi'); ?></option>
                              <option value="Berendezésgyártás"><?php _e('Berendezésgyártás','hunyadi'); ?></option>
                              <option value="Kivitelezés és karbantartás">
                                  <?php _e('Kivitelezés és karbantartás','hunyadi'); ?></option>
                              <option value="Egyéb"><?php _e('Egyéb','hunyadi'); ?></option>
                          </select>
                      </label>

                  </div>
              </div>

              <div class="row">
                  <div class="columns">
                      <label for="message_text"><?php _e('Üzenet','hunyadi'); ?>*
                          <textarea placeholder="<?php _e('Ha kérdése van itt felteheti ...','hunyadi'); ?>" rows="5"
                              id="message_text" name="message_text"><?php if ($_POST['message_text']!='') {
                  echo $_POST['message_text']; }?></textarea>
                      </label>
                  </div>
              </div>
              <div class="row">
                  <div class="columns">
                      <label for="accept">
                          <input id="accept" name="accept" value="1" type="checkbox" required />
                          Elolvastam és megértettem az <a target="_blank"
                              href="<?= get_the_permalink(464) ?>">adatvédelmi szabályzatot.</a>
                          <small class="error">
                              <br>Adatvédelmi szabályzat elfogadása kötelező<br><br>
                          </small>
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
                      <button id="contact_submit" type="submit"
                          class="button secondary small expand"><?php _e('Mehet','hunyadi'); ?></button>
                  </div>
              </div>
          </form>
      </div><!-- /.contact-wrap -->