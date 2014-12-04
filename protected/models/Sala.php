
<?php

class Sala extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'asientos' => array(self::HAS_MANY, 'Asiento', 'nSala'),
            'boletos' => array(self::HAS_MANY, 'Boleto', 'nSala'),
            'funcions' => array(self::HAS_MANY, 'Funcion', 'nSala'),
            'peliculas' => array(self::MANY_MANY, 'Pelicula', 'peliculas_x_sala(nSala, nPelicula)'),
        );
    }
}

?>