<?php
class DefaultController extends Controller{

	// Function that shows the index page when you type 'localhost'
	public function index(){
		// Stores Person model in 'person' variable
		// 'person' is an array
		$person = $this->model('Person');

		// Stores every person in 'person' variable in 'people' variable
		// 'people' is an array
		$people = $person->getAll();

		// Send the 'people' variable to the View for rendering it to the webpage.
		$this->view('default/index', $people);
	}

	public function create(){
		// Until the click button is not pressed, show the 'create' view content
		if(!isset($_POST['action'])){
			$this->view('default/create');	
		}else{
			// Once the click button is pressed, make a 'person' array and store the user input to 'person' array
			$person = $this->model('Person');
			$person->first_name = $_POST['first_name'];
			$person->last_name = $_POST['last_name'];
			$person->insert();
			//redirecttoaction - 'default' is the controller name, 'index' is the method inside 'default' controller
			header('location:/default/index');
		}
	}

	public function edit($person_id){
		$thePerson = $this->model('Person')->find($person_id);
		if(!isset($_POST['action'])){
			$this->view('default/edit', $thePerson);	
		}else{
			$thePerson->first_name = $_POST['first_name'];
			$thePerson->last_name = $_POST['last_name'];
			$thePerson->update();
			//redirecttoaction - 'default' is the controller name, 'index' is the method inside 'default' controller
			header('location:/default/index');
		}
	}

	public function delete($person_id){
		$thePerson = $this->model('Person')->find($person_id);
		if(!isset($_POST['action'])){
			$this->view('default/delete', $thePerson);	
		}else{
			$thePerson->delete();
			//redirecttoaction - 'default' is the controller name, 'index' is the method inside 'default' controller
			header('location:/default/index');
		}

	}
}
?>
