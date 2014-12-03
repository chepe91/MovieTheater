
<?php

class Peliculas_x_Sala extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function relations()
	{
		return array(
			'Peliculas_x_Sala'=>array(self::MANY_MANY, 'Pelicula', 'Peliculas_x_Sala(nPelicula, nSala)'),
			);
	}

}

?>