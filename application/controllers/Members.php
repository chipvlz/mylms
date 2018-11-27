<?php
class Member extends CI_Controller 
{
    public function __construct()
	{
		parent::__construct();

		$this->load->model('Members_model');
		$this->load->library('form_validation');
    }
    
    
    public function index()
	{
		$this->data['member_list'] = $this->Members_model->get_all();
		
		//member/index view of all the members in a table
        $this->load->view('members/index', $this->data);
        
        $this->load->view('templates/header');
        $this->load->view('templates/header' );
      
    }
    public function view($id)
    {
        $this->data['view_member'] = $this->Members_model->get_member($id);
        
 
       
        $this->load->view('templates/header' );
        $this->load->view('members/view', $this->data);
        $this->load->view('templates/footer');
    }

    public function submit_data()
    {
    $data = array('first_name'                  => $this->input->post('first_name'),
                  'last_name'                   => $this->input->post('last_name'),
                  'address1'                    => $this->input->post('address1'),
                  'address2'                    => $this->input->post('address2'),
                  'address3'                    => $this->input->post('address3') ,
                  'registration_date'           => date("m/d/y h:i:s"),
                  'mobile'                      =>$this->input->post('mobile')
                );
    
    $this->Members_model->insert_member($data);
    $this->session->set_flashdata('message', 'Your data inserted Successfully..');
    redirect('members/index');

    }

    function edit_product($id) 
    {
		//$product = $this->Products_model->get_product($product_id);

        //validate form input
        $this->form_validation->set_rules('first_name', 'First name', 'required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last name', 'required|xss_clean');
        $this->form_validation->set_rules('address1', 'Address line1', 'required|xss_clean');
        $this->form_validation->set_rules('address2', 'Address line2', 'required|xss_clean');
        $this->form_validation->set_rules('address3', 'Address line3', 'required|xss_clean');
        $this->form_validation->set_rules('mobile', 'Mobile no', 'required|xss_clean');
		

           
			if ($this->form_validation->run() == false)
			{
                //get the current membert info
                $this->data['view_member'] = $this->Members_model->get_member($id);
                $this->load->view('members/edit', $this->data);
            }	
            else 
			{
                //validation pass 
                //post values to array
                $data = array(
                    'first_name'                  => $this->input->post('first_name'),
                    'last_name'                   => $this->input->post('last_name'),
                    'address1'                    => $this->input->post('address1'),
                    'address2'                    => $this->input->post('address2'),
                    'address3'                    => $this->input->post('address3') ,
                    'registration_date'           => date("m/d/y h:i:s"),
                    'mobile'                      =>$this->input->post('mobile'));

                if($this->Members_model->update_member($id, $data))
                {
				   $this->session->set_flashdata('message', "<p>Menber updated successfully.</p>");
				
                   redirect('members/index');
                }
			}				
		
	}	
	
    function delete_member($id) 
    {
		$this->Members_model->delete_member($id);
		
		$this->session->set_flashdata('message', '<p>Member were successfully deleted!</p>');
		
		redirect('members/index');
	}
    
	
    
}
?>

