
<?php

class Pelicula extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


    public function consultaPelicula($id)
    {
    	try{
    		$nPelicula = intval($id);

    		$criteria=new CDbCriteria;
			

    		$PeliculaObj = $this::model()->find('nPelicula=:nPelicula', array(':nPelicula'=>$id));

    		if(isset($PeliculaObj))
				return $PeliculaObj->cTitulo;

			return 'Error';

    	}
    	catch(Exception $e){

    	}


    	
    }

}

?>