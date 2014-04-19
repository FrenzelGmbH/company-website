<?php

namespace app\models;

/**
 * helper class to reference the correct user class from within models
 */

class User extends \dektrium\user\models\User
{

  public function getName()
  {
    return $this->getAttribute('email');
  }

}
