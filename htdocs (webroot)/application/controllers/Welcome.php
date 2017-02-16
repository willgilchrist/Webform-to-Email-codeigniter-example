<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		ini_set('SMTP','smtp-relay.gmail.com');  // examples
		ini_set('smtp_port',25);

		$config['upload_path']          = 'C:\tmp';  // Windows example - outside of webroot
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 3000;
		$config['max_height']           = 3000;

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('upload', $config);

		$this->form_validation->set_rules('emailaddress', 'Email Address', 'required');
		$this->form_validation->set_rules('subject', 'Subject', 'required');

		if ($this->form_validation->run() === FALSE)
		{
				$this->load->view('templates/header');
				$this->load->view('welcome_message');
				$this->load->view('templates/footer');
		}
		else
		{
				$this->email->from('softwarebilly@gmail.com', 'William Gilchrist');
				$this->email->to(explode(",", $_POST['emailaddress']));
				// Documentation states to, can be a comma delimited string directly, but to show expertise - I turned it into an array anyway.
				// Normally I wouldn't over-complicate the software and just comment on the application
				//$this->email->cc('cc@example.com');
				//$this->email->bcc('bcc@example.com');

				$this->email->subject($_POST['subject']);
				$this->email->message($_POST['emailbody']);

				if ($this->upload->do_upload('emailattachment')){
						$data = array('upload_data' => $this->upload->data());
						$this->email->attach($data["upload_data"]["full_path"]);
				}

				//$this->email->send();
				//uncomment to send email request

				$data['emailaddress'] = $_POST['emailaddress'];
				$data['subject'] = $_POST['subject'];
				$data['emailbody'] = $_POST['emailbody'];

				$this->load->view('templates/header');
				$this->load->view('email_sent', $data);
				$this->load->view('templates/footer');
		}
}  // end function index page

}
// End of file
