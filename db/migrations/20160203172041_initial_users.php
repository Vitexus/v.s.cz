<?php

use Phinx\Migration\AbstractMigration;

class InitialUsers extends AbstractMigration
{

    /**
     */
    public function change()
    {
        $userData = [
            'email' => 'info@vitexsoftware.cz', 
            'login' => 'vitex',
            'settings' => 'a:1:{s:5:"admin";s:4:"true";}',
            'password' => '7254a96290b564d1b0cd85b9881b6b1a:b3',
            'firstname' => 'Vítězslav',
            'lastname' => 'Dvořák', 'DatCreate' => \Envms\FluentPDO\Literal::from('NOW()')];

        $table = $this->table('user');
        $table->insert($userData);
        $table->saveData();
    }

}
