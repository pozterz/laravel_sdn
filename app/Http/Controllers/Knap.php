<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

class Knap extends Controller {

	public function index(){
		$MW = null;
		$arrw = array();
		$arrv = array();
		

		for($i = 0; $i < 5; $i++){
			$arrw[$i] = null;
		}

		for($i = 0; $i < 5; $i++){
			$arrv[$i] = null;
		}
		$res = 0;
		$ans = array();
		return view('index',compact('MW','arrw','arrv','res','ans'));
	}

	public function Input_Check(){
		$MW = Input::get('MW');
  /***************** Max Weight Validation *******************/
		// Rules 
		$MWrule = array(
			'MW' => array('required','min:0','integer'),
			'w0' => array('min:0','max:'.$MW,'integer'),
			'w1' => array('min:0','max:'.$MW,'integer'),
			'w2' => array('min:0','max:'.$MW,'integer'),
			'w3' => array('min:0','max:'.$MW,'integer'),
			'w4' => array('min:0','max:'.$MW,'integer'),
			'v0' => array('min:0','integer'),
			'v1' => array('min:0','integer'),
			'v2' => array('min:0','integer'),
			'v3' => array('min:0','integer'),
			'v4' => array('min:0','integer')
			);
		// Error Msg
		$MWmsg = array(
			'MW.required' => 'Required Max Weight',
			'MW.min' => 'Minimum Number is 0',
			'MW.integer' => 'Max Weight Must be Integer',
			);
		// init validator
		$validator = validator::make(Input::all(),$MWrule,$MWmsg);
/*************************** PASS  ******************************/
		if($validator->passes()){
/************************** init and counting ***********************/
					$arrw = array();
					$arrv = array();
					$mem_ans = array(
						array(null),
						array(null),
						array(null),
						array(null),
						array(null)
						);

					for($i = 0; $i < 5; $i++){
						$arrw[$i] = Input::get('w'.$i);
					}

					for($i = 0; $i < 5; $i++){
						$arrv[$i] = Input::get('v'.$i);
					}

					$w_count = 0;

					foreach($arrw as $a){
						if($a != null) $w_count++;
					}

					$v_count = 0;

					foreach($arrv as $a){
						if($a != null) $v_count++;
					}
				
					$result = array(
						array(null),
						array(null),
						array(null),
						array(null),
						array(null)
						);

/***************************** 0/1 Knapsack ***************************************/
					for ($i=0; $i <= $w_count ; $i++) { 
						for ($j=0; $j <= $MW ; $j++) { 
							if($i == 0 || $j == 0){
								$result[$i][$j] = 0;
								$mem_ans[$i][$j] = 0;
							}
								
							else if($j < $arrw[$i-1]){
								$result[$i][$j] = $result[$i-1][$j];
								$mem_ans[$i][$j] = 0;
							}
							else{
								$result[$i][$j] = max($result[$i-1][$j],$arrv[$i-1]+$result[$i-1][$j-$arrw[$i-1]]);
								if( $arrv[$i-1]+$result[$i-1][$j-$arrw[$i-1]] > $result[$i-1][$j]){
									$mem_ans[$i][$j] = 1;
								}
								else{
									$mem_ans[$i][$j] = 0;
								}
								
							}
						}
					}
 /************************ ERROR CHECKING *******************************/
				/*for ($i=0; $i <= $w_count ; $i++) { 
						for ($j=0; $j <= $MW ; $j++) { 
							echo $mem_ans[$i][$j]." ";
						}
						echo "<br/>";
					}*/
/******************************** COLLECT ANSWER *******************************/

					$i = $w_count-1; $j = $MW;
					$ans = array();
					while($i >= 0){
						//echo $j."::".$arrw[$i]."<br/>";
						//echo $i."<<"."::<br/>";
						//echo "::".$result[$i+1][$j]."::<br/>";
						//echo "::".($arrv[$i]+$result[$i+1][$j-$arrw[$i]])."::<br/>";
						if($mem_ans[$i+1][$j] == 1){
							//echo $i-1;
							$ans[] = $i;
							$i--;
							$j -= $arrw[$i+1];
						}else{
							$i--;
						}
					}
				
					$res = $result[$w_count][$MW];
/******************************* RETURN **************************************/
					return view('index',compact('MW','arrw','arrv','res','ans'));
		}else{
			return Redirect::to('/')->withErrors($validator->messages());
		}
	}
}


?>