<?php
foreach ($viewBag as $value) {
    echo '<div class="well">

                <div class="row">

                  <div class="col-md-4">
                    <p>Имя пользователя:</p>
                  </div>

                  <div class="col-md-4">
                    <p>' . $value['name'] . '</p>
                  </div>

                </div>
                
                <div class="row">
                  <div class="col-md-4">
                    <p>Возраст:</p>
                  </div>

                  <div class="col-md-4">
                  <p>' . $value['age'] . '</p>
                  </div>
                </div>

            </div>';
}
