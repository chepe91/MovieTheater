
<?php

class Pelicula extends CActiveRecord
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
            'boletos' => array(self::HAS_MANY, 'Boleto', 'nPelicula'),
            'salas' => array(self::MANY_MANY, 'Sala', 'peliculas_x_sala(nPelicula, nSala)'),
        );
    }

	public function consultaPelicula($id)
	{
		try{
			$nPelicula = intval($id);

			$PeliculaObj = $this::model()->find('nPelicula=:nPelicula', array(':nPelicula'=>$id));

			if(isset($PeliculaObj))
				return $PeliculaObj;

			return 'Error';

		}
		catch(Exception $e){

		}



	}

}

?>