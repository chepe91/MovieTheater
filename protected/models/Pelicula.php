
<?php

class Pelicula extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function relations()
	{
		return array(
			'pxs'=>array(self::MANY_MANY, 'Sala', 'Peliculas_x_Sala(nPelicula, nSala)'),
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