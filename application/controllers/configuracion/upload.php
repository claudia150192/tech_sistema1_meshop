<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function do_upload()
	{
		$file_element_name = 'archivo_adjunto';
		$fecha = "";
		$config['file_name'] = "fotoEmpresa";
		$config['upload_path'] = './upload/';
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '2048';
		$config['max_width']  = '2000';
		$config['max_height']  = '1500';
		
		$this->load->library('upload', $config);

		$ruta_img = './upload/fotoEmpresa';
		$rutathumb_img = './upload/thumbs/fotoEmpresa_thumb';
		if (file_exists($ruta_img.".jpg")) {
			unlink($ruta_img.".jpg");
			unlink($rutathumb_img.".jpg");
		}elseif(file_exists($ruta_img.".png")){
			unlink($ruta_img.".png");
			unlink($rutathumb_img.".png");
		}

		if (!$this->upload->do_upload($file_element_name))
		{
			$error = array('error' => $this->upload->display_errors());
			$return = array("responseCode"=>400, "resultado"=>$error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			foreach($this->upload->data() as $item => $value){
		  	    if($item=="file_path"){
		  	 	    $path=$value; 
		  	    }if($item=="file_name"){
				    $name=$value;
		  	    }
        	}
			
			$res = $this->resize($path,$name);
		  	if($res!=""){
		  		$return = array("responseCode"=>200, "resultado"=>$res);
		  	}else{
		  		$return = array("responseCode"=>400, "resultado"=>$res);
		  	}

		}

		$return = json_encode($return);
		echo $return;
	}

	function resize($path,$name)
	{  
		$resultado="";

		$config['image_library'] = 'gd2';
		$config['source_image'] =  $path.$name;
		$config['new_image']=$path.'thumbs';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 50;
        $config['height'] = 50;
		
		$this->load->library('image_lib', $config);
		
		if (!$this->image_lib->resize())
        {
            $resultado = $this->image_lib->display_errors();
        }

        $this->image_lib->resize();
        return $resultado;
	
	}

}

?>